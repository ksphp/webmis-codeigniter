<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	//公共变量
	var $Cid;
	var $navName;
	
	function __construct(){
		parent::__construct();

		//公共加载
		$this->load->library('session');
		//菜单信息
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
		
		//配置
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
		
		//返回数据
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
		//头部数据
		$data['navHtml']=$this->getNavHtml();
		$data['navName']=$this->navName;
		
		$this->load->view('inc/top',$data);
		$this->load->view($url);
		$this->load->view('inc/bottom');
	}
/*------------------------------------------------------------------
* 导航菜单
-------------------------------------------------------------------*/
	private function getNavHtml(){
		$nav = $this->getMenus(0);
		$html = '';
		foreach($nav as $val){
			//按钮样式、屏蔽index_c
			if($val->id==$this->Cid) {
				$class = 'nav_an1';
				$mark = 'id="nav_mark"';
			}else {
				$class = 'nav_an2';
				$mark = '';
			}
			//是否是首页
			//$url = ($val->url=='index_c.html')?base_url():base_url($val->url);
			if($val->url=='index_c.html') {
				$val->url = '';
				$val->title = '<span>&nbsp;</span>';
			}
			//导航
			$html .= '<li '.$mark.'>';
			//二级分类
			$nav2 = $this->getMenus($val->id);
			if($nav2){
				$html .= '	<ul class="nav_two">';
				foreach($nav2 as $val2){
					$html .= '		<li><a href="'.base_url($val2->url).'"><h2>'.$val2->title.'</h2></a></li>';
				}
				$html .= '	</ul>';
			}
			$html .= '	<a href="'.base_url($val->url).'" id="navTitle" class="'.$class.'"><h1>'.$val->title.'</h1></a>';
			$html .= '</li>';
			
			/*//二级分类
			$nav2 = $this->getMenus($val->id);
			$h2 .= '<li id="nav_menu_'.$i.'" class="'.$mclass.'">';
			if($nav2 && $val->url != 'index_c.html'){
				$h2 .= '|&nbsp;&nbsp;';
				foreach($nav2 as $val2){
					$h2 .= '<a href="'.base_url($val2->url).'" >'.$val2->title.'</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
				}
			}else {
				$h2 .= '<marquee scrolldelay="160">首页文本提示！</marquee>';
			}
			$h2 .= '</li>';
			$i ++;*/
		}
		
		return $html;
	}
	//查询菜单
	private function getMenus($fid){
		$this->load->model('class_m');
		return $this->class_m->getMenus($fid);
	}
	//菜单信息
	private function getMenuInfo($url){
		$this->load->model('class_m');
		$fid = $this->class_m->getMenusUrl($url.'.html');
		$this->Cid = $fid[0]->id;
		$this->navName = $fid[0]->title;
	}
}
?>