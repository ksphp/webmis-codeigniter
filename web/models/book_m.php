<?php
class Book_m extends CI_Model {
	var $table = 'web_book';
	/*分页*/
	function page($num, $offset, $where=''){
		$this->db->order_by('id desc');
		if($where){$this->db->where($where);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/*数据表条数*/
	function count_all($where=''){
		if($where){$this->db->like($where);}
		return $this->db->count_all_results($this->table);
	}
	/*查询N条数据*/
	function getN($limit, $offset, $where=array(),$like=array(),$order='id desc'){
		$this->db->select('id,name,content,ctime');
		$this->db->where($where);
		$this->db->like($like);
		$this->db->order_by($order);
		$query = $this->db->get($this->table, $limit, $offset);
		return $query->result();
	}
	/*添加*/
	function add(){
		$name = $this->input->post('name');
		if($name){
			$data['name'] = $name;
			$data['content'] = $this->input->post('content');
			$data['ctime'] = date('Y-m-d H:s:i');
			
			return $this->db->insert($this->table,$data);
		}
	} 
}
?>