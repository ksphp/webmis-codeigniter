<?php
class Index_c extends CI_Controller {
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuUser($this);	//WEB分类菜单
		$data['css'] = array('index.css');
		$data['js'] = array('index.js');
		$this->inc->mView($this,'index/index',$data);
	}
}