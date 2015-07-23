<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_c extends CI_Controller {
	/* Index */
	public function index(){
		$this->lang->load('inc');
		// Is not IE9
		$this->load->library('user_agent');
		if($this->agent->is_browser() && $this->agent->browser()=='Internet Explorer' && $this->agent->version()<9){
			$data['isIE'] = TRUE;
		}else{$data['isIE'] = FALSE;}
		// Is Mobile
		$mode = $this->input->get('mode');
		if($mode) {
			$data['is_mobile'] = $mode=='mobile'?true:false;
		}else {
			$data['is_mobile'] = $this->agent->is_mobile();
		}
		// View
		if($data['is_mobile']){
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/login_v_mo',$data);
		}else {
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/login_v',$data);
		}
	}
	/* Login */
	public function login(){
		$this->load->model('sys_admin_m');
		$uname = $this->input->post('uname');
		$passwd = $this->input->post('passwd');
		$uinfo = $this->sys_admin_m->login($uname,$passwd);
		if($uinfo){
			if($uinfo->state == 1){
				$_SESSION['AdminInfo']['uname'] = $uinfo->uname;
				$_SESSION['AdminInfo']['name'] = $uinfo->name;
				$_SESSION['AdminInfo']['department'] = $uinfo->department;
				$_SESSION['AdminInfo']['position'] = $uinfo->position;
				$_SESSION['AdminInfo']['logged_in'] = TRUE;
				$_SESSION['AdminInfo']['is_mobile'] = $this->input->post('is_mobile');
				$_SESSION['AdminInfo']['permArr'] = $this->splitPerm($uinfo->perm);
				$_SESSION['AdminInfo']['ltime'] = time()+1800;
				$this->loginLog('Login',$uname);
				echo '{"status":"suc","msg":""}';
			}else{
				$this->loginLog('Disable',$uname);
				echo '{"status":"err","msg":"<b class=\"red\">该用户已被禁用！</b>"}';
			}
		}else{
			$this->loginLog('Error',$uname);
			echo '{"status":"err","msg":"<b class=\"red\">帐号或密码有误！</b>"}';
		}
	}
	/* LoginOut */
	public function loginOut(){
		$uname = $_SESSION['AdminInfo']['uname']?$_SESSION['AdminInfo']['uname']:'Auto Logout';
		$this->loginLog('Logout',$uname);
		unset($_SESSION['AdminInfo']);
		header('location: '.base_url());
	}
	/* LoginLog */
	private function loginLog($type,$uname){
		$ip = $this->input->ip_address();
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$this->load->model('log_admin_login_m');
		$this->log_admin_login_m->add($type,$uname,$ip,$agent);
	}
	/* SplitPerm */
	private function splitPerm($perm){
		if($perm){
			$arr = explode(' ', $perm);
			foreach($arr as $val) {
				$num = explode(':', $val);
				$permArr[$num[0]]= $num[1];
			}
			return $permArr;
		}
	}
}