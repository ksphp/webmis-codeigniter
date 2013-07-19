<?php
class Sys_db_m extends CI_Model {
	//数据库表
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
}
?>