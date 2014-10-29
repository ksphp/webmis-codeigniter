<?php
class Web_class extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('menus');
		$data = $this->Page(array('url'=>'web_class/index.html','model'=>'web_class_m'));
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('js/web/web_class.js');
		if($this->IsMobile) {
			$this->MyView('web/class/index_mo',$data);
		}else {
			$this->MyView('web/class/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('web/class/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('web/class/add');
	}
	public function addData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/* GetMenu */
	public function getMenu(){
		$this->load->model('web_class_m');
		$fid = $this->input->post('fid');
		$data = $this->web_class_m->getMenus($fid);
		echo json_encode($data);
	}
	/* Edit */
	public function edit(){
		$this->load->model('web_class_m');
		$data['edit'] = $this->web_class_m->getOne();
		$this->load->view('web/class/edit',$data);
	}
	public function editData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Delete */
	public function delData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->del();
	}
	/* Audit */
	public function auditData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->audit();
	}
}
?>