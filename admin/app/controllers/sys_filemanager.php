<?php
class Sys_filemanager extends MY_Controller {
	/* 首页 */
	function index(){
		$this->load->library('file_class');
		
		$editor = $this->input->get('editor');
		$data['file_root'] = $editor?'/upload':'';
		$this->file_class->file_root = $_SERVER['DOCUMENT_ROOT'].$data['file_root'];
		
		$action = $this->input->get('action');
		switch($action) {
			case 'mkdir':
				$path = $this->input->get('path'). $this->input->get('name');
				$perm = (int)$this->input->get('perm');
				echo $this->file_class->addDir($path,$perm);
				break;
			case 'addfile':
				$file = $this->file_class->file_root.$this->input->get('path'). $this->input->get('file');
				echo $this->addFileData($file);
				break;
			case 'rename':
				$path = $this->input->get('path');
				$name = $this->input->get('name');
				$rename = $this->input->get('rename');
				echo $this->file_class->reName($path.$rename,$path.$name);
				break;
			case 'del':
				$path = $this->input->get('path');
				$f = $this->input->get('id');
				echo $this->file_class->del($path,$f);
				break;
			case 'editperm':
				$path = $this->input->get('path');
				$perm = $this->input->get('perm');
				echo $this->file_class->editPerm($path,$perm);
				break;
			case 'down':
				$this->down($this->file_class->file_root);
				break;
			case 'viewfile':
				$this->viewFile($this->file_class->file_root);
				break;
			case 'editfile':
				$this->editFile($this->file_class->file_root);
				break;
			case 'editor':
				$data['file_action'] = 'editor';
				$data['file_editor'] = $this->input->get('editor');
				
				$path = $this->input->get('path');
				$file = $this->input->get('file');
				$dir = $file?substr(dirname($file),7):false;
				$path = $dir&&is_dir($this->file_class->file_root.$dir)?$dir:$path;
				
				$data['filelist'] = $this->file_class->lists($path);
				$data['js'] = array('js/system/sys_filemanager.js');
				$this->load->view('system/filemanager/editor',$data);
				break;
			default:
				$data['file_action'] = '';
				$data['file_editor'] = '';
				$path = $this->input->get('path');
				$data['filelist'] = $this->file_class->lists($path);
				if($this->IsMobile) {
					$data['js'] = array('js/system/sys_filemanager_mo.js');
					$this->MyView('system/filemanager/index_mo',$data);
				}else {
					$data['js'] = array('js/system/sys_filemanager.js');
					$this->MyView('system/filemanager/index',$data);
				}
		}
	}
	/* 新建文件夹 */
	function addFolder() {
		if($this->IsMobile) {
			$this->load->view('system/filemanager/mkdir_mo');
		}else {
			$this->load->view('system/filemanager/mkdir');
		}
	}
	/* 新建文件夹 */
	function addFile() {
		if($this->IsMobile) {
			$this->load->view('system/filemanager/addfile_mo');
		}else {
			$this->load->view('system/filemanager/addfile');
		}
	}
	function addFileData($file) {
		$this->load->helper('file');
		$data = !is_file($file)?write_file($file,''):false;
		return $data;
	}
	/* 上传文件 */
	function upload() {
		$this->load->view('system/filemanager/upload');
	}
	/* 编辑权限 */
	function editPerm() {
		$this->load->view('system/filemanager/edit_perm');
	}
	/* 重命名 */
	function reName() {
		$this->load->view('system/filemanager/rename');
	}
	/* 下载 */
	public function down($file_root){
		$this->load->library('zip');

		$path = $this->input->get('path');
		$files = $this->input->get('files');
		$arr = array_filter(explode(',',$files));
		foreach($arr as $val){
			$ff = $file_root.$path.$val;
			if(!is_dir($ff)) {
				$this->zip->read_file($ff);
			}else {
				$this->zip->read_dir($ff.'/',false);
			}
		}
		$this->zip->download('Down.zip');
	}
	/* 打开文件 */
	public function viewFile($file_root) {
		$this->load->helper('file');
		$this->load->helper('typography');
		
		$file = $file_root.$this->input->get('path');

		$string = read_file($file);
		echo $string = '<div style="font-size: 12px; line-height: 18px; padding: 0 10px;">'.auto_typography($string).'</div>';
	}
	/* 编辑文件 */
	public function editFile($file_root) {
		$this->load->helper('file');
		$this->load->helper('typography');
		
		$file = $file_root.$this->input->get('file');

		$string = read_file($file);
		
		$data = '<form action="'.base_url('sys_filemanager/saveFile.html').'" method="get" id="fileForm">';
		$data .= '<textarea id="tinymce" name="file_data" style="width:99%; height:400px; font-size: 12px; line-height: 20px;">'.$string.'</textarea>';
		$data .= '<div style="text-align: center; padding-top: 5px;">';
		$data .= '<input type="submit" id="fileSub" value="保存" />';
		$data .= '<input type="hidden" name="file" value="'.$file.'">';
		$data .= '</div>';
		$data .= '</form>';
		echo $data;
	}
	/* 保存文件 */
	public function saveFile() {
		$this->load->helper('file');
		$file = $this->input->get('file');
		$filedata = $this->input->get('file_data');
		echo write_file($file,$filedata);
	}
}
?>