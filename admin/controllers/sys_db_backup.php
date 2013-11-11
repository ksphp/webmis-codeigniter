<?php
class Sys_db_backup extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->model('sys_db_m');
		$data['table'] = $this->sys_db_m->getTableList();
		$data['js'] = array('js/system/sys_db_backup.js',);
		$this->MyView('system/db/backup/index',$data);
	}
	/* Export */
	public function exp(){
		/* System Config*/
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		/*Config*/
		$data['fname'] = 'Data_'.date('Y_m_d_His');
		$data['backdir'] = $config['backdir'];
		$data['table'] = $this->input->post('table');
		$this->load->view('system/db/backup/exp',$data);
	}
	public function expData(){
		$this->load->dbutil();
		$this->load->helper('file');
		/* Post */
		$dir = $this->input->post('dir');
		$name = $this->input->post('name');
		$format = $this->input->post('format');
		$table = array_filter(explode(' ', $this->input->post('table')));
		/* Mkdir */
		if(!is_dir($dir)){@mkdir($dir,0777);}
		/* Config */
		$prefs = array(
			'tables'      => $table,
			'ignore'      => array(),
			'format'      => $format,
			'filename'    => $name.'.sql',
			'add_drop'    => TRUE,
			'add_insert'  => TRUE,
			'newline'     => "\n"
		);
		$backup =& $this->dbutil->backup($prefs);
		echo write_file($dir.'/'.$name.'.'.$format, $backup)?'{"status":"y"}':'{"status":"n"}'; 
	}
}
?>