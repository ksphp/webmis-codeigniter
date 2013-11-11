<?php
class Sys_menus_action extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page('sys_menus_action/index.html','sys_menus_action_m');
		$data['js'] = array('js/system/sys_menus_action.js');
		if($this->IsMobile) {
			$this->MyView('system/menus/action/index_mo',$data);
		}else {
			$this->MyView('system/menus/action/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('system/menus/action/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('system/menus/action/add');
	}
	public function addData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/* GetTotal */
	public function getTotal(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->count_all();
	}
	/* Edit */
	public function edit(){
		$this->load->model('sys_menus_action_m');
		$data['edit'] = $this->sys_menus_action_m->getOne();
		$this->load->view('system/menus/action/edit',$data);
	}
	public function editData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Delete */
	public function delData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->del();
	}
}
?>