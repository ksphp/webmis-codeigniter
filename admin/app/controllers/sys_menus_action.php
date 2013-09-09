<?php
class Sys_menus_action extends MY_Controller {
	/*首页*/
	public function index(){
		$data = $this->Page('sys_menus_action/index.html','sys_menus_action_m');
		if($this->IsMobile) {
			$data['js'] = array('js/system/sys_menus_action_mo.js');
			$this->MyView('system/menus/action/index_mo',$data);
		}else {
			$data['js'] = array('js/system/sys_menus_action.js');
			$this->MyView('system/menus/action/index',$data);
		}
	}
	/*搜索*/
	public function search(){
		if($this->IsMobile) {
			$this->load->view('system/menus/action/sea_mo');
		}else {
			$this->load->view('system/menus/action/sea');
		}
	}
	/*添加*/
	public function add(){
		if($this->IsMobile) {
			$this->load->view('system/menus/action/add_mo');
		}else {
			$this->load->view('system/menus/action/add');
		}
	}
	public function addData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/*返回表总数*/
	public function getTotal(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->count_all();
	}
	/*编辑*/
	public function edit(){
		$this->load->model('sys_menus_action_m');
		$data['edit'] = $this->sys_menus_action_m->getOne();
		if($this->IsMobile) {
			$this->load->view('system/menus/action/edit_mo',$data);
		}else {
			$this->load->view('system/menus/action/edit',$data);
		}
	}
	public function editData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/*删除*/
	public function delData(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->del();
	}
}
?>