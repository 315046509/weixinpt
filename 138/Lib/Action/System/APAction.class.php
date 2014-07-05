<?php
class APAction extends BackAction {
	
	public function index() {
		$db=D('ApNodes');
		
	
		$count=$db->count();
		$page=new Page($count,25);
		$info=$db->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('list',$info);
		$this->assign('page',$page->show());
		$this->display();
	
	}
	public function branches() {
		$branches = $this->company_model->where ( array (
				'isbranch' => 1,
				'token' => $this->token 
		) )->order ( 'taxis ASC' )->select ();
		$this->assign ( 'branches', $branches );
		$this->display ();
	}
	public function delete() {
		$where = array (
				'token' => $this->token,
				'isbranch' => 1,
				'id' => intval ( $_GET ['id'] ) 
		);
		$rt = $this->company_model->where ( $where )->delete ();
		if ($rt == true) {
			$this->success ( '删除成功', U ( 'Company/branches', array (
					'token' => $this->token,
					'isBranch' => 1 
			) ) );
		} else {
			$this->error ( '服务器繁忙,请稍后再试', U ( 'Company/branches', array (
					'token' => $this->token,
					'isBranch' => 1 
			) ) );
		}
	}
	public function add() {
		if ($_POST) {
			
			// 存
			$data = $_POST;
			
			$id = $_GET ['id'];
			
			$ap = M ( 'ApNode' );
			$data ['province'] = $data ['position'] [0];
			$data ['city'] = $data ['position'] [1];
			$data ['country'] = $data ['position'] [2];
			$data ['deploy_status'] = 0;
			$data ['device_location'] = $data ['position'];
			$data ['owner_id'] = session ( 'uid' );
			
			
			// dump($data);
			if ($id) {
				$data ['id'] = $id;
				$ap->save ( $data );
			} else {
				$ap->add ( $data );
			}
			$ap->getLastSql ();
		} else {
			// 示
			if ($_GET ['id']) {
				// 辑
			}
			$this->display ();
		}
	}
	public function wxsave() {
		$this->all_save ( 'Wxuser' );
	}
}

?>