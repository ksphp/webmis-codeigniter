<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		/* IsLogin */
		@session_start();
		$logged = @$_SESSION['UserInfo']['logged_in'];
		$ltime = @$_SESSION['UserInfo']['ltime'];
		$ntime = time();
		//是否退出
		if(!$logged==TRUE || $ltime<$ntime){
			header('location: '.base_url().'login/loginOut.html');
		}else {
			$_SESSION['UserInfo']['ltime'] = time()+1800;
		}
	}
}