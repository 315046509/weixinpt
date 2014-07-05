<?php
class LoginAction extends BaseAction {
	
	/**
	 * qq sina 登陆授权回调
	 * 根据token和userid获取用户信息
	 * 保存tp_ap_users (跳转到首页的时候已经保存)
	 */
	public function callback($type = null, $code = null) {
		(empty ( $type ) || empty ( $code )) && $this->error ( '参数错误' );
		
		// 加载ThinkOauth类并实例化一个对象
		import ( "ORG.ThinkSDK.ThinkOauth" );
		$sns = ThinkOauth::getInstance ( $type );
		// echo $sns->http('http://localhost/index.php',null);
		// 腾讯微博需传递的额外参数
		$extend = null;
		if ($type == 'tencent') {
			$extend = array (
					'openid' => $this->_get ( 'openid' ),
					'openkey' => $this->_get ( 'openkey' ) 
			);
		}
		
		// 请妥善保管这里获取到的Token信息，方便以后API调用
		// 调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
		// 如： $qq = ThinkOauth::getInstance('qq', $token);
		try {
			$token = $sns->getAccessToken ( $code, $extend );
		} catch ( Exception $ex ) {
			echo $ex->getMessage ();
		}
		if (session ( 'gwaddr' )) {
			// 获取当前登录用户信息
			if (is_array ( $token )) {
				$user_info = A ( 'Type', 'Event' )->$type ( $token );
				
				echo ("<h1>恭喜！使用 {$type} 用户登录成功</h1><br>");
				echo ("授权信息为：<br>");
				//dump ( $token );
				echo ("当前登录用户信息为：<br>");
				//dump ( $user_info );
				
				// 存用户数据
				$userwhere ['apnode_id'] = session ( 'apnode_id' );
				
				$userwhere ['mac'] = session ( 'mac' );
				
				$apUserModel = M ( 'ApUsers' );
				
				$apUserModel->where ( $userwhere )->save ( $user_info );
				
				// 示授权成功 js 通知网关 然后跳转
				$this->assign ( 'ok', 1 );
				$token = $this->gen_token ();
				$this->assign ( 'token', $token );
			}
			$this->display ();
		} else {
			session ( 'authname', $user_info ['name'] );
			redirect ( '/' );
		}
	}
	
	public function  sendsms(){
		// 增加 发送短信
		$token = session('token');
		$info=M('Wxuser')->where(array('token'=>$token))->find();
		$phone=$_POST['phone'];
		session('mobile',$phone);
		//echo $phone.$token;
		$user=$info['smsuser'];//短信平台帐号
		$pass=md5($info['smspassword']);//短信平台密码
		$smsstatus=$info['smsstatus'];//短信平台状态
		
		#随机生成四位密码 并保存 使用后删除
		$content = rand(1000,9999);
		
		$rt['ret']=0;
		$rt['msg']='erro';
		
		if ($smsstatus == 0) {
			if ($content) {
				/*import('ORG.Sms');
				$sms = new Sms("http://www.189lt.com:9000/servlet/UserServiceAPI","can","654123",1);
				$txt = $sms->sendsms("13381185331","开始咯");
				echo $txt;*/
				
				
				$smsrs = file_get_contents('http://api.smsbao.com/sms?u='.$user.'&p='.$pass.'&m='.$phone.'&c='.urlencode($content));
				if(1){
					//if($smsrs == 0){ 临时注释
					session ( 'smscode', $content );
					$rt['ret']=1;
					$rt['msg']=$content;
				}else{
					$rt['ret']=0;
					$rt['msg']=$smsrs;
				}
			}
		}else{
			$rt['msg']='未开启';
		}
		
		echo json_encode($rt);
		// 结束
	}
	/*
	 * 登陆验证
	 */
	public function login() {
		// 此处为判断用户是否具有上网的权限,请自行根据需求补全
		$t = false;
		$code = $_POST ['code'];
		$code = intval ( $code );
		
		$wtoken = $_POST ['token'];
		$authtype = $_POST ['authtype'];
		
		// 果是手机 密码存储到session 验证完成 清空
		if ($authtype == 'sms') {
			if ($code == session ( 'smscode' )) {
				$t = true;
				session ( 'smscode', null );
			}
		} else {
			// 果是微信 如果密码正确 删除对应token和code的密码记录
			$auchcodeMode = M ( 'ApAuthcode' );
			$codeinfo = $auchcodeMode->where ( "token='$wtoken'" . 'and authcode=' . $code )->find ();
			if ($codeinfo) {
				$t = true;
				// 除
				$auchcodeMode->where ( 'id=' . $codeinfo ['id'] )->delete ();
			}
		}
		if ($t) {
			// 新用户认证类型
			$userwhere ['apnode_id'] = session ( 'apnode_id' );
			$userwhere ['mac'] = session ( 'mac' );
			$apUserModel = M ( 'ApUsers' );
			$user_info ['auth_type'] = $authtype;
			$user_info ['mobile'] = session('mobile');
			$apUserModel->where ( $userwhere )->save ( $user_info );
			
			session('mobile',null);
			$token = $this->gen_token ();
			
			echo '{ "ret":"1", "token":"' . $token . '"}';
		} else {
			
			echo '{ "ret":"0", "token":""}';
		}
	}
	function gen_token() {
		$token_time = time ();
		$token_livetime = 180;
		$slat_string = "test";
		
		$token = md5 ( intval ( $token_time / $token_livetime ) . $slat_string );
		
		return $token;
	}
}