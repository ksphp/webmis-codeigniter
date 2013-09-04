<?php
class Sys_menus_action_m extends CI_Model {
	var $table = 'sys_menus_action';
	/*分页*/
	function page($num, $offset, $like=''){
		$this->db->order_by("id");
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/*数据表条数*/
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	/*查询一条数据*/
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->result();
			return $data[0];
		}
	}
	/*查询全部*/
	function getAll(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*添加*/
	function add(){
		$name = $this->input->post('name');
		if($name){
			$data['name'] = $name;
			$data['perm'] = $this->input->post('perm');
			$data['ico'] = $this->input->post('ico');
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	/*更新*/
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
	/*删除*/
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
?>