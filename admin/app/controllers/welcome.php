<?php
class Welcome extends MY_Controller {
	/*首页*/
	public function index(){
		$this->MyView('welcome_v');
	}
}
?>