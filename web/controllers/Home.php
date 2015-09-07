<?php
class Home extends CI_Controller {
	public function index(){
		/* Lang */
		$this->load->library('user_agent');
		$lang = $this->agent->languages();
		$Lang = $lang?$lang[0]:'en-us';
		$this->lang->load('text',$Lang);
		
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuUser($this);	// WEB Menu
		$data['LoadCSS'] = array('index.css');
		$data['LoadJS'] = array('index.js');
		if($this->IsMobile()){
			redirect('m/home');
		}else{
			$this->inc->webView($this,'index/index',$data);
		}
	}
	/* IsMobile */
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
}