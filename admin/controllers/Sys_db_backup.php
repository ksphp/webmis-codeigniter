<?php
class Sys_db_backup extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('system/sys_db',$this->Lang);
		$this->load->library('inc');
		$this->load->model('sys_db_m');
		$data['table'] = $this->sys_db_m->getTableList();
		$data['LoadJS'] = array('system/sys_db_backup.js',);
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'system/db/backup/index',$data);
	}
	/* Delete */
	public function delData(){
		$this->lang->load('msg',$this->Lang);
		$this->load->model('sys_db_m');
		echo $this->sys_db_m->delTable()?'{"status":"y","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_suc').'","text":"'.$this->lang->line('msg_auto_close').'"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
	/* Export */
	public function exp(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_db',$this->Lang);
		/*Config*/
		$data['fname'] = 'Data_'.date('Y_m_d_His');
		$data['backdir'] = $this->config->config['backup'];
		$data['table'] = $this->input->post('table');
		$this->load->view('system/db/backup/exp',$data);
	}
	public function expData(){
		$this->load->dbutil();
		$this->load->helper('file');
		/* Post */
		$dir = trim($this->input->post('dir'));
		$name = trim($this->input->post('name'));
		$format = trim($this->input->post('format'));
		$table = json_decode($this->input->post('table'));
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
		$this->lang->load('msg',$this->Lang);
		$backup = $this->dbutil->backup($prefs);
		echo @write_file($dir.'/'.$name.'.'.$format, $backup)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
}