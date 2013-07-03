<?php
class Sys_menus_m extends CI_Model {
	var $table = 'sys_menus';
	//分页
	function page($num, $offset, $like=''){
		$this->db->order_by('fid desc,sort desc');
		if($like){$this->db->like($like);}
		$query = $this->db->get($this->table,$num,$offset);
		return $query->result();
	}
	//数据表条数
	function count_all($like=''){
		if($like){$this->db->like($like);}
		return $this->db->count_all_results($this->table);
	}
	//查询一条数据
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			return $query->result_array();
		}
	}
	
	//根据fid查询菜单
	function getMenus($fid){
		$this->db->order_by('sort asc,id asc');
		$query = $this->db->get_where($this->table,array('fid' => $fid));
		return $query->result();
	}
	
	//根据fid查询菜单
	function getMenuOne($id){
		$query = $this->db->get_where($this->table,array('id' => $id));
		return $query->result();
	}
	
	//获取FID
	function getMenusUrl($url){
		$query = $this->db->get_where($this->table,array('url' => $url));
		return $query->result();
	}
	
	//添加
	function add(){
		$title = trim($this->input->post('title'));
		if($title){
			$data['title'] = $title;
			$data['fid'] = $this->input->post('fid');
			$data['url'] = trim($this->input->post('url'));
			$data['perm'] = $this->input->post('perm');
			$data['remark'] = $this->input->post('remark');
			$data['sort'] = trim($this->input->post('sort'));
			$data['ctime'] = date('Y-m-d H:i:s');
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	
	//更新
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['title'] = $this->input->post('title');
			$data['fid'] = $this->input->post('fid');
			$data['url'] = $this->input->post('url');
			$data['perm'] = $this->input->post('perm');
			$data['remark'] = $this->input->post('remark');
			$data['sort'] = $this->input->post('sort');
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	
	//删除
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