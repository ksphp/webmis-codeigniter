<?php
class Sys_filemanager extends MY_Controller {
	//首页
	public function index(){
		$data['file_root'] = '/upload/';
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
}
?>