<?php
class Sys_config extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('system/sys_config');
		$this->load->helper('my');
		$this->load->library('inc');
		$this->load->helper('file');
		/* URL */
		$url = explode(':', base_url());
		$data['URL'] = $url[0].'://'.$_SERVER['SERVER_NAME'].'/';
		/* Admin Themes */
		$data['admin_themes'] = get_dir_file_info('../themes/admin');
		/* WebMIS Themes */
		$data['webmis_themes'] = get_dir_file_info('../webmis/themes');
		/* Language */
		$data['lang'] = get_dir_file_info('language');

		$data['js'] = array('system/sys_config.js',);
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'system/config/index_mo',$data);
		}else {
			$this->inc->adminView($this,'system/config/index',$data);
		}
	}
	/* Edit */
	public function editData(){
		$title = $this->input->post('title');
		$copy = $this->input->post('copy');
		$backup = $this->input->post('backup');
		$admin_themes = $this->input->post('admin_themes');
		$webmis_themes = $this->input->post('webmis_themes');
		$lang = $this->input->post('lang');
		$_SESSION['AdminInfo']['lang'] = $lang;
		/* Config File */
		$file = 'config/config.php';
		$ct = @file_get_contents($file);
		$data = true;
		if(!$ct){
			$data = false;
		}else{
			/* Title */
			$pat = "/\['title'\] = '(.*)'/";
			$rep = "['title'] = '".$title."'";
			$ct = preg_replace($pat,$rep,$ct);
			/* Copy */
			$pat = "/\['copy'\] = '(.*)'/";
			$rep = "['copy'] = '".$copy."'";
			$ct = preg_replace($pat,$rep,$ct);
			/* Backup */
			$pat = "/\['backup'\] = '(.*)'/";
			$rep = "['backup'] = '".$backup."'";
			$ct = preg_replace($pat,$rep,$ct);
			/* Admin Themes */
			$pat = "/\['admin_themes'\] = '(.*)'/";
			$rep = "['admin_themes'] = '".$admin_themes."'";
			$ct = preg_replace($pat,$rep,$ct);
			/* WebMIS Themes */
			$pat = "/\['webmis_themes'\] = '(.*)'/";
			$rep = "['webmis_themes'] = '".$webmis_themes."'";
			$ct = preg_replace($pat,$rep,$ct);
			/* Language */
			$pat = "/\['language'\] = '(.*)'/";
			$rep = "['language'] = '".$lang."'";
			$ct = preg_replace($pat,$rep,$ct);

			/* Write */
			$fp=fopen($file,'w');
			fwrite($fp,$ct);
			fclose($fp);
		}
		echo $data?'{"status":"y"}':'{"status":"n"}';

	}
}