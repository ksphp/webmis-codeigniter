<?php
class Welcome extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$file = '../ReadMe.md';
		if(file_exists($file)){
			$fp = fopen($file, 'r');
			$data['InstallCT'] = fread($fp,filesize($file));
			fclose($fp);
		}else{
			$data['InstallCT'] = '“ '.$file.' ” 文件不存在！';
		}
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'welcome_v',$data);
	}
}
?>