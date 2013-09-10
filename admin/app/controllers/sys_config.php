<?php
class Sys_config extends MY_Controller {
	/*首页*/
	public function index(){
		$data['js'] = array('js/system/sys_config.js',);
		if($this->IsMobile) {
			$this->MyView('system/config/index_mo',$data);
		}else {
			$this->MyView('system/config/index',$data);
		}
	}
	/*编辑*/
	public function editData(){
		$this->load->model('sys_config_m');
		echo $this->sys_config_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
}
?>