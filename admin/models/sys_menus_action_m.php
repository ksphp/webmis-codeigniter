<?php
class Sys_menus_action_m extends CI_Model {
	var $table = 'sys_menus_action';
	/* Page */
	function page($num, $offset, $like=''){
		if($like){$this->db->like($like);}
		$db = clone($this->db);
		$total = $this->db->count_all_results($this->table);
		$db->order_by("id");
		$query = $db->get($this->table,$num,$offset);
		$data = $query->result();
		return array('data'=>$data,'total'=>$total);
	}
	
	/* GetOne */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->row();
			return $data;
		}
	}
	/* Get All */
	function getAll(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/* Add */
	function add(){
		$name = $this->input->post('name');
		if($name){
			$data['name'] = $name;
			$data['perm'] = $this->input->post('perm');
			$data['ico'] = $this->input->post('ico');
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	/* Update */
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['name'] = $this->input->post('name');
			$data['perm'] = $this->input->post('perm');
			$data['ico'] = $this->input->post('ico');
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	/* Delete */
	function del(){
		$id = trim($this->input->post('id'));
		if($id){
			$arr = explode(' ', $id);
			foreach($arr as $val){
				$this->db->where('id', $val);
				$data = $this->db->delete($this->table);
			}
			return $data;
		}
	}
}