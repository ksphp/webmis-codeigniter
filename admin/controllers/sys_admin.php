<?php
class Sys_admin extends MY_Controller {
	/* Index */
	public function index(){
		$data = $this->Page('sys_admin/index.html','sys_admin_m');
		$data['js'] = array('js/system/sys_admin.js');
		if($this->IsMobile) {
			$this->MyView('system/admin/index_mo',$data);
		}else {
			$this->MyView('system/admin/index',$data);
		}
	}
	/* Search */
	public function search(){
		$this->load->view('system/admin/sea');
	}
	/* Add */
	public function add(){
		$this->load->view('system/admin/add');
	}
	public function addData(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->add()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Edit */
	public function edit(){
		$this->load->model('sys_admin_m');
		$data['edit'] = $this->sys_admin_m->getOne();
		$this->load->view('system/admin/edit',$data);
	}
	public function editData(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->update()?'{"status":"y"}':'{"status":"n"}';
	}
	/* Delete */
	public function delData(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->del();
	}
	/* UserName */
	public function uname(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->uname()?'该用户存在！':'y';
	}
	/* EditPerm */
	public function editPerm(){
		$this->load->model('sys_menus_m');
		$this->load->model('sys_menus_action_m');
		$actionM = $this->sys_menus_action_m->getAll();
		$permArr = $this->splitPerm($this->input->post('perm'));
		
		$html = '';
		$menu1 = $this->sys_menus_m->getMenus('0');
		foreach($menu1 as $m1){
			$ck = isset($permArr[$m1->id])?'checked':'';
			$html .= '<div id="oneMenuPerm" class="perm">';
			$html .= '    <span class="text1"><input type="checkbox" value="'.$m1->id.'" '.$ck.' /></span>';
			$html .= '    <span>[<a href="#">-</a>] '.$m1->title.'</span>';
			$html .= '</div>';
			$menu2 = $this->sys_menus_m->getMenus($m1->id);
			foreach($menu2 as $m2){
				$ck = isset($permArr[$m2->id])?'checked':'';
				$html .= '<div id="twoMenuPerm" class="perm">';
				$html .= '    <span class="text2"><input type="checkbox" value="'.$m2->id.'" '.$ck.' /></span>';
				$html .= '    <span>[<a href="#">-</a>] '.$m2->title.'</span>';
				$html .= '</div>';
				$menu3 = $this->sys_menus_m->getMenus($m2->id);
				foreach($menu3 as $m3){
					$ck = isset($permArr[$m3->id])?'checked':'';
					$html .= '<div id="threeMenuPerm" class="perm perm_action">';
					$html .= '      <span class="text3"><input type="checkbox" name="threeMenuPerm" value="'.$m3->id.'" '.$ck.' /></span>';
					$html .= '      <span>[<a href="#">-</a>] '.$m3->title.'</span>';
					$html .= '  <span id="actionPerm_'.$m3->id.'"> ( ';
					foreach($actionM as $val){
						if(intval($m3->perm) & intval($val->perm)){
							$ck = @$permArr[$m3->id]&intval($val->perm)?'checked':'';
							$html .= '<span><input type="checkbox" value="'.$val->perm.'" '.$ck.' /></span><span class="text">'.$val->name.'</span>';
						}
					}
					$html .= ')</span>';
					$html .= '</div>';
				}
			}
		}
		$data['menusHtml'] = $html;
		$this->load->view('system/admin/perm',$data);
	}
	/* SplitPerm */
	public function splitPerm($perm){
		if($perm){
			$arr = explode(' ', $perm);
			foreach($arr as $val) {
				$num = explode(':', $val);
				$permArr[$num[0]]= $num[1];
			}
			return $permArr;
		}
	}
	/* Update */
	public function permData(){
		$this->load->model('sys_admin_m');
		echo $this->sys_admin_m->updatePerm();
	}
}
?>