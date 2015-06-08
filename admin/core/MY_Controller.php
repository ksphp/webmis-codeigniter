<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	/* Public Variables */
	var $Cid;
	var $IsMobile;
	
	function __construct(){
		parent::__construct();
		/* IsLogin */
		session_start();
		$logged = $_SESSION['AdminInfo']['logged_in'];
		$this->IsMobile = $_SESSION['AdminInfo']['is_mobile'];
		if(!$logged){
			redirect('index_c/loginOut');
		}
		/* Prem */
		$this->menuPrem();
	}
	/* Prem */
	private function menuPrem(){
		$this->load->model('sys_menus_m');
		$Cname = $this->router->class;
		$Menu = $this->sys_menus_m->getID($Cname);
		$this->Cid = $Menu->id;
		$permArr = $_SESSION['AdminInfo']['permArr'];
		if(!isset($permArr[$this->Cid])){
			header('location: '.base_url().$this->dirName.'index_c/loginOut.html');
			exit();
		}
	}
/*------------------------------------------------------------------
* Display
-------------------------------------------------------------------*/
	public function DisplayTop($val=''){
		$_SESSION['DisplayTop'] = $val;
	}
}
