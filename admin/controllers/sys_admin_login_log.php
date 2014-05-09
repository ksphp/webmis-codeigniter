<?php
class Sys_admin_login_log extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page('sys_admin_login_log/index.html','sys_admin_login_log_m');
		$data['js'] = array('js/system/sys_admin_login_log.js');
		if($this->IsMobile) {
			$this->MyView('system/logs/login_v_mo',$data);
		}else {
			$this->MyView('system/logs/login_v',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('system/logs/login_sea');
	}
	/* Delete */
	public function delData(){
		$this->load->model('sys_admin_login_log_m');
		echo $this->sys_admin_login_log_m->del();
	}
}
?>