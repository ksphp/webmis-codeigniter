<?php
class News extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		
		/* 测试数据 */
		$data['test'] = '新闻中心';
		
		$this->MyView('news/index',$data);
	}
}
?>