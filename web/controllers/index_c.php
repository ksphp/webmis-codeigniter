<?php
class Index_c extends MY_Controller {
	public function index(){
		$this->load->helper('my');
		$this->load->model('news_m');
		$this->load->model('pro_m');
		$this->load->model('book_m');
		$data['js'] = array('/themes/default/js/index.js');
		/* 新闻 */
		$data['news']['tu'] = $this->news_m->getN(1,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':2:'));
		$data['news']['text'] = $this->news_m->getN(6,0,array('state'=>'1'),array('class'=>':2:'));
		/* 产品展示 */
		$data['pro'] = $this->pro_m->getN(6,0,array('LENGTH(img) >'=>'0','state'=>'1'),array('class'=>':6:'));
		/* 在线留言 */
		$data['msg'] = $this->book_m->getN(8,0);
		
		$this->MyView('index/index',$data);
	}
}
?>