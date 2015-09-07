<?php
class Sys_filemanager extends MY_Controller {
	/* Load FileClass */
	function __construct(){
		parent::__construct();
		$this->load->library('file_class');
		$this->file_class->file_root = $_SERVER['DOCUMENT_ROOT'];
	}
	/* Index */
	function index(){
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->library('inc');
		
		$data['file_root'] = $this->file_class->file_root;
		$path = trim($this->input->get('path'));
		$data['filelist'] = $this->file_class->lists($path);
		$data['LoadJS'] = array('system/sys_filemanager.js');
		$data['Menus'] = $this->inc->getMenuAdmin($this);
		if($this->IsMobile) {
			$this->inc->adminView($this,'system/filemanager/index_mo',$data);
		}else {
			$this->inc->adminView($this,'system/filemanager/index',$data);
		}
	}
	/* Create Folder */
	function Folder() {
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->view('system/filemanager/mkdir');
	}
	function addFolder(){
		$this->lang->load('msg',$this->Lang);
		$path = $this->input->post('path').trim($this->input->post('name'));
		$perm = (int)$this->input->post('perm');
		if($path && $perm){
			echo $this->file_class->addDir($path,$perm)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
	/* Create File */
	function File(){
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->view('system/filemanager/addfile');
	}
	function addFile(){
		$this->lang->load('msg',$this->Lang);
		$file = $this->input->post('path').trim($this->input->post('file'));
		if($file){
			echo $this->file_class->addFile($file)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
	/* Upload */
	function upload() {
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->view('system/filemanager/upload');
	}
	function uploadData(){
		$path = $this->file_class->file_root.$this->input->post('path');
		$upName = 'webmis';
		// File
		if (!empty($_FILES)){
			$tempFile = $_FILES[$upName]['tmp_name'];
			$targetFile = $path.$_FILES[$upName]['name'];
			if(@move_uploaded_file($tempFile,$targetFile)){
				echo '{"status":"ok","name":"'.$_FILES[$upName]['name'].'","size":"'.$_FILES[$upName]['size'].'"}';
			}else{
				echo '{"status":"no","name":"'.$_FILES[$upName]['name'].'"}';
			}
		}
	}
	/* Remove */
	function delData(){
		$this->lang->load('msg',$this->Lang);
		$path = trim($this->input->get('path'));
		$f = json_decode($this->input->post('id'));
		if($path && $f){
			echo $this->file_class->del($path,$f)?'{"status":"y","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_suc').'","text":"'.$this->lang->line('msg_auto_close').'"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
	/* EditPerm */
	function editPerm() {
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->view('system/filemanager/edit_perm');
	}
	function editPermData(){
		$this->lang->load('msg',$this->Lang);
		$path = trim($this->input->post('path'));
		$perm = trim($this->input->post('perm'));
		if($path && $perm){
			echo $this->file_class->editPerm($path,$perm)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
	/* Rename */
	function reName() {
		$this->lang->load('inc',$this->Lang);
		$this->lang->load('system/sys_file',$this->Lang);
		$this->load->view('system/filemanager/rename');
	}
	function reNameData(){
		$this->lang->load('msg',$this->Lang);
		$path = trim($this->input->post('path'));
		$name = trim($this->input->post('name'));
		$rename = trim($this->input->post('rename'));
		if($path && $rename && $name){
			echo $this->file_class->reName($path.$rename,$path.$name)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
	/* Download */
	public function down(){
		$this->load->library('zip');
		
		$file_root = $this->file_class->file_root;
		$path = trim($this->input->get('path'));
		$files = json_decode($this->input->get('files'));
		foreach($files as $val){
			$ff = $file_root.$path.$val;
			if(!is_dir($ff)) {
				$this->zip->read_file($ff);
			}else {
				$this->zip->read_dir($ff.'/',false);
			}
		}
		$this->zip->download('WebMIS.zip');
	}
	/* ViewFile */
	public function viewFile() {
		$this->load->helper('file');
		$this->load->helper('typography');
		
		$file = $this->file_class->file_root.trim($this->input->get('path'));

		$string = read_file($file);
		$string = $string?$string:'Null';
		echo $string = '<div style="font-size: 14px; line-height: 20px; padding: 0 20px;">'.auto_typography($string).'</div>';
	}
	/* EditFile */
	public function editFile() {
		$this->lang->load('inc',$this->Lang);
		$this->load->helper('file');
		$this->load->helper('typography');
		
		$file = trim($this->input->get('file'));

		$string = read_file($this->file_class->file_root.$file);
		
		$data ='<script language="javascript" src="'.base_url('../webmis/plugin/tinymce/tinymce.min.js').'"></script>';
		$data .= '<form action="'.base_url('sys_filemanager/saveFile.html').'" method="post" id="fileForm" style="padding-top: 5px;">';
		$data .= '<textarea id="tinymce" name="file_data">'.$string.'</textarea>';
		$data .= '<div style="text-align: center; padding-top: 10px;">';
		$data .= '<input type="submit" id="fileSub" value="'.$this->lang->line('inc_save').'" />';
		$data .= '<input type="hidden" name="file" value="'.$file.'">';
		$data .= '</div>';
		$data .= '</form>';
		echo $data;
	}
	/* SaveFile */
	public function saveFile() {
		$this->lang->load('msg',$this->Lang);
		$this->load->helper('file');
		$file = trim($this->input->post('file'));
		$filedata = $this->input->post('file_data');
		if($file && $filedata){
			echo $this->file_class->editFile($file,$filedata)?'{"status":"y"}':'{"status":"n","title":"'.$this->lang->line('msg_title').'","msg":"'.$this->lang->line('msg_err').'","text":"'.$this->lang->line('msg_auto_close').'"}';
		}else{return FALSE;}
	}
}