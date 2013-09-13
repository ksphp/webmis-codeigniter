<?php
class Class_m extends CI_Model {
	var $table = 'web_class';
	/*根据fid查询菜单*/
	function getMenus($fid){
		$this->db->select('id, fid, title, url, ico');
		$this->db->order_by('sort asc,id asc');
		$query = $this->db->get_where($this->table,array('fid' => $fid));
		return $query->result();
	}
	/*通过ID获取*/
	function getMenusID($id){
		$this->db->select('id, url');
		$query = $this->db->get_where($this->table,array('id' => $id));
		return $query->result();
	}
	/*通过URL获取*/
	function getMenusUrl($url){
		$this->db->select('id, title');
		$query = $this->db->get_where($this->table,array('url' => $url));
		return $query->result();
	}
	/*返回ID、Title 所有字段*/
	function getClass($where=array()){
		$this->db->select('id, title');
		if($where){$this->db->where($where);}
		$query = $this->db->get($this->table);
		$row = $query->result();
		foreach($row as $val){
			$data[$val->id] = $val->title;
		}
		return $data;
	}
	
}
?>