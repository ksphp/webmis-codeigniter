<?php
class Sys_menus extends MY_Controller {
	/*首页*/
	public function index(){
		$data = $this->Page('sys_menus/index.html','sys_menus_m');
		
		if($this->IsMobile) {
			$data['js'] = array('js/system/sys_menus_mo.js');
			$this->MyView('system/menus/index_mo',$data);
		}else {
			$data['js'] = array('js/system/sys_menus.js');
			$this->MyView('system/menus/index',$data);
		}
	}
	/*搜索*/
	public function search(){
		if($this->IsMobile) {
			$this->load->view('system/menus/sea_mo');
		}else {
			$this->load->view('system/menus/sea');
		}
	}
	/*添加*/
	public function add(){
		$this->load->model('sys_menus_action_m');
		$data['action'] = $this->sys_menus_action_m->getAll();
		if($this->IsMobile) {
			$this->load->view('system/menus/add_mo',$data);
		}else {
			$this->load->view('system/menus/add',$data);
		}
	}
	public function addData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/*查询菜单*/
	public function getMenu(){
		$this->load->model('sys_menus_m');
		$fid = $this->input->post('fid');
		$data = $this->sys_menus_m->getMenus($fid);
		echo json_encode($data);
	}
	/*编辑*/
	public function edit(){
		$this->load->model('sys_menus_m');
		$this->load->model('sys_menus_action_m');
		$data['edit'] = $this->sys_menus_m->getOne();
		$data['action'] = $this->sys_menus_action_m->getAll();
		$this->load->view('system/menus/edit',$data);
	}
	public function editData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/*删除*/
	public function delData(){
		$this->load->model('sys_menus_m');
		echo $this->sys_menus_m->del();
	}
}
?>