<?php
class Class_web_m extends CI_Model {
	var $table = 'class_web';
	/* Get Menus */
	function getMenus($fid){
		$this->db->select('id,title,url,ico');
		$this->db->order_by('sort asc,id asc');
		$query = $this->db->get_where($this->table,array('fid' => $fid,'state'=>'1'));
		return $query->result();
	}
	/* Get ID */
	function getID($url){
		$this->db->select('id,fid');
		$query = $this->db->get_where($this->table,array('url' => $url,'state'=>'1'));
		return $query->row();
	}
	/* Get ID */
	function getMenu($fid){
		$this->db->select('id,fid');
		$query = $this->db->get_where($this->table,array('id' => $fid,'state'=>'1'));
		return $query->row();
	}
}
