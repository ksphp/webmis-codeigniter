<?php
class Online extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		
		/* 测试数据 */
		$data['test'] = '在线服务';
		
		$this->MyView('online/index',$data);
	}
}
?>