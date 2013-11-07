<?php
class Sys_db_restore extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->helper('my');
		$this->load->helper('file');
		$this->load->model('sys_db_m');
		/* System config */
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		
		$data['js'] = array('js/system/sys_db_restore.js',);
		$data['file'] = get_dir_file_info($config['backdir'],false);
		
		$this->MyView('system/db/restore/index',$data);
	}
	/* Download */
	public function down(){
		$this->load->helper('download');
		/* System config */
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		/* Read File */
		$fname = $this->input->get('name');
		$data = file_get_contents($config['backdir'].'/'.$fname);

		force_download($fname, $data); 
	}
	/* Delete */
	public function delData(){
		/* System config */
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		
		$file = array_filter(explode(',', $this->input->post('id')));
		foreach($file as $val){
			if(unlink($config['backdir'].'/'.$val)){
				$data = true;
			}else{
				$data = false;
				break;
			}
		}
		echo $data;
	}
	/* Import */
	public function imp(){
		/* System config */
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		/* Config */
		$data['file'] = $config['backdir'].'/'.$this->input->post('file');
		$this->load->view('system/db/restore/imp',$data);
	}
	public function impData(){
		$this->load->helper('file');
		
		$file = $this->input->post('file');
		$data = '{"status":"n"}';
		/* Remove Notes */
		$content = read_file($file);
		$content = preg_replace("/#\n# TABLE(.*)\s#\n/i","",$content);
		$sqls = array_filter(explode(";\n",$content));
		foreach($sqls as $sql){
			$sql = trim($sql);
			if(!empty($sql)){
				if(@$this->db->query($sql)){
					$data = '{"status":"y"}';
				}else{
					break;
				}
			}
		}
		echo $data;
	}
}
?>