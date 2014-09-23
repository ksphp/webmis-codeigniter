<?php
class Web_pro extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page('web_pro/index.html','web_pro_m','page',array('in'=>array('0','1','2')),'id desc');
		/* ClassInfo */
		$this->load->library('menus');
		$this->load->model('web_class_m');
		$data['class'] = $this->web_class_m->getClass();
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('js/web/web_pro.js');
		if($this->IsMobile) {
			$this->MyView('web/pro/index_mo',$data);
		}else {
			$this->MyView('web/pro/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('web/pro/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('web/pro/add');
	}
	public function addData(){
		$this->load->model('web_pro_m');
		if(isset($_POST['content'])) {
			echo $this->web_pro_m->add()?'{"status":"y"}':'{"status":"n"}';
		}
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
		$this->load->model('web_pro_m');
		$data['edit'] = $this->web_pro_m->getOne();
		$this->load->view('web/pro/edit',$data);
	}
	public function editData(){
		$this->load->model('web_pro_m');
		if(isset($_POST['content'])) {
			echo $this->web_pro_m->update()?'{"status":"y"}':'{"status":"n"}';
		}
	}
	/* Delete */
	public function delData(){
		$this->load->model('web_pro_m');
		echo $this->web_pro_m->del();
	}
	/* Audit */
	public function auditData(){
		$this->load->model('web_pro_m');
		echo $this->web_pro_m->audit();
	}
	/* View */
	public function show(){
		$this->load->model('web_pro_m');
		$data['show'] = $this->web_pro_m->getOne();
		$this->load->view('web/pro/show',$data);
	}
}
?>