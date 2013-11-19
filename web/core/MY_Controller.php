<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	/*公共变量*/
	var $Cid;
	var $navName;
	var $IsMobile;
	
	function __construct(){
		parent::__construct();
		/*公共变量*/
		session_start();
		if(!isset($_SESSION['uinfo']['is_mobile'])) {
			$_SESSION['uinfo']['is_mobile'] = $this->IsMobile();
		}
		$this->IsMobile = $_SESSION['uinfo']['is_mobile'];
		/*菜单信息*/
		$Cname = $this->router->class;
		$this->getMenuInfo($Cname);
	}
/*------------------------------------------------------------------
* 分页
-------------------------------------------------------------------*/
	public function Page($url,$model,$page=10,$where = array(),$like=array(),$order='id desc',$type='page'){
		$this->load->library('pagination');
		$this->load->model($model);
		
		$get_url = '?';
		
		/*配置*/
		$config['base_url'] = base_url().$url.$get_url;
		$config['total_rows'] = $this->$model->count_all($where,$like);
		$config['page_query_string'] = TRUE;
		$config['per_page'] = $page;
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
		
		/*返回数据*/
		$per_page = $this->input->get('per_page');
		$data['list'] = $this->$model->$type($config['per_page'],$per_page,$where,$like,$order);
		$data['page'] = $this->pagination->create_links();
		$data['total'] = '共<b> '.$config['total_rows'].' </b>条';
		
		return $data;
	}
/*------------------------------------------------------------------
* 自定义3层视图
-------------------------------------------------------------------*/
	public function MyView($url,$data=''){
		/*头部数据*/
		$data['navName']=$this->navName;
		/*公共信息*/
		$data['IsMobile']=$this->IsMobile;
		$data['Menu']=$this->getMenu(0);
		/*视图*/
		if($this->IsMobile) {
			$this->load->view('inc/top',$data);
			$this->load->view($url);
			$this->load->view('inc/bottom');
		}else {
			$this->load->view('inc/top',$data);
			$this->load->view($url);
			$this->load->view('inc/bottom');
		}
	}
/*------------------------------------------------------------------
* 导航菜单
-------------------------------------------------------------------*/
	private function getMenu($fid){
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
	/*查询菜单*/
	private function getMenus($fid){
		$this->load->model('class_m');
		return $this->class_m->getMenus($fid);
	}
	/*菜单信息*/
	private function getMenuInfo($url){
		$this->load->model('class_m');
		$fid = $this->class_m->getMenusUrl($url.'.html');
		$this->Cid = $fid[0]->id;
		$this->navName = $fid[0]->title;
	}
	/*是否手机设备*/
	private function IsMobile() {
		/*是否手机设备*/
		$this->load->library('user_agent');
		$mode = $this->input->get('mode');
		if($mode) {
			$data = $mode=='mobile'?true:false;
		}else {
			$data = $this->agent->is_mobile();
		}
		return $data;
	}
}
?>