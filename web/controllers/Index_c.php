<?php
class Index_c extends CI_Controller {
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuUser($this);	//WEB分类菜单
		$data['css'] = array('index.css');
		$data['js'] = array('index.js');
		if($this->IsMobile()){
			redirect('m/index_c');
		}else{
			$this->inc->webView($this,'index/index',$data);
		}
	}
	/*是否手机设备*/
	private function IsMobile() {
		$this->load->library('user_agent');
		$mode = $this->input->get('mode');
		if($mode) {
			$data = $mode=='mobile'?true:false;
		}else {
			$data = $this->agent->is_mobile();
		}
		return $data;
	}
	//QQ登录
	function QQLogin(){
		$this->load->library('login/qq');
		$this->qq->Login();
	}
	function qq_call_back(){
		$this->load->library('login_qq');
		$uinfo = $this->qq->call_back();
	}
}