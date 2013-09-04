<?php
class News_m extends CI_Model {
	var $table = 'web_news';
	var $tableHtml = 'web_news_html';
	//分页
	function page($num, $offset, $where,$like,$order){
		$this->db->where($where);
		$this->db->like($like);
		$this->db->order_by($order);
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	//数据表条数
	function count_all($where,$like){
		$this->db->where($where);
		$this->db->like($like);
		return $this->db->count_all_results($this->table);
	}
	//分页
	function search($num, $offset, $like){
		$this->db->order_by('id desc');
		$this->db->or_like($like);
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	//数据表条数
	function count_sea($like=array()){
		$this->db->or_like($like);
		return $this->db->count_all_results($this->table);
	}
	
	//查询N条数据
	function getN($limit, $offset, $where=array(),$like=array(),$order='id desc'){
		$this->db->select('id,class,title,img,summary,ctime,click');
		$this->db->where($where);
		$this->db->like($like);
		$this->db->order_by($order);
		$query = $this->db->get($this->table, $limit, $offset);
		return $query->result();
	}
	//查询详细
	function getShow($id){
		if($id){
			$this->db->join($this->tableHtml, $this->table.'.id = '.$this->tableHtml.'.nid');
			$query = $this->db->get_where($this->table,array($this->table.'.id'=>$id,$this->table.'.state'=>'1'));
			$data = $query->result();
			//添加点击
			if($data){
				$this->upClick($data[0]->id,$data[0]->click);
			}
			return $data;
	}
	}
	//更新点击数
	private function upClick($id,$click){
		$data['click'] = $click+1;
		$this->db->where('id', $id);
		$this->db->update($this->table,$data);
	}
	//返回ID
	function getID($like){
		$this->db->select('id');
		$this->db->like($like);
		$query = $this->db->get($this->table);
		return $query->result();
	}
}
?>