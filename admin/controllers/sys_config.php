<?php
class Sys_config extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->helper('file');
		/* Admin Themes */
		$data['admin_themes'] = get_dir_file_info('../themes/admin');
		/* WebMIS Themes */
		$data['webmis_themes'] = get_dir_file_info('../webmis/themes');
		/* Jquery */
		$data['jquery'] = get_dir_file_info('../webmis/plugin/jquery');

		$data['js'] = array('system/sys_config.js',);
		if($this->IsMobile) {
			$this->MyView('system/config/index_mo',$data);
		}else {
			$this->MyView('system/config/index',$data);
		}
	}
	/* Edit */
	public function editData(){
		$title = $this->input->post('title');
		$copy = $this->input->post('copy');
		$backup = $this->input->post('backup');
		$admin_themes = $this->input->post('admin_themes');
		$webmis_themes = $this->input->post('webmis_themes');
		$jquery = $this->input->post('jquery');
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
			/* Jquery */
			$pat = "/\['jquery'\] = '(.*)'/";
			$rep = "['jquery'] = '".$jquery."'";
			$ct = preg_replace($pat,$rep,$ct);

			/* Write */
			$fp=fopen($file,'w');
			fwrite($fp,$ct);
			fclose($fp);
		}
		echo $data?'{"status":"y"}':'{"status":"n"}';

	}
}
?>