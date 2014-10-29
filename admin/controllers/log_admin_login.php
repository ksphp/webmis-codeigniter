<?php
class Log_admin_login extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page(array('url'=>'log_admin_login/index.html','model'=>'log_admin_login_m'));
		$data['js'] = array('js/log/log_admin_login.js');
		if($this->IsMobile) {
			$this->MyView('log/admin/login_v_mo',$data);
		}else {
			$this->MyView('log/admin/login_v',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('log/admin/login_sea');
	}
	/* Delete */
	public function delData(){
		$this->load->model('log_admin_login_m');
		echo $this->log_admin_login_m->del();
	}
}
?>