<?php
class System extends MY_Controller {
	/* Index */
	public function index(){
		$this->load->library('inc');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		$this->inc->adminView($this,'system/index_v',$data);
	}
}
?>