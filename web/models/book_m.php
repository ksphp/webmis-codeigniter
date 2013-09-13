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
	/*添加*/
	function add(){
		$title = $this->input->post('title');
		if($title){
			$data['title'] = $title;
			$data['content'] = $this->input->post('content');
			$data['ctime'] = date('Y-m-d H:s:i');
			
			return $this->db->insert($this->table,$data);
		}
	} 
}
?>