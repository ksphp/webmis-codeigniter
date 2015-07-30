<?php
class Sys_change_passwd extends MY_Controller {
	/* Index */
	public function index(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('index/sys_pwd',$this->Lang);
		$this->load->library('inc');
		$data['js'] = array('index/change_passwd.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'index/change_passwd_v_mo',$data);
		}else {
			$this->inc->adminView($this,'index/change_passwd_v',$data);
		}
	}
	/* ChangePasswd */
	public function changePasswd(){
		$this->lang->load('msg',$this->Lang);
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->updatePasswd()?'{"status":"y","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_suc').'","text":"'.$this->lang->line('msg_auto_close').'"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
	}
}