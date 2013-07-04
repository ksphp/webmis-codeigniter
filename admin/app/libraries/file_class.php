<?php
class file_class{
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
			$bytes = $bytes . 'Bytes';
		}
		return $bytes;
	}
}
?>