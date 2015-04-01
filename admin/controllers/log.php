<?php
class Log extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'log/index_v',$data);
	}
}