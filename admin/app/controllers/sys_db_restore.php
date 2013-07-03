<?php
class Sys_db_restore extends MY_Controller {
	//首页
	public function index(){
		$this->load->helper('my');
		$this->load->helper('file');
		$this->load->model('sys_db_m');
		//系统配置
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		
		$data['js'] = array('js/system/sys_db_restore.js',);
		$data['file'] = get_dir_file_info($config['backdir'],false);
		
		$this->MyView('system/db/restore/index',$data);
	}
	//下载
	public function down(){
		$this->load->helper('download');
		//系统配置
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		// 读文件内容
		$fname = $this->input->get('name');
		$data = file_get_contents($config['backdir'].'/'.$fname);

		force_download($fname, $data); 
	}
	//删除
	public function delData(){
		//系统配置
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
	//导入
	public function imp(){
		//系统配置
		$this->load->model('sys_config_m');
		$config = $this->sys_config_m->getval();
		//参数
		$data['file'] = $config['backdir'].'/'.$this->input->post('file');
		$this->load->view('system/db/restore/imp',$data);
	}
	public function impData(){
		$this->load->helper('file');
		
		$file = $this->input->post('file');
		$content = read_file($file);
		$content = preg_replace("/#(.*)\s#(.*)TABLE(.*)(.*)\s#/i","",$content);  //去掉注释部分
		
		$sqls = array_filter(explode(";\n",$content));
		foreach($sqls as $sql){
			$sql = trim($sql);
			if(!empty($sql)){
				if($this->db->query($sql)){
					$data = '{"status":"y"}';
				}else{
					$data = '{"status":"n"}';
					break;
				}
			}
		}
		echo $data;
	}
}
?>