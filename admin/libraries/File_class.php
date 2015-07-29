<?php
class file_class{
	public $file_root = '.';
	
	/* Lists */
	function lists($c='/') {
		$c = $c?$c:'/';
		$c = preg_replace('/\.\.\/|\.\/|\.\./','',$c);
		$c = $c=='/'?$c:'/'.trim($c, '/').'/';

		$data['path'] = $c;
		$data['dirNum'] = 0;
		$data['fileNum'] = 0;
		$data['size'] = 0;
		
		$c = $this->file_root.$c;

		if(is_dir($c)) {
			$d = opendir($c);
			while($f = readdir($d)) {
				if(strpos($f, '.') === 0) continue;
				$ff = $c . '/' . $f;
				$ext = strtolower(substr(strrchr($f, '.'), 1));
				$ctime = $this->getctime($ff);
				$mtime = $this->getmtime($ff);
				$perm = $this->perm($ff);
				if(is_dir($ff)) {
					$size = $this->dirsize($ff);
					$data['folder'][] = array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$this->formatBytes($size), 'perm'=>$perm);
					$data['size'] += $size;
					$data['dirNum']++;
				}else {
					$size = $this->size($ff);
					$class = $this->ico_class($ext);
					$data['files'][] =  array('name'=>$f, 'ctime'=>$ctime, 'mtime'=>$mtime, 'size'=>$this->formatBytes($size), 'perm'=>$perm, 'ext'=>$ext, 'class'=>$class);
					$data['size'] += $size;
					$data['fileNum']++;
				}
			}
		}else {
			show_404();
		}
		$data['size'] = $this->formatBytes($data['size']);
		return $data;
	}

	/* File Ico */
	private function ico_class($ext='file') {
		$class = array(
			'file'=>'ico-file',
			'ico'=>'ico-ico',
			'htm'=>'ico-html',
			'html'=>'ico-html',
			'php'=>'ico-php',
			'css'=>'ico-css',
			'jpg'=>'ico-img',
			'png'=>'ico-img',
			'gif'=>'ico-img',
			'pdf'=>'ico-pdf',
			'zip'=>'ico-zip',
			'txt'=>'ico-txt',
			'doc'=>'ico-doc',
			'docx'=>'ico-doc',
			'xls'=>'ico-xls',
			'xlsx'=>'ico-xls',
			'odt'=>'ico-odt',
		);
		$date = @$class[$ext]?$class[$ext]:'ico-file';
		return $date;
	}

	/* Mkdir */
	function addDir($path,$perm=0755) {
		$dir = $this->file_root.$path;
		if(!is_dir($dir)){
			return @mkdir($dir,octdec($perm))?TRUE:FALSE;
		}else{return FALSE;}
	}
	/* AddFile */
	function addFile($file){
		$file = $this->file_root.$file;
		if(!is_file($file)){
			return @fopen($file,'w')?TRUE:FALSE;
		}else{return FALSE;}
	}
	/* EditFile */
	function editFile($file,$data){
		$file = $this->file_root.$file;
		if(is_file($file)){
			$myfile = @fopen($file,'w');
			$IS = @fwrite($myfile, $data)?TRUE:FALSE;
			@fclose($myfile);
			return $IS;
		}else{return FALSE;}
	}

	/* Rename */
	function reName($rename,$name) {
		$ff = $this->file_root.$rename;
		$f = $this->file_root.$name;
		return rename($ff,$f);
	}

	/* Delete folder and file */
	function del($path,$f) {
		$data = false;
		$arr = array_filter(explode(' ', $f));
		foreach($arr as $val){
			$ff = $this->file_root.$path.$val;
			if(!is_dir($ff)) {
				if(@unlink($ff)){$data = true;}else {$data = false;break;}
			}else {
				if($this->deldir($ff)){$data = true;}else {$data = false;break;}
			}
		}
		return $data;
	}
	function deldir($dir){
		$d = opendir($dir);
		while ($file = readdir($d)){
      	if ($file != "." && $file != ".."){
				$fullpath = $dir . "/" . $file;
				if (!is_dir($fullpath)) unlink($fullpath);
				else $this->deldir($fullpath);
			}
		}
		closedir($d);
		return @rmdir($dir);
	}

	/* EditPerm */
	function editPerm($path,$perm) {
		$ff = $this->file_root.$path;
		$perm = octdec($perm);
		$data = false;
		if(!is_dir($ff)) {
			if(chmod($ff,$perm)){$data = true;}else {$data = false;}
		}else {
			if($this->editDirPerm($ff,$perm)){$data = true;}else {$data = false;}
		}
		return $data;
	}
	function editDirPerm($dir,$perm) {
		$d = opendir($dir);
		while ($file = readdir($d)){
      	if ($file != "." && $file != ".."){
				$fullpath = $dir . "/" . $file;
				if (!is_dir($fullpath)) chmod($fullpath,$perm);
				else $this->editDirPerm($fullpath,$perm);
			}
		}
		closedir($d);
		return chmod($dir,$perm);
	}

	/* Folder Size */
	function dirsize($dir) {
		$handle=opendir($dir);
		$size = 0;
		while ( $file=readdir($handle) ) {
			if ( ( $file == "." ) || ( $file == ".." ) ) continue;
			if ( is_dir("$dir/$file") ) $size += $this->dirsize("$dir/$file");
			else $size += filesize("$dir/$file");
		}
		closedir($handle);
		return $size;
	}
	/* File Size */
	function size($f='') {
		return filesize($f);
	}

	/* File Perm */
	function perm($f='') {
		return substr(sprintf('%o', fileperms($f)), -4);
	}
	/* Ctime */
	function getctime($f='') {
		return date("Y-m-d H:i:s",filectime($f));
	}
	/* Mtime */
	function getmtime($f='') {
		return date("Y-m-d H:i:s",filemtime($f));
	}
	/* Format Byte */
	private function formatBytes($bytes){
		if($bytes >= 1073741824){
			$bytes = round($bytes / 1073741824 * 100) / 100 . ' GB';
		}elseif($bytes >= 1048576){
			$bytes = round($bytes / 1048576 * 100) / 100 . ' MB';
		}elseif($bytes >= 1024){
			$bytes = round($bytes / 1024 * 100) / 100 . ' KB';
		}else{
			$bytes = $bytes . ' B';
		}
		return $bytes;
	}
}