<?php
class Sys_change_passwd extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$data['js'] = array('index/change_passwd.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'index/change_passwd_v_mo',$data);
		}else {
			$this->inc->adminView($this,'index/change_passwd_v',$data);
		}
	}
	/* ChangePasswd */
	public function changePasswd(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->updatePasswd()?'{"status":"y"}':'{"status":"n"}';
	}
}
?>