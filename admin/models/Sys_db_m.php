<?php
class Sys_db_m extends CI_Model {
	/* Database Table */
	public function getTableList(){
		$table = $this->db->list_tables();
		foreach($table as $val){
			$field = '';
			$num = $this->db->count_all($val);
			$fields = $this->db->list_fields($val);
			foreach($fields as $val1){
				$field .= $val1.', ';
			}
			$data[] = array('name'=>$val,'field'=>$field,'num'=>$num);
		}
		return $data;
	}
	/* Remove Table */
	function delTable(){
		$id = trim($this->input->post('id'));
		if($id){
			$this->db->trans_start();
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$this->db->query('DROP TABLE '.$val);
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{return FALSE;}
	}
}