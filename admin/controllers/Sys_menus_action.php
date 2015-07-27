<?php
class Sys_menus_action extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('system/sys_menu_action',$this->Lang);
		$this->load->helper('my');
		$this->load->library('inc');
		$data = $this->inc->Page($this,array('url'=>'sys_menus_action/index.html','model'=>'sys_menus_action_m'));
		$data['js'] = array('system/sys_menus_action.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'system/menus/action/index_mo',$data);
		}else {
			$this->inc->adminView($this,'system/menus/action/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_menu_action',$this->Lang);
		$this->load->view('system/menus/action/sea');
	}
	/* Add */
	public function add(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_menu_action',$this->Lang);
		$this->load->view('system/menus/action/add');
	}
	public function addData(){
		$this->lang->load('msg',$this->Lang);
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->add()?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
	/* GetTotal */
	public function getTotal(){
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->count_all();
	}
	/* Edit */
	public function edit(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_menu_action',$this->Lang);
		$this->load->model('sys_menus_action_m');
		$data['edit'] = $this->sys_menus_action_m->getOne();
		$this->load->view('system/menus/action/edit',$data);
	}
	public function editData(){
		$this->lang->load('msg',$this->Lang);
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->update()?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
	/* Delete */
	public function delData(){
		$this->lang->load('msg',$this->Lang);
		$this->load->model('sys_menus_action_m');
		echo $this->sys_menus_action_m->del()?'{"status":"y","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_suc').'","text":"'.$this->lang->line('msg_auto_close').'"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
}