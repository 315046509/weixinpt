<?php
class TerminalAction extends BackAction{
	public function index(){
		$db=D('ApUsers');
		
		$count= $db->count();
		$Page= new Page($count,25);
		$show= $Page->show();
		$list = $db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$this->assign('list',$list);
		$this->assign('page',$show);
 
		$this->display();
	}
	
	 
	public function search(){
		$name=$this->_post('name');
		$type=$this->_post('type');
		switch($type){
			case 1:
			$data['username']=$name;
			break;
			case 2:
			$data['id']=$name;
			break;
			case 3:
			$data['email']=$name;
		}
		//dump($where);
		$list=M('Users')->where($data)->select();
		$this->assign('info',$list);
		$this->display('index');
	
	
    }
}