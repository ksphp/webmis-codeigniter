<?php
class Welcome extends MY_Controller {

	public function index(){
		$this->MyView('welcome_v');
	}
}
?>