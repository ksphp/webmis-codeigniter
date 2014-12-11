<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	/* Public Variables */
	var $Cid;
	var $Title;
	var $FId1;
	var $FId2;
	var $FId3;
	var $IsMobile;
	
	function __construct(){
		parent::__construct();
		/* Helper */
		$this->load->helper('my');
		/* IsLogin */
		session_start();
		$logged = $_SESSION['uinfo']['logged_in'];
		$this->IsMobile = $_SESSION['uinfo']['is_mobile'];
		if(!$logged){
			//header('location: '.base_url().'index_c/loginOut.html');
			redirect('index_c/loginOut');
		}
		/* MenuInfo */
		$Cname = $this->router->class;
		$Aname = $this->router->method;
		$this->getMenuInfo($Cname);
		/* Prem */
		$this->menuPrem($this->Cid);
	}
/*------------------------------------------------------------------
* Page  例如： array('url'=>'','model'=>'','where'='','page'=15,'name'=>'page');
-------------------------------------------------------------------*/
	public function Page($arr=''){
		$this->load->library('pagination');
		$this->load->model($arr['model']);
		//默认值
		if(!array_key_exists('page',$arr)){$arr['page']=15;}
		if(!array_key_exists('name',$arr)){$arr['name']='page';}
		if(!array_key_exists('where',$arr)){$arr['where']='';}
		/* Config */
		$config['page_query_string'] = TRUE;
		$config['first_tag_open'] = '<span>';
		$config ['first_link'] = '首页';
		$config['first_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_close'] = '</span>';
		$config['next_tag_open'] = '<span>';
		$config['next_link'] = '下一页';
		$config['next_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span>';
		$config ['last_link'] = '末页';
		$config['last_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="page_cur">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span>';
		$config['num_tag_close'] = '</span>';
		/* Search */
		$get_url = '?';
		if(isset($_GET['search'])){
			$like = $this->input->get();
			unset($like['per_page']);
			/* Url */
			foreach($like as $key=>$val){$get_url .= $key.'='.$val.'&';}
			/* Remove Search and Null */
			unset($like['search']);
			$like = array_filter($like);
		}else{$like = array();}
		/* Data */
		$per_page = $this->input->get('per_page');
		$d = $this->$arr['model']->$arr['name']($arr['page'],$per_page,$like,$arr['where']);
		$config['total_rows'] = $d['total'];
		$config['per_page'] = $arr['page'];
		$config['base_url'] = base_url().$this->config->config['index_url'].$arr['url'].$get_url;
		$this->pagination->initialize($config);
		/* Other */
		$data['list'] = $d['data'];
		$data['page'] = $this->pagination->create_links();
		$data['total'] = '共<b> '.$config['total_rows'].' </b>条';
		$data['key'] = $like;
		$data['get_url'] = $get_url.'per_page='.$per_page;
		
		return $data;
	}
/*------------------------------------------------------------------
* View Three
-------------------------------------------------------------------*/
	public function MyView($url,$data=''){
		/* UserInfo */
		$data['uinfo']=array(
			'uname'=>$_SESSION['uinfo']['uname'],
			'name'=>$_SESSION['uinfo']['name'],
			'department'=>$_SESSION['uinfo']['department']
		);
		/* Public */
		$data['title']=$this->Title;
		$data['actionHtml']=$this->actionHtml();
		/* View */
		if($this->IsMobile) {
			$data['Menu']=$this->getMenuMo(0);
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/top_mo',$data);
			$this->load->view($url);
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/bottom_mo');
		}else {
			$data['Menu']=$this->getMenu();
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/top',$data);
			$this->load->view($url);
			$this->load->view('../../themes/admin/'.$this->config->config['admin_themes'].'/inc/bottom');
		}
	}
/*------------------------------------------------------------------
* Menu
-------------------------------------------------------------------*/
	private function getMenu(){
		$permArr = $_SESSION['uinfo']['permArr'];
		$one = $this->getMenus($this->Fid1);
		$data = '';
		foreach($one as $key1=>$val1){
			if(isset($permArr[$val1->id])){
				$data[$key1] = $val1;
				if($val1->id == $this->Fid2){
					$two = $this->getMenus($this->Fid2);
					foreach($two as $key2=>$val2){
						if(isset($permArr[$val2->id])){
							$data[$key1]->menus[] = $val2;
							$three = $this->getMenus($val2->id);
							foreach($three as $key3=>$val3){
								if(isset($permArr[$val3->id])){
									$data[$key1]->menus[$key2]->menus[] = $val3;
								}
							}
						}
					}
				}
			}
		}
		return $data;
	}
	private function getMenuMo($fid){
		$permArr = $_SESSION['uinfo']['permArr'];
		$one = $this->getMenus($fid);
		$data = '';
		foreach($one as $key1=>$val1){
			if(isset($permArr[$val1->id])){
				$data[$key1] = $val1;
				$two = $this->getMenus($val1->id);
				foreach($two as $key2=>$val2){
					if(isset($permArr[$val2->id])){
						$data[$key1]->menus[] = $val2;
						$three = $this->getMenus($val2->id);
						foreach($three as $key3=>$val3){
							if(isset($permArr[$val3->id])){
								$data[$key1]->menus[$key2]->menus[] = $val3;
							}
						}
					}
				}
			}
		}
		return $data;
	}
	/* GetMenu */
	private function getMenus($fid){
		$this->load->model('sys_menus_m');
		return $this->sys_menus_m->getMenus($fid);
	}
	/* GetMenuInfo */
	private function getMenuInfo($url){
		$this->load->model('sys_menus_m');
		$M1 = $this->sys_menus_m->getMenusUrl($url);
		// Public
		$this->Cid = $M1->id;
		$this->Title = $M1->title;
		//Fid
		$this->Fid1 = false;
		$this->Fid2 = false;
		$this->Fid3 = false;
		if($M1->fid != 0){
			$M2 = $this->sys_menus_m->getMenuOne($M1->fid);
			if($M2->fid != 0){
				$M3 = $this->sys_menus_m->getMenuOne($M2->fid);
				if($M3->fid != 0){
					echo '四级菜单';
				}else{
					$this->Fid1 = $M3->fid;
					$this->Fid2 = $M2->fid;
					$this->Fid3 = $M1->fid;
				}
			}else{
				$this->Fid1 = $M2->fid;
				$this->Fid2 = $M1->fid;
			}
		}else{
			$this->Fid1 = $M1->fid;
			$this->Fid2 = $M1->id;
		}
	}
/*------------------------------------------------------------------
* Action
-------------------------------------------------------------------*/
	private function actionHtml(){
		$this->load->model('sys_menus_action_m');
		$permArr = $_SESSION['uinfo']['permArr'];
		$action = $this->sys_menus_action_m->getAll();
		$i = 1;
		$html = '';
		foreach($action as $val){
			if(intval($permArr[$this->Cid])&intval($val->perm)){
				if($i == 1){
					$html .= '<li><a href="'.base_url().$this->config->config['index_url'].$this->uri->segment(1).'.html"><em class="'.$val->ico.'"></em>'.$val->name.'</a></li>';
				}else{
					$html .= '<li><a href="#" id="'.$val->ico.'"><em class="'.$val->ico.'"></em>'.$val->name.'</a></li>';
				}
			}
			$i++;
		}
		return $html;
	}
/*------------------------------------------------------------------
* Prem Menu
-------------------------------------------------------------------*/
	private function menuPrem($mid){
		$permArr = $_SESSION['uinfo']['permArr'];
		if(!isset($permArr[$mid])){
			header('location: '.base_url().$this->dirName.'index_c/loginOut.html');
			exit();
		}
	}
/*------------------------------------------------------------------
* Display
-------------------------------------------------------------------*/
	public function DisplayTop($val=''){
		$_SESSION['DisplayTop'] = $val;
	}
}