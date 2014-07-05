<?php
class TestAction extends BaseAction {
	
	// SNS登录首页
	public function index() {
		$this->display ();
	}
	
	// 登录地址
	public function login($type = null) {
		empty ( $type ) && $this->error ( '参数错误' );
		
		// 加载ThinkOauth类并实例化一个对象
		import ( "ORG.ThinkSDK.ThinkOauth" );
		$sns = ThinkOauth::getInstance ( $type );
		
		// 跳转到授权页面
		redirect ( $sns->getRequestCodeURL () );
	}
}