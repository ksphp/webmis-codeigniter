<?php
class Welcome extends MY_Controller {
	/* Index */
	public function index(){
		$file = '../ReadMe.md';
		if(file_exists($file)){
			$fp = fopen($file, 'r');
			$data['InstallCT'] = fread($fp,filesize($file));
			fclose($fp);
		}else{
			$data['InstallCT'] = '“ '.$file.' ” 文件不存在！';
		}
		$this->MyView('welcome_v',$data);
	}
}
?>