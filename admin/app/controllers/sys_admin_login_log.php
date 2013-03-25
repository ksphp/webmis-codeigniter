<?php
class Sys_admin_login_log extends MY_Controller {
	
	//首页
	public function index(){
		$data = $this->Page('sys_admin_login_log/index.html','sys_admin_login_log_m');
		$data['js'] = array(
			'js/system/sys_admin_login_log.js'
		);
		$this->MyView('system/log/login_v',$data);
	}
	//搜索
	public function search(){
		$this->load->view('system/log/login_sea');
	}
	//删除
	public function delData(){
		$this->load->model('sys_admin_login_log_m');
		echo $this->sys_admin_login_log_m->del();
	}
}
?>