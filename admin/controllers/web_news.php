<?php
class Web_news extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$this->load->helper('my');
		$data = $this->inc->Page($this,array('url'=>'web_news/index.html','model'=>'web_news_m','where'=>array('in'=>array('0','1','2'))));
		/* ClassInfo */
		$this->load->library('menus');
		$this->load->model('class_web_m');
		$data['class'] = $this->class_web_m->getClass();
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('web/web_news.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'web/news/index_mo',$data);
		}else {
			$this->inc->adminView($this,'web/news/index',$data);
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
		$this->load->model('class_web_m');
		$fid = $this->input->post('fid');
		$data = $this->class_web_m->getMenus($fid);
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
		$this->load->model('class_web_m');
		$this->load->model('web_news_m');
		$html = '[';
		$menus = $this->class_web_m->getMenus('2');
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
	/* 上传图片 */
	public function upImgData($num=''){
		$config['upload_path'] = '../upload/images/news/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '600';
		$this->load->library('upload', $config);
		//执行
		if (!$this->upload->do_upload('upimg_'.$num)){
			$data = $this->upload->display_errors();
			echo false;
		}else {
			//文件信息
			$info = $this->upload->data();
			//上传文件重命名
			$name = date('YmdHis').rand(100,999).$info['file_ext'];
			$F1 = $config['upload_path'].$info['file_name'];
			$F2 = $config['upload_path'].$name;
			//移动文件
			if(rename($F1,$F2)) {
				$this->load->model('web_news_m');
				$file = $this->web_news_m->getOne('upload');
				$url = $this->input->post('img_url');
				//删除原文件
				if($url) {
					@unlink($config['upload_path'].basename($url));
					$data['upload'] = str_replace($url, $name, $file->upload);
				}else{
					$data['upload'] = $file->upload.','.$name;
				}
				echo $this->web_news_m->updateImg($data)?'{"num":"'.$num.'","name":"'.$name.'"}':false;
			}
		}
	}
	//删除图片
	function RemoveIMG($num=''){
		$path = '../upload/images/news/';
		$url = $this->input->post('img_url');
		if($url){
			$this->load->model('web_news_m');
			$file = $this->web_news_m->getOne('upload');
			@unlink($path.$url);
			$data['upload'] = str_replace(','.$url, '', $file->upload);
			echo $this->web_news_m->updateImg($data)?'{"status":"y"}':false;
		}else{echo '{"status":"y"}';}
	}
}