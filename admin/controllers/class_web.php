<?php
class Class_web extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$this->load->helper('my');
		$this->load->library('menus');
		$data = $this->inc->Page($this,array('url'=>'class_web/index.html','model'=>'class_web_m'));
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('class/class_web.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'class/web/index_mo',$data);
		}else {
			$this->inc->adminView($this,'class/web/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('class/web/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('class/web/add');
	}
	public function addData(){
		$this->load->model('class_web_m');
		echo $this->class_web_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/* GetMenu */
	public function getMenu(){
		$this->load->model('class_web_m');
		$fid = $this->input->post('fid');
		$data = $this->class_web_m->getMenus($fid);
		echo json_encode($data);
	}
	/* Edit */
	public function edit(){
		$this->load->model('class_web_m');
		$data['edit'] = $this->class_web_m->getOne();
		$this->load->view('class/web/edit',$data);
	}
	public function editData(){
		$this->load->model('class_web_m');
		echo $this->class_web_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Delete */
	public function delData(){
		$this->load->model('class_web_m');
		echo $this->class_web_m->del();
	}
	/* Audit */
	public function auditData(){
		$this->load->model('class_web_m');
		echo $this->class_web_m->audit();
	}
}