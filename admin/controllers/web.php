<?php
class Web extends MY_Controller {
	/* Index */
	public function index(){
		print_r($_SERVER);
		$data['HostUrl'] = 'http://'.@$_SERVER['SERVER_NAME'];
		$this->MyView('web/index_v',$data);
	}
}
?>