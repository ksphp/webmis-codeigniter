<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_c extends CI_Controller {

	public function index(){
		$this->load->view('login_v');
	}
	//登录
	public function login(){
		$this->load->model('sys_admin_m');
		$uname = $this->input->post('uname');
		$passwd = $this->input->post('passwd');
		$uinfo = $this->sys_admin_m->login($uname,$passwd);
		if($uinfo){
			if($uinfo[0]->state == 1){
				$this->load->library('Session');
				$udata = array(
					'uname'  => $uinfo[0]->uname,
					'name'  => $uinfo[0]->name,
					'department'  => $uinfo[0]->department,
					'logged_in' => TRUE,
					'permArr' => $this->splitPerm($uinfo[0]->perm)
				);
				session_start();
				$_SESSION['uinfo']=$udata;
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
	//退出登录
	public function loginOut(){
		session_start();
		$uname = $_SESSION['uinfo']['uname']?$_SESSION['uinfo']['uname']:'Auto Logout';
		$this->loginLog('退出',$uname);
		session_destroy();
		header('location: '.base_url());
	}
	//记录登录日志
	private function loginLog($type,$uname){
		$ip = $this->input->ip_address();
		$headers = $this->input->request_headers();
		$agent = @$headers['User-agent'];
		$this->load->model('sys_admin_login_log_m');
		$this->sys_admin_login_log_m->add($type,$uname,$ip,$agent);
	}
	//拆分权限
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
?>