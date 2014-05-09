<?php
class Sys_admin_m extends CI_Model {
	var $table = 'sys_admin';
	/* Page */
	function page($num, $offset, $like=''){
		$this->db->order_by("id",'desc');
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/* Count All */
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	/* GetOne */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->result();
			return $data[0];
		}
	}
	/* Login */
	function login($uname,$passwd){
		if($uname){
			$data['uname'] = $uname;
			$data['password'] = md5($passwd);
			
			$this->db->where($data);
			$num = $this->db->count_all_results($this->table);
			if($num){
				$query = $this->db->get_where($this->table,$data);
				return $query->result();
			}else{
				return false;
			}
		}
	}
	/* Username */
	function uname(){
		$uname=$this->input->post('param');
		if($uname){
			$this->db->where('uname =',$uname);
			return $this->db->count_all_results($this->table);
		}
	}
	/* Add */
	function add(){
		$uname = trim($this->input->post('uname'));
		if($uname){
			$data['uname'] = $uname;
			$data['password'] = md5($this->input->post('passwd'));
			$data['email'] = trim($this->input->post('email'));
			$data['name'] = trim($this->input->post('name'));
			$data['department'] = trim($this->input->post('department'));
			$data['position'] = trim($this->input->post('position'));
			$data['rtime'] = date('Y-m-d H:i:s');
			$data['state'] = trim($this->input->post('state'));
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	/* Update */
	function update(){
		$id = $this->input->post('id');
		if($id){
			/*密码是否改变*/
			$passwd = $this->input->post('passwd');
			if($passwd){$data['password'] = md5($passwd);}
			
			$data['email'] = trim($this->input->post('email'));
			$data['name'] = trim($this->input->post('name'));
			$data['department'] = trim($this->input->post('department'));
			$data['position'] = trim($this->input->post('position'));
			$data['state'] = trim($this->input->post('state'));
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	/* UpdatePerm */
	function updatePerm(){
		$id = $this->input->post('id');
		if($id){
			$data['perm'] = trim($this->input->post('perm'));
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	/* ChangePasswd */
	function updatePasswd(){
		$uname = $this->input->post('uname');
		if($uname){
			$data['password'] = md5($this->input->post('passwd'));
			$this->db->where('uname', $uname);
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