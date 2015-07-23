<?php
class Log_admin_login extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('log/log_login');
		$this->load->library('inc');
		$this->load->helper('my');
		$data = $this->inc->Page($this,array('url'=>'log_admin_login/index.html','model'=>'log_admin_login_m'));
		$data['js'] = array('log/log_admin_login.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'log/admin/login_v_mo',$data);
		}else {
			$this->inc->adminView($this,'log/admin/login_v',$data);
		}
	}
	/* Search */
	public function search(){
		$this->lang->load('inc');
		$this->lang->load('log/log_login');
		$this->load->view('log/admin/login_sea');
	}
	/* Delete */
	public function delData(){
		$this->load->model('log_admin_login_m');
		echo $this->log_admin_login_m->del()?'{"status":"y"}':'{"status":"n"}';
	}
}
?>