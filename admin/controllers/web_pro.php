<?php
class Web_pro extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$this->load->helper('my');
		$data = $this->inc->Page($this,array('url'=>'web_pro/index.html','model'=>'web_pro_m','where'=>array('in'=>array('0','1','2'))));
		/* ClassInfo */
		$this->load->library('menus');
		$this->load->model('class_web_m');
		$data['class'] = $this->class_web_m->getClass();
		$data['adminState'] = $this->menus->getMenu('adminState');
		$data['js'] = array('web/web_pro.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'web/pro/index_mo',$data);
		}else {
			$this->inc->adminView($this,'web/pro/index',$data);
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
		$this->load->model('class_web_m');
		$fid = $this->input->post('fid');
		$data = $this->class_web_m->getMenus($fid);
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
	/* 上传图片 */
	public function upImgData($num=''){
		$config['upload_path'] = '../upload/images/pro/';
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
				$this->load->model('web_pro_m');
				$file = $this->web_pro_m->getOne('upload');
				$url = $this->input->post('img_url');
				//删除原文件
				if($url) {
					@unlink($config['upload_path'].basename($url));
					$data['upload'] = str_replace($url, $name, $file->upload);
				}else{
					$data['upload'] = $file->upload.','.$name;
				}
				echo $this->web_pro_m->updateImg($data)?'{"num":"'.$num.'","name":"'.$name.'"}':false;
			}
		}
	}
	//删除图片
	function RemoveIMG($num=''){
		$path = '../upload/images/pro/';
		$url = $this->input->post('img_url');
		if($url){
			$this->load->model('web_pro_m');
			$file = $this->web_pro_m->getOne('upload');
			@unlink($path.$url);
			$data['upload'] = str_replace(','.$url, '', $file->upload);
			echo $this->web_pro_m->updateImg($data)?'{"status":"y"}':false;
		}else{echo '{"status":"y"}';}
	}
}