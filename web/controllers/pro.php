<?php
class Pro extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		
		/* 测试数据 */
		$data['test'] = '产品中心';
		
		$this->MyView('pro/index',$data);
	}
}
?>