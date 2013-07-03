<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	//公共变量
	var $Cid;
	var $Title;
	var $NavId;
	var $MenuTwoId;
	
	function __construct(){
		parent::__construct();
		//公共加载
		$this->load->helper('my');
		//是否登录
		session_start();
		$logged = $_SESSION['uinfo']['logged_in'];
		if(!$logged){
			header('location: '.base_url().'index_c/loginOut.html');
		}
		//菜单信息
		$Cname = $this->router->class;
		$Aname = $this->router->method;
		$this->getMenuInfo($Cname);
		//权限判断
		$this->menuPrem($this->Cid);
		if($Aname){$this->actionPrem($Aname);}
	}
/*------------------------------------------------------------------
* 分页
-------------------------------------------------------------------*/
	public function Page($url,$model,$type='page',$where='',$order=''){
		$this->load->library('pagination');
		$this->load->model($model);
		//搜索条件
		$get_url = '?';
		if(isset($_GET['search'])){
			$like = $this->input->get();
			unset($like['per_page']);
			//组合url
			foreach($like as $key=>$val){$get_url .= $key.'='.$val.'&';}
			//清除search和空值
			unset($like['search']);
			$like = array_filter($like);
		}else{$like = array();}
		//配置
		$config['base_url'] = base_url().$url.$get_url;
		$config['total_rows'] = $this->$model->count_all($like,$where);
		$config['page_query_string'] = TRUE;
		$config['per_page'] = 15;
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
		$this->pagination->initialize($config);
		//返回数据
		$per_page = $this->input->get('per_page');
		$data['list'] = $this->$model->$type($config['per_page'],$per_page,$like,$where,$order);
		//其他信息
		$data['page'] = $this->pagination->create_links();
		$data['total'] = '共<b> '.$config['total_rows'].' </b>条';
		$data['key'] = $like;
		$data['get_url'] = $get_url.'per_page='.$per_page;
		
		return $data;
	}
/*------------------------------------------------------------------
* 自定义3层视图
-------------------------------------------------------------------*/
	public function MyView($url,$data=''){
		//配置信息
		$this->load->model('sys_config_m');
		$data['config'] = $this->sys_config_m->getval();
		//用户信息
		$data['uinfo']=array(
			'uname'=>$_SESSION['uinfo']['uname'],
			'name'=>$_SESSION['uinfo']['name'],
			'department'=>$_SESSION['uinfo']['department']
		);
		//头部数据
		$data['base_url']=base_url();
		$data['NavId']=$this->NavId;
		$data['MenuTwoId']=$this->MenuTwoId;
		$data['title']=$this->Title;
		$data['navHtml']=$this->getNavHtml();
		$data['menuHtml']=$this->getMenuHtml(0);
		$data['actionHtml']=$this->actionHtml();
		$this->load->view('inc/top',$data);
		$this->load->view($url);
		$this->load->view('inc/bottom');
	}
/*------------------------------------------------------------------
* 导航菜单
-------------------------------------------------------------------*/
	private function getNavHtml(){
		$permArr = $_SESSION['uinfo']['permArr'];
		$nav = $this->getMenus(0);
		$html = '';
		foreach($nav as $val){
			if(isset($permArr[$val->id])){
				$html .= '<span id="nav_'.$val->id.'" class="nav_an2"><a href="#" onclick="menuOne(\''.$val->id.'\');return false;">'.$val->title.'</a></span>';
				$html .= '<div class="line UI">&nbsp;</div>';
			}
		}
		return $html;
	}
/*------------------------------------------------------------------
* 左侧菜单
-------------------------------------------------------------------*/
	private function getMenuHtml($fid){
		$this->load->model('sys_menus_m');
		$permArr = $_SESSION['uinfo']['permArr'];
		$one = $this->sys_menus_m->getMenus($fid);
		$html = '';
		foreach($one as $val1){
			if(isset($permArr[$val1->id])){
				$html .= "\n\t\t\t\t\t\t".'<!-- '.$val1->url.' -->'."\n\t\t\t\t\t\t";
				$html .= '<div id="menuOne_'.$val1->id.'" class="menuOne">'."\n\t\t\t\t\t\t\t";
				$two = $this->sys_menus_m->getMenus($val1->id);
				foreach($two as $val2){
					if(isset($permArr[$val2->id])){
						$html .= '<div id="menuTwo_'.$val2->id.'" class="menu_an_bg1 UI" onclick="menuTwo(\''.$val2->id.'\')"><span class="title">'.$val2->title.'</span><span id="tu" class="jia UI">&nbsp;</span></div>'."\n\t\t\t\t\t\t\t\t";
						$html .= '<ul id="menuThree_'.$val2->id.'" class="menu_list">'."\n\t\t\t\t\t\t\t\t";
						$three = $this->sys_menus_m->getMenus($val2->id);
						foreach($three as $val3){
							if(isset($permArr[$val3->id])){
								$html .= '<li><a href="'.base_url($val3->url.'.html').'"><em class="UI">&nbsp;</em>'.$val3->title.'</a></li>'."\n\t\t\t\t\t\t\t\t";
							}
						}
						$html .= '</ul>'."\n\t\t\t\t\t\t\t";
					}
				}
				$html .= '</div>'."\n\t\t\t\t\t\t";
				$html .= '<!-- '.$val1->url.' End -->'."\n";
			}
		}
		return $html;
	}
	//查询菜单
	private function getMenus($fid){
		$this->load->model('sys_menus_m');
		return $this->sys_menus_m->getMenus($fid);
	}
	//菜单信息
	private function getMenuInfo($url){
		$this->load->model('sys_menus_m');
		$fid = $this->sys_menus_m->getMenusUrl($url);
		$navid = $this->sys_menus_m->getMenuOne($fid[0]->fid);
		$nav = $this->sys_menus_m->getMenuOne($navid[0]->fid);
		$this->Title = $fid[0]->title;
		$this->Cid = $fid[0]->id;
		$this->MenuTwoId = $navid[0]->id;
		$this->NavId = $nav[0]->id;
	}
/*------------------------------------------------------------------
* 动作菜单
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
					$html = '<a href="'.base_url().$this->uri->segment(1).'.html" class="'.$val->class.'"><em class="UI">&nbsp;</em>'.$val->name.'</a>'."\n\t\t";
				}else{
					$html .= '<span>|</span>'."\n\t\t";
					$html .= '<a href="#" class="'.$val->class.'"><em class="UI">&nbsp;</em>'.$val->name.'</a>'."\n\t\t";
				}
			}
			$i++;
		}
		return $html;
	}
/*------------------------------------------------------------------
* 菜单权限
-------------------------------------------------------------------*/
	private function menuPrem($mid){
		$permArr = $_SESSION['uinfo']['permArr'];
		if(!isset($permArr[$mid])){
			header('location: '.base_url().$this->dirName.'index_c/loginOut.html');
			exit();
		}
	}
/*------------------------------------------------------------------
* 动作权限
-------------------------------------------------------------------*/
	private function actionPrem($Aname){
		//echo $Aname.$permArr[$this->Cid];
	}
/*------------------------------------------------------------------
* 状态名称
-------------------------------------------------------------------*/
	public function stateName($type){
		$arr = array('<span class="c999">未提交</span>','<span class="green">通过</span>','<span class="red">未通过</span>','<span class="red">未审核</span>');
		return $arr[$type];
	}
}
?>