<?php
class Index_c extends MY_Controller {
	public function index(){
		//$this->load->helper('my');
		//$data['js'] = array('/themes/default/js/index.js');
		echo md5('shucai@ksphp.com');
		$this->MyView('index/index',@$data);
	}
}