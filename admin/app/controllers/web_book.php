<?php
class Web_book extends MY_Controller {
	/*首页*/
	public function index(){
		$data = $this->Page('web_book/index.html','web_book_m');
		$data['js'] = array('js/web/web_book.js');
		
		$this->MyView('web/book/index',$data);
	}
	/*搜索*/
	public function search(){
		$this->load->view('web/book/sea');
	}
	/*编辑*/
	public function edit(){
		$this->load->model('web_book_m');
		$menus = $this->web_book_m->getOne();
		$data = $menus[0];
		$this->load->view('web/book/edit',$data);
	}
	public function editData(){
		$this->load->model('web_book_m');
		echo $this->web_book_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/*删除*/
	public function delData(){
		$this->load->model('web_book_m');
		echo $this->web_book_m->del();
	}
	/*预览*/
	public function show(){
		$this->load->model('web_book_m');
		$menus = $this->web_book_m->getOne();
		$data = $menus[0];
		$this->load->view('web/book/show',$data);
	}
}
?>