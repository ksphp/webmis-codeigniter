<?php
class Web_news extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page(array('url'=>'web_news/index.html','model'=>'web_news_m','where'=>array('in'=>array('0','1','2'))));
		/* ClassInfo */
		$this->load->library('menus');
		$this->load->model('web_class_m');
		$data['class'] = $this->web_class_m->getClass();
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('web/web_news.js');
		if($this->IsMobile) {
			$this->MyView('web/news/index_mo',$data);
		}else {
			$this->MyView('web/news/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('web/news/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('web/news/add');
	}
	public function addData(){
		$this->load->model('web_news_m');
		if(isset($_POST['content'])) {
			echo $this->web_news_m->add()?'{"status":"y"}':'{"status":"n"}';
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
		$this->load->model('web_news_m');
		$data['edit'] = $this->web_news_m->getOne();
		$this->load->view('web/news/edit',$data);
	}
	public function editData(){
		$this->load->model('web_news_m');
		if(isset($_POST['content'])) {
			echo $this->web_news_m->update()?'{"status":"y"}':'{"status":"n"}';
		}
	}
	/* Delete */
	public function delData(){
		$this->load->model('web_news_m');
		echo $this->web_news_m->del();
	}
	/* Audit */
	public function auditData(){
		$this->load->model('web_news_m');
		echo $this->web_news_m->audit();
	}
	/* Chart */
	public function chartData() {
		$this->load->model('web_class_m');
		$this->load->model('web_news_m');
		$html = '[';
		$menus = $this->web_class_m->getMenus('2');
		foreach($menus as $val){
			$num = $this->web_news_m->count_all(array('class' =>':'.$val->id.':'));
			$html .= '["'.$val->title.'",'.$num.']';
			if($val!=end($menus)) {$html .= ',';}
		}
		$html .= ']';
		echo $html;
		/*echo '[["分类1",0],["分类2",0],["分类3",0],["分类4",0]]';*/
	}
	/* View */
	public function show(){
		$this->load->model('web_news_m');
		$data['show'] = $this->web_news_m->getOne();
		$this->load->view('web/news/show',$data);
	}
}
?>