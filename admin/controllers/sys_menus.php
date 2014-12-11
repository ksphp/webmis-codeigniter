<?php
class Sys_menus extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page(array('url'=>'sys_menus/index.html','model'=>'sys_menus_m'));
		$data['js'] = array('system/sys_menus.js');
		if($this->IsMobile) {
			$this->MyView('system/menus/index_mo',$data);
		}else {
			$this->MyView('system/menus/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('system/menus/sea');
	}
	/* Add */
	public function add(){
		$this->load->model('sys_menus_action_m');
		$data['action'] = $this->sys_menus_action_m->getAll();
		$this->load->view('system/menus/add',$data);
	}
	public function addData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/* GetMenu */
	public function getMenu(){
		$this->load->model('sys_menus_m');
		$fid = $this->input->post('fid');
		$data = $this->sys_menus_m->getMenus($fid);
		echo json_encode($data);
	}
	/* Edit */
	public function edit(){
		$this->load->model('sys_menus_m');
		$this->load->model('sys_menus_action_m');
		$data['edit'] = $this->sys_menus_m->getOne();
		$data['action'] = $this->sys_menus_action_m->getAll();
		if($this->IsMobile) {
			$this->load->view('system/menus/edit_mo',$data);
		}else {
			$this->load->view('system/menus/edit',$data);
		}
	}
	public function editData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Delete */
	public function delData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->del();
	}
}