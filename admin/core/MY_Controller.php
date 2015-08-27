<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	/* Public Variables */
	public $Cid;
	public $IsMobile;
	public $Lang;
		
	function __construct(){
		parent::__construct();
		/* IsLogin */
		$logged = $_SESSION['AdminInfo']['logged_in'];
		$ltime = @$_SESSION['UserInfo']['ltime'];
		$ntime = time();
		if(!$logged){
			redirect('home/loginOut');
		}else {
			$_SESSION['AdminInfo']['ltime'] = time()+1800;
		}
		/* INC */
		$this->IsMobile = @$_SESSION['AdminInfo']['is_mobile'];
		$this->Lang = @$_SESSION['AdminInfo']['lang'];
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
			header('location: '.base_url().$this->dirName.'home/loginOut.html');
			exit();
		}
	}
}
