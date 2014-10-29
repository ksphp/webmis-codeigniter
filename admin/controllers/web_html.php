<?php
class Web_html extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page(array('url'=>'web_html/index.html','model'=>'web_html_m','page','where'=>array('in'=>array('0','1','2'))));
		/* ClassInfo */
		$this->load->library('menus');
		$this->load->model('web_class_m');
		$data['class'] = $this->web_class_m->getClass();
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('js/web/web_html.js');
		if($this->IsMobile) {
			$this->MyView('web/html/index_mo',$data);
		}else {
			$this->MyView('web/html/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('web/html/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('web/html/add');
	}
	public function addData(){
		$this->load->model('web_html_m');
		if(isset($_POST['content'])) {
			echo $this->web_html_m->add()?'{"status":"y"}':'{"status":"n"}';
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
		$this->load->model('web_html_m');
		$data['edit'] = $this->web_html_m->getOne();
		$this->load->view('web/html/edit',$data);
	}
	public function editData(){
		$this->load->model('web_html_m');
		if(isset($_POST['content'])) {
			echo $this->web_html_m->update()?'{"status":"y"}':'{"status":"n"}';
		}
	}
	/* Delete */
	public function delData(){
		$this->load->model('web_html_m');
		echo $this->web_html_m->del();
	}
	/* Audit */
	public function auditData(){
		$this->load->model('web_html_m');
		echo $this->web_html_m->audit();
	}
	/* View */
	public function show(){
		$this->load->model('web_html_m');
		$data['show'] = $this->web_html_m->getOne();
		$this->load->view('web/html/show',$data);
	}
}
?>