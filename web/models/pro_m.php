<?php
class Pro_m extends CI_Model {
	var $table = 'web_pro';
	/*分页*/
	function page($num, $offset, $where,$like,$order='id desc'){
		$this->db->order_by($order);
		$this->db->where($where);
		$this->db->like($like);
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/*数据表条数*/
	function count_all($where=array(),$like=array()){
		$this->db->where($where);
		$this->db->like($like);
		return $this->db->count_all_results($this->table);
	}
	/*查询N条数据*/
	function getN($limit, $offset, $where=array(),$like=array(),$order='id desc'){
		$this->db->select('id,class,title,img,key,summary,ctime');
		$this->db->where($where);
		$this->db->like($like);
		$this->db->order_by($order);
		$query = $this->db->get($this->table, $limit, $offset);
		return $query->result();
	}
	/*查询详细*/
	function getShow($id){
		$query = $this->db->get_where($this->table,array('id'=>$id,'state'=>'1'));
		$data = $query->result();
		return @$data[0];
	}
	/*更新点击数*/
	private function upClick($id,$click){
		$data['click'] = $click+1;
		$this->db->where('id', $id);
		$this->db->update($this->table,$data);
	}
}
?>