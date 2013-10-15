<?php
class Online extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		$this->load->model('class_m');
		$this->load->model('news_m');
		$this->load->model('html_m');
		/* 默认 */
		$title = '关于我们';
		$like = array('state'=>'1','class'=>':7:');
		
		$data['ctitle'] = $title;
		$id = $this->html_m->getID($like);
		/* 获取详细信息 */
		if($id){
			$menus = $this->html_m->getShow($id[0]->id);
			$data['show'] = $menus[0];
		}else{
			@$data['show']->content = '数据库暂无信息！';
		}
		/* 分类 */
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/* 最新资讯 */
		$data['news']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'));
		$data['news']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'));
		
		$this->MyView('online/index',$data);
	}

	/* 详细 */
	public function show($name) {
		$this->load->helper('my');
		$this->load->model('class_m');
		$this->load->model('news_m');
		$this->load->model('html_m');
		/* 路由 */
		if($name){
			$class = $this->class_m->getMenusUrl('online/show/'.$name.'.html');
			$title = $class[0]->title;
			$like = array('state'=>'1','class'=>':'.$class[0]->id.':');
		}else{
			$title = '关于我们';
			$like = array('state'=>'1','class'=>':7:');
		}
		
		$data['ctitle'] = $title;
		$id = $this->html_m->getID($like);
		/* 获取详细信息 */
		if($id){
			$menus = $this->html_m->getShow($id[0]->id);
			$data['show'] = $menus[0];
		}else{
			@$data['show']->content = '数据库暂无信息！';
		}
		/* 分类 */
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/* 最新资讯 */
		$data['news']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'));
		$data['news']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'));
		
		$this->MyView('online/index',$data);
	}

	/* 在线留言  */
	public function message() {
		$this->load->helper('my');
		$this->load->model('class_m');
		$this->load->model('news_m');
		$this->load->model('book_m');
		/*查找全部*/
		$url = 'online/message.html';
		$data = $this->Page($url,'book_m',10);
		/* 分类 */
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/* 最新资讯 */
		$data['news']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'));
		$data['news']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'));
		
		$data['js'] = array('/themes/default/js/message.js');
		$this->MyView('online/message',$data);
	}
	public function messageAdd() {
		$this->load->model('book_m');
		echo $this->book_m->add()?true:false;
	}
}
?>