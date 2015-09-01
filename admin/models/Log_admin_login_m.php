<?php
class Log_admin_login_m extends CI_Model {
	var $table = 'log_admin_login';
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
			$this->db->trans_start();
			$arr = json_decode($id);
			foreach($arr as $val){
				$this->db->delete($this->table,array('id'=>$val));
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{return FALSE;}
	}
}