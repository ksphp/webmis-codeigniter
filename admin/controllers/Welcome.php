<?php
class Welcome extends MY_Controller {
	/* Index */
	public function index(){
		redirect('desktop');
	}
	// Display TOP
	public function DisplayTop($val=''){
		$_SESSION['DisplayTop'] = $val;
	}
}