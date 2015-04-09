<?php
class Index_c extends CI_Controller {
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuUser($this);	//WEB分类菜单
		$data['css'] = array('index.css');
		$data['js'] = array('index.js');
		$this->inc->mView($this,'index/index',$data);
	}
	/* 拍照上传 */
	public function Camera(){
		$this->load->library('inc');
		$data['js'] = array('camera.js');
		$this->inc->htmlView($this,'camera/index',$data);
	}
	public function CameraData(){
		$img = $this->input->post('img');
		$image=base64_decode(str_replace('data:image/jpeg;base64,','',$img));
		$file = '../upload/test.jpg';
		$fp=fopen($file,'w');
		echo @fwrite($fp,$image)?'{"status":"y"}':'{"status":"n"}';
		fclose($fp);
	}
}