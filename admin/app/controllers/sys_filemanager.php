<?php
class Sys_filemanager extends MY_Controller {
	//首页
	function index(){
		$this->config();
		$path = $this->input->get('path');
		$data['filelist'] = $this->file_class->lists($path);
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
	//新建文件夹
	function addFolder() {
		$this->load->view('system/filemanager/mkdir');
	}
	function addFolderData() {
		$this->config();
		$path = $this->input->post('path'). $this->input->post('name');
		$perm = (int)$this->input->post('perm');
		echo $this->file_class->addDir($path,$perm)?'{"status":"y"}':'{"status":"n"}';
	}
	//配置
	private function config() {
		$this->load->library('file_class');
		$this->file_class->file_root = $_SERVER['DOCUMENT_ROOT'].'/upload/';
	}
}
?>