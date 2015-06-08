<?php
class Web_book_m extends CI_Model {
	var $table = 'web_book';
	/* Page */
	function page($num, $offset, $like=''){
		if($like){$this->db->like($like);}
		$this->db->order_by('id desc');
		$db = clone($this->db);
		$query = $this->db->get($this->table,$num,$offset);
		$data = $query->result();
		$total = $db->count_all_results($this->table);
		return array('data'=>$data,'total'=>$total);
	}

	/* Get One */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->row();
			return $data;
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
			$this->db->trans_start();
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$this->db->delete($this->table,array('id'=>$val));
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{return FALSE;}
	}
}
?>