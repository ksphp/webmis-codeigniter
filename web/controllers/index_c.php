<?php
class Index_c extends MY_Controller {
	public function index(){
		//$this->load->helper('my');
		//$data['js'] = array('/themes/default/js/index.js');
		$this->MyView('index/index',@$data);
	}
}
?>