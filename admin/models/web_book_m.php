<?php
class Web_book_m extends CI_Model {
	var $table = 'web_book';
	/* Page */
	function page($num, $offset, $like=''){
		$this->db->order_by('id desc');
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/* Count All */
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	/* Get One */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->result();
			return $data[0];
		}
	}
	/* Update */
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
	/* Delete */
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