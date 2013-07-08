<?php
class Sys_filemanager extends MY_Controller {
	//首页
	function index(){
		$data['fileGetUrl'] = 'index';
		$this->config();
		$path = $this->input->get('path');
		$data['filelist'] = $this->file_class->lists($path);
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
	//编辑器
	function editor() {
		$data['fileGetUrl'] = 'editor';
		$this->config();
		$path = $this->input->get('path');
		$data['filelist'] = $this->file_class->lists($path);
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->load->view('system/filemanager/editor',$data);
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
	//上传文件
	function upload() {
		$this->load->view('system/filemanager/upload');
	}
	//删除
	public function delData(){
		$this->config();
		$path = $this->input->post('path');
		$f = $this->input->post('id');
		echo $this->file_class->del($path,$f);
	}
	//下载
	public function down(){
		$this->load->library('zip');
		$this->config();
		// 文件
		$path = $this->input->get('path');
		$files = $this->input->get('files');
		$arr = array_filter(explode(',',$files));
		foreach($arr as $val){
			$ff = $this->file_class->file_root.$path.$val;
			if(!is_dir($ff)) {
				$this->zip->read_file($ff);
			}else {
				$this->zip->read_dir($ff.'/',false);
			}
		}
		$this->zip->download('myphotos.zip');
	}
	//配置
	private function config() {
		$this->load->library('file_class');
		$this->file_class->file_root = $_SERVER['DOCUMENT_ROOT'].'/';
	}
}
?>