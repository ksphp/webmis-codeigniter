<?php
class Log extends MY_Controller {
	/* Index */
	public function index(){
		$data='';
		$this->MyView('log/index_v',$data);
	}
}
?>