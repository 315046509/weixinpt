<?php
class AuthcodeAction extends BackAction {
	// 
	public function index() {
		
		if ($_POST) {
			$this->save ( $_POST );
		}
		$authcode = M ( 'ApAuthcode' );
		$ownerid = session ( 'uid' );
		$code = $authcode->where ( 'owner_id=' . $ownerid )->find ();
		// dump($code);
		$this->assign ( 'authcode', $code ['authcode'] );
		$this->display ();
	
	}
	
	function save($data) {
		
		$authcode = M ( 'ApAuthcode' );
		$ownerid = session ( 'uid' );
		
		$data ['owner_id'] = $ownerid;
		$data ['authcode'] = $data ['authcode'];
		
		$code = $authcode->where ( 'owner_id=' . $ownerid )->find ();
		if ($code) {
			$data['modification_date']=date('Y-m-d H:i:s',time());
			$authcode->where ( 'owner_id=' . $ownerid )->save ( $data );
		} else {
			$authcode->add ( $data );
		}
	}

}
?>