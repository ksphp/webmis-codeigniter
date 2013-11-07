<?php
class Sys_config_m extends CI_Model {
	var $table = 'sys_config';
	/* System Config */
	function getVal(){
		$query = $this->db->get($this->table);
		$row = $query->result();
		foreach($row as $val){
			$data[$val->name] = $val->contnet;
		}
		return $data;
	}
	/* Update */
	function update(){
		$rt=false;
		$post = $this->input->post();
		if($post){
			foreach($post as $key=>$val){
				$data['contnet'] = $val;
				$this->db->where('name', $key);
				if($this->db->update($this->table, $data)){
					$rt=true;
				}else{
					$rt=false;
					break;
				}
			}
		}
		return $rt;
	}
}
?>