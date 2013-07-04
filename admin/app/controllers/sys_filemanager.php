<?php
class Sys_filemanager extends MY_Controller {
	//首页
	public function index(){
		
		$data['filelist'] = $this->file_list();
		
		$data['js'] = array('js/system/sys_filemanager.js');
		$this->MyView('system/filemanager/index',$data);
	}
	//文件列表
	public function file_list($c='..') {
		$this->load->library('file_class');
		
		
		
		$data = '';
		$d = opendir($c);
		while($f = readdir($d)) {
			if(strpos($f, '.') === 0) continue;
			$ff = $c . '/' . $f;
			$ext = strtolower(substr(strrchr($f, '.'), 1));
			$ctime = $this->file_class->getctime($ff);
			$mtime = $this->file_class->getmtime($ff);
			$perm = $this->file_class->perm($ff).'<br>';
			if(is_dir($ff)) {
				$size = $this->file_class->dsize($ff).'<br>';
				$data['folder'][] = array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$size, 'perm'=>$perm);
			}else {
				$size = $this->file_class->size($ff).'<br>';
				$class = $this->ico_class($ext);
				$data['files'][] =  array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$size, 'perm'=>$perm, 'class'=>$class);
			}
		}
		//print_r($data);
		return $data;
	}
	//文件图标
	public function ico_class($ext='file') {
		$class = array(
			'file'=>'ico_file',
			'img'=>'ico_img',
			'pdf'=>'ico_pdf',
			'ico'=>'ico_ico'
		);
		$date = @$class[$ext]?$class[$ext]:'ico_file';
		return $date;
	}
}
?>