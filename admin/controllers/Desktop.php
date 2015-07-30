<?php
class Desktop extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('index/desktop',$this->Lang);
		$this->load->library('inc');
		$this->load->library('user_agent');
		
		$data['user']['ip'] = $this->input->ip_address();
		$data['user']['platform'] = $this->agent->platform();
		$data['user']['browser'] = $this->agent->browser();
		$data['user']['version'] = $this->agent->version();
		$data['user']['agent'] = $this->agent->agent_string();

		$data['server']['ip'] = @$_SERVER['SERVER_ADDR'];
		$data['server']['port'] = @$_SERVER['SERVER_PORT'];
		$data['server']['name'] = @$_SERVER['SERVER_NAME'];
		$data['server']['admin'] = base_url();
		$data['server']['soft'] = @$_SERVER['SERVER_SOFTWARE'];
		$data['server']['url'] = @$_SERVER['REQUEST_URI'];
		
		$data['db']['dbdriver'] = $this->db->dbdriver;
		$data['db']['hostname'] = $this->db->hostname;
		$data['db']['username'] = $this->db->username;
		$data['db']['database'] = $this->db->database;
		$data['db']['dbprefix'] = $this->db->dbprefix;
		$data['db']['char_set'] = $this->db->char_set;
		
		$data['js'] = array('index/welcome.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		
		if($this->IsMobile) {
			$this->inc->adminView($this,'index/desktop_v_mo',$data);
		}else {
			$this->inc->adminView($this,'index/desktop_v',$data);
		}
	}
}