<?php
class Web_book_m extends CI_Model {
	var $table = 'web_book';
	//分页
	function page($num, $offset, $like=''){
		$this->db->order_by('id desc');
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	//数据表条数
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	//查询一条数据
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			return $query->result_array();
		}
	}
	
	//更新
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['reply'] = $this->input->post('reply');
			$data['admin'] = $this->input->post('admin');
			$data['rtime'] = date('Y-m-d H:i:s');
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	
	//删除
	function del(){
		$id = trim($this->input->post('id'));
		if($id){
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$this->db->where('id', $val);
				if($this->db->delete($this->table)){
					$data = true;
				}else{
					$data = false;
					break;
				}
			}
			return $data;
		}
	}
	
}
?>