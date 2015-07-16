<?php
class Help_system extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'help/help_system_v',$data);
	}
}