<?php
class News extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		$this->load->model('class_m');
		$this->load->model('news_m');
		/*查找全部*/
		$title = '全部';
		$url = 'news/index.html';
		$like = array('class'=>':2:');
		$data = $this->Page($url,'news_m',10,array('state'=>'1'),$like);
		$data['ctitle'] = $title;
		/*分类*/
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/*热门资讯*/
		$data['news']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'),'click desc');
		$data['news']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'),'click desc');
		
		$this->MyView('news/index',$data);
	}

	/*分页列表*/
	public function lists($name=''){
		$this->load->helper('my');
		$this->load->model('class_m');
		$this->load->model('news_m');
		/*分类*/
		$data['className'] = $this->class_m->getClass();
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/*分页查询*/
		if($name){
			$class = $this->class_m->getMenusUrl('news/lists/'.$name.'.html');
			$title = $class[0]->title;
			$url = 'news/lists/'.$name.'.html';
			$like = array('class'=>':'.$class[0]->id.':');
		}else{
			$title = '全部';
			$url = 'news/lists.html';
			$like = array('class'=>':2:');
		}
		$data = $this->Page($url,'news_m',15,array('state'=>'1'),$like);
		$data['ctitle'] = $title;
		/*分类*/
		$data['class'] = $this->class_m->getMenus($this->Cid);
		/*热门*/
		$data['news']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'),'click desc');
		$data['news']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'),'click desc');
		
		$this->MyView('news/index',$data);
	}

	/*详细信息*/
	public function show($id=''){
		$this->load->helper('my');
		$this->load->model('news_m');
		if($id){
			$menus = $this->news_m->getShow($id);
			$data['show'] = @$menus[0];
		}else{
			$data['show'] = false;
		}
		/*最新*/
		$data['news1']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'));
		$data['news1']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'));
		/*热门*/
		$data['news2']['tu'] = $this->news_m->getN(2,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'),'click desc');
		$data['news2']['text'] = $this->news_m->getN(8,0,array('state'=>'1'),array('class'=>':2:'),'click desc');
		
		$this->MyView('news/show',$data);
	}
}
?>