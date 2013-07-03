<?php
class Sys_filemanager extends MY_Controller {
	//首页
	public function index(){
		
		$this->file_list();
		
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
	//文件列表
	public function file_list($c='.') {
		$d = opendir($c);
		while($f = readdir($d)) {
			if(strpos($f, '.') === 0) continue;
			$ff = $c . '/' . $f;
			$ext = strtolower(substr(strrchr($f, '.'), 1));
			if(!is_dir($ff)) {
				print_r($ff.'<br>');
				print_r($ext.'<br>');
			}else {
				print_r($ff.'<br>');
			}
		}
	}
}
?>