<?php
class Web_class extends MY_Controller {

	//首页
	public function index(){
		$data = $this->Page('web_class/index.html','web_class_m');
		$data['js'] = array(
			'js/web/web_class.js'
		);
		$this->MyView('web/class/index',$data);
	}
	//搜索
	public function search(){
		$this->load->view('web/class/sea');
	}
	//添加
	public function add(){
		$this->load->view('web/class/add');
	}
	public function addData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	//查询菜单
	public function getMenu(){
		$this->load->model('web_class_m');
		$fid = $this->input->post('fid');
		$data = $this->web_class_m->getMenus($fid);
		echo json_encode($data);
	}
	//编辑
	public function edit(){
		$this->load->model('web_class_m');
		$menus = $this->web_class_m->getOne();
		$data = $menus[0];
		$this->load->view('web/class/edit',$data);
	}
	public function editData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	//删除
	public function delData(){
		$this->load->model('web_class_m');
		echo $this->web_class_m->del();
	}
}
?>