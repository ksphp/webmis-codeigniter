<?php
class Log_admin_login_m extends CI_Model {
	var $table = 'log_admin_login';
	/* Page */
	function page($num, $offset, $like=''){
		$this->db->order_by("id",'desc');
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	/* Count All*/
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	/* Add */
	function add($type,$uname,$ip,$agent){
		$data['type'] = $type;
		$data['uname'] = $uname;
		$data['ip'] = $ip;
		$data['agent'] = $agent;
		$data['time'] = date('Y-m-d H:i:s');
		return $this->db->insert($this->table,$data);
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