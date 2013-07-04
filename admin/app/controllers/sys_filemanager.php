<?php
class Sys_filemanager extends MY_Controller {
	//首页
	public function index(){
		$this->load->library('file_class');
		
		$this->file_class->file_root = '/upload/';
		$path = $this->input->get('path');
		$data['filelist'] = $this->file_class->lists($path);
		
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
}
?>