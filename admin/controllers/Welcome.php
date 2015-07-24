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
	// Get Lang
	public function getLang($type=''){
		$this->lang->load($type,$this->Lang);
		$name = $this->input->get();
		foreach ($name as $key=>$val){
			$data[$key] = $this->lang->line($key);
		}
		echo json_encode($data);
	}
}