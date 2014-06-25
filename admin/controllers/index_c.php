<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_c extends CI_Controller {
	/* Index */
	public function index(){
		$data['is_mobile'] = $this->IsMobile();
		
		if($data['is_mobile']) {
			$this->load->view('themes/'.$this->config->config['admin_themes'].'/inc/login_v_mo',$data);
		}else {
			$this->load->view('themes/'.$this->config->config['admin_themes'].'/inc/login_v',$data);
		}
	}
	/* Login */
	public function login(){
		$this->load->model('sys_admin_m');
		$uname = $this->input->post('uname');
		$passwd = $this->input->post('passwd');
		$uinfo = $this->sys_admin_m->login($uname,$passwd);
		if($uinfo){
			if($uinfo[0]->state == 1){
				session_start();
				$_SESSION['uinfo']['uname'] = $uinfo[0]->uname;
				$_SESSION['uinfo']['name'] = $uinfo[0]->name;
				$_SESSION['uinfo']['department'] = $uinfo[0]->department;
				$_SESSION['uinfo']['logged_in'] = TRUE;
				$_SESSION['uinfo']['is_mobile'] = $this->input->post('is_mobile');
				$_SESSION['uinfo']['permArr'] = $this->splitPerm($uinfo[0]->perm);
				$this->loginLog('登录',$uname);
				echo true;
			}else{
				$this->loginLog('禁用',$uname);
				echo 2;
			}
		}else{
			$this->loginLog('失败',$uname);
			echo false;
		}
	}
	/* LoginOut */
	public function loginOut(){
		session_start();
		$uname = $_SESSION['uinfo']['uname']?$_SESSION['uinfo']['uname']:'Auto Logout';
		$this->loginLog('退出',$uname);
		session_destroy();
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
?>