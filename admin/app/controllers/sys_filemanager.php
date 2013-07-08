<?php
class Sys_filemanager extends MY_Controller {
	//首页
	function index(){
		$this->load->library('file_class');
		//文件根目录
		$editor = $this->input->get('editor');
		$data['file_root'] = $editor?'/upload':'';
		$this->file_class->file_root = $_SERVER['DOCUMENT_ROOT'].$data['file_root'];
		
		$action = $this->input->get('action');
		switch($action) {
			case 'mkdir':
				$path = $this->input->get('path'). $this->input->get('name');
				$perm = (int)$this->input->get('perm');
				echo $this->file_class->addDir($path,$perm);
				break;
			case 'del':
				$path = $this->input->get('path');
				$f = $this->input->get('id');
				echo $this->file_class->del($path,$f);
				break;
			case 'down':
				$this->down($this->file_class->file_root);
				break;
			case 'editor':
				$data['file_action'] = 'editor';
				$data['file_editor'] = $this->input->get('editor');
				
				$path = $this->input->get('path');
				$file = $this->input->get('file');
				$path = $file?ltrim(dirname($file),'(..'.$data['file_root'].')'):$path;
				
				$data['filelist'] = $this->file_class->lists($path);
				$data['js'] = array('js/system/sys_filemanager.js');
				$this->load->view('system/filemanager/editor',$data);
				break;
			default:
				$data['file_action'] = '';
				$data['file_editor'] = '';
				$path = $this->input->get('path');
				$data['filelist'] = $this->file_class->lists($path);
				$data['js'] = array('js/system/sys_filemanager.js');
				$this->MyView('system/filemanager/index',$data);
		}
	}
	//新建文件夹
	function addFolder() {
		$this->load->view('system/filemanager/mkdir');
	}
	//上传文件
	function upload() {
		$this->load->view('system/filemanager/upload');
	}
	//下载
	public function down($file_root){
		$this->load->library('zip');
		// 文件
		$path = $this->input->get('path');
		$files = $this->input->get('files');
		$arr = array_filter(explode(',',$files));
		foreach($arr as $val){
			$ff = $file_root.$path.$val;
			if(!is_dir($ff)) {
				$this->zip->read_file($ff);
			}else {
				$this->zip->read_dir($ff.'/',false);
			}
		}
		$this->zip->download('myphotos.zip');
	}
}
?>