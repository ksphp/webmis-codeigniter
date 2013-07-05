<?php
class file_class{
	var $file_root = '.';
	
	//文件列表
	function lists($c='/') {
		//替换 “../”|“.”
		$c = preg_replace('/\.\.\/|\./','',$c);
		//添加 “/”
		$c = substr($c,0,1)=='/'?$c:'/'.$c;
		$c = substr($c,-1)=='/'?$c:$c.'/';
		//路径
		$data['path'] = $c;
		$c = $this->file_root.$c;
		//读取文件
		if(is_dir($c)) {
			$d = opendir($c);
			while($f = readdir($d)) {
				if(strpos($f, '.') === 0) continue;
				$ff = $c . '/' . $f;
				$ext = strtolower(substr(strrchr($f, '.'), 1));
				$ctime = $this->getctime($ff);
				$mtime = $this->getmtime($ff);
				$perm = $this->perm($ff).'<br>';
				if(is_dir($ff)) {
					$size = $this->dsize($ff).'<br>';
					$data['folder'][] = array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$size, 'perm'=>$perm);
				}else {
					$size = $this->size($ff).'<br>';
					$class = $this->ico_class($ext);
					$data['files'][] =  array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$size, 'perm'=>$perm, 'class'=>$class);
				}
			}
		}else {
			show_404();
		}
		return $data;
	}
	//文件图标
	private function ico_class($ext='file') {
		$class = array(
			'file'=>'ico_file',
			'img'=>'ico_img',
			'pdf'=>'ico_pdf',
			'ico'=>'ico_ico'
		);
		$date = @$class[$ext]?$class[$ext]:'ico_file';
		return $date;
	}
	//新建文件夹
	function addDir($path,$perm=0755) {
		return mkdir($this->file_root.$path, octdec($perm));
	}
	//文件夹大小
	function dsize($dir) {
		return $this->formatBytes($this->dirsize($dir));
	}
	function dirsize($dir) {
		$handle=opendir($dir);
		$size = 0;
		while ( $file=readdir($handle) ) {
			if ( ( $file == "." ) || ( $file == ".." ) ) continue;
			if ( is_dir("$dir/$file") )
				$size += $this->dirsize("$dir/$file");
			else
				$size += filesize("$dir/$file");
		}
		closedir($handle);
		return $size;
	}
	//文件大小
	function size($f='') {
		return $this->formatBytes(filesize($f));
	}
	//文件权限
	function perm($f='') {
		return substr(sprintf('%o', fileperms($f)), -4);
	}
	//创建时间
	function getctime($f='') {
		return date("Y-m-d H:i:s",filectime($f));
	}
	//修改时间
	function getmtime($f='') {
		return date("Y-m-d H:i:s",filemtime($f));
	}
	//转换
	private function formatBytes($bytes){
		if($bytes >= 1073741824){
			$bytes = round($bytes / 1073741824 * 100) / 100 . ' GB';
		}elseif($bytes >= 1048576){
			$bytes = round($bytes / 1048576 * 100) / 100 . ' MB';
		}elseif($bytes >= 1024){
			$bytes = round($bytes / 1024 * 100) / 100 . ' KB';
		}else{
			$bytes = $bytes . ' Bytes';
		}
		return $bytes;
	}
}
?>