<?php
class Html_m extends CI_Model {
	var $table = 'web_html';
	/* 查询详细 */
	function getShow($id){
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			return $query->result();
		}
	}
	/* 返回ID */
	function getID($like){
		$this->db->select('id');
		$this->db->like($like);
		$query = $this->db->get($this->table);
		return $query->result();
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
	/*更新点击数*/
	private function upClick($id,$click){
		$data['click'] = $click+1;
		$this->db->where('id', $id);
		$this->db->update($this->table,$data);
	}
}
?>