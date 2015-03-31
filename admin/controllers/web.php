<?php
class Web extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$data['HostUrl'] = 'http://'.@$_SERVER['SERVER_NAME'];
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'web/index_v_mo',$data);
		}else {
			$this->inc->adminView($this,'web/index_v',$data);
		}
	}
}