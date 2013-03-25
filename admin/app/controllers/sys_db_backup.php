<?php
class Sys_db_backup extends MY_Controller {
	
	//首页
	public function index(){
		$this->load->model('sys_db_m');
		$data['table'] = $this->sys_db_m->getTableList();
		$data['js'] = array(
			'js/system/sys_db_backup.js',
		);
		$this->MyView('system/db/backup/index',$data);
	}
	//导出
	public function exp(){
		//系统配置
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		//参数
		$data['fname'] = 'Data_'.date('Y_m_d_His');
		$data['backdir'] = $config['backdir'];
		$data['table'] = $this->input->post('table');
		$this->load->view('system/db/backup/exp',$data);
	}
	public function expData(){
		$this->load->dbutil();
		$this->load->helper('file');
		
		//获取表单
		$dir = $this->input->post('dir');
		$name = $this->input->post('name');
		$format = $this->input->post('format');
		$table = array_filter(explode(' ', $this->input->post('table')));
		//创建目录
		if(!is_dir($dir)){@mkdir($dir,0777);}
		//配置
		$prefs = array(
			'tables'      => $table,  // 包含了需备份的表名的数组.
			'ignore'      => array(),           // 备份时需要被忽略的表
			'format'      => $format,             // gzip, zip, txt
			'filename'    => $name.'.sql',    // 文件名 - 如果选择了ZIP压缩,此项就是必需的
			'add_drop'    => TRUE,              // 是否要在备份文件中添加 DROP TABLE 语句
			'add_insert'  => TRUE,              // 是否要在备份文件中添加 INSERT 语句
			'newline'     => "\n"               // 备份文件中的换行符
		);
		$backup =& $this->dbutil->backup($prefs);
		echo write_file($dir.'/'.$name.'.'.$format, $backup)?'{"status":"y"}':'{"status":"n"}'; 
	}
}
?>