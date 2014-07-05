<?php
class IndexAction extends BaseAction {
	/*
	 * 根据mac地址 跳转到对应的商户3G网站 在首页顶部设置登陆框（漂亮的顶部浮动层） 如果mac不为空 则显示登陆 否则不显示
	 */
	public function auth() {
		
		if (!isset($_GET ['gwmac'])) { 
			echo '{"interval":"30", "posturl":"' . 'http://192.168.118.1/index.php/hb"}'; 
			return;
		};
		 
		// dump ( $_GET );
		$mac = $_GET ['gwmac'];
		
		// 找ap_nodes mac对应的token
		$ap = M ( 'ApNodes' );
		$where ['mac'] = $mac;
		
		$apinfo = $ap->where ( $where )->field ( 'token' )->find ();
		//dump ( $apinfo );
		// return;
		$get = $_GET;
		$token = array (
				'token' => $apinfo ['token'] 
		);
		$get = array_merge ( $get, $token );
		header ( 'Location:' . U ( 'Wap/Index/index', $get ) );
	}
	
	
	function hb() {
		if ($_SERVER ['REQUEST_METHOD'] == 'GET') {
			echo '{"interval":"30", "posturl":"' . 'http://192.168.118.1/index.php/hb"}';
		} else if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			
			$data = file_get_contents ( "php://input" );
			$obj = json_decode ( $data );
			Log::write ( '调试的POST：' . $data, Log::INFO );
			//echo 'mac: ' . $obj->gwmac . ' gwaddr: ' . $obj->gwaddr . ' gwport: ' . $obj->gwport . ' usrnum: ' . $obj->usrnum;
			
			/*
			 * $S = '{ "gwmac": "c8:3a:35:44:4d:d0", "gwaddr": "192.168.100.100", "gwport": "8080", "usrnum": "1", "datas": [{ "type": "online",|offlline "mac": "00:21:6a:06:a9:fc", "start": "1393310196", "used": "36", "end": "" }] }';
			 */
			if ($obj) {
				// 新对应mac地址的信息
				$apModel = M ( 'ApNodes' );
				
				// $apData['mac']=$obj->gwmac;
				$apData ['addr'] = $obj->gwaddr;
				$apData ['port'] = $obj->gwport;
				$apData ['usernum'] = $obj->usrnum;
				$apData ['deploy_status'] = 1;
				$apModel->where ( "mac='$obj->gwmac'" )->save ( $apData );
				
				if ($obj->datas) {
					// 新路由器用户数据
					$apuserModel = M ( 'ApUsers' );
					$userdata = $obj->datas;
					Log::write ( '调试的userdata：' . count ( $userdata ) . json_encode ( $userdata ), Log::INFO );
					// $mac=$userdata[0]->mac;
					// $user = $apuserModel->where("mac='$mac'")->find ();
					// Log::write ( '调试的sql：'.$mac, Log::INFO );
					foreach ( $userdata as $v ) {
						
						$umac = $v->mac;
						$user = $apuserModel->where ( "mac='$umac'" )->find ();
						$udata ['type'] = $v->type;
						$udata ['mac'] = $v->mac;
						
						$udata ['start'] = $v->start;
						$udata ['used'] = $v->used;
						$udata ['end'] = $v->end;
						$udata ['apnode_id'] = 1;
						
						if ($user) {
							// 新
							$udata ['id'] = $user ['id'];
							$apuserModel->save ( $udata );
						} else {
							unset ( $udata ['id'] );
							$apuserModel->add ( $udata );
						}
						
						Log::write ( '调试的sql：', Log::INFO );
					}
				}
			}
			
			#根据mac返回白名单等配置数据  和服务器总配置
			#暂时不支持
		}
	}
}