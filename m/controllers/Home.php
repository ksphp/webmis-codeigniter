<?php
class Home extends CI_Controller {
	public function index(){
		/* Lang */
		$this->load->library('user_agent');
		$lang = $this->agent->languages();
		$Lang = $lang?$lang[0]:'en-us';
		$this->lang->load('text',$Lang);
		
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuUser($this);	//WEB Menu
		$data['LoadCSS'] = array('index.css');
		$data['LoadJS'] = array('index.js');
		$this->inc->mView($this,'index/index',$data);
	}
}