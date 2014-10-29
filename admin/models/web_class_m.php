<?php
class Web_class_m extends CI_Model {
	var $table = 'web_class';
	/* Page */
	function page($num, $offset, $like=''){
		if($like){$this->db->like($like);}
		$db = clone($this->db);
		$total = $this->db->count_all_results($this->table);
		$db->order_by('fid desc,sort desc,id desc');
		$query = $db->get($this->table,$num,$offset);
		$data = $query->result();
		return array('data'=>$data,'total'=>$total);
	}

	/* Get One */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->row();
			return $data;
		}
	}
	/* Get Menus */
	function getMenus($fid){
		$this->db->order_by('sort asc,id asc');
		$query = $this->db->get_where($this->table,array('fid' => $fid));
		return $query->result();
	}
	/* Get Class */
	function getClass(){
		$this->db->select('id, title');
		$query = $this->db->get($this->table);
		$row = $query->result();
		foreach($row as $val){
			$data[$val->id] = $val->title;
		}
		return $data;
	}
	/* Add */
	function add(){
		$title = trim($this->input->post('title'));
		if($title){
			$data['title'] = $title;
			$data['fid'] = $this->input->post('fid');
			$data['url'] = trim($this->input->post('url'));
			$data['ico'] = trim($this->input->post('ico'));
			$data['remark'] = $this->input->post('remark');
			$data['sort'] = trim($this->input->post('sort'));
			$data['ctime'] = date('Y-m-d H:i:s');
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	/* Update */
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['title'] = trim($this->input->post('title'));
			$data['fid'] = $this->input->post('fid');
			$data['url'] = trim($this->input->post('url'));
			$data['ico'] = trim($this->input->post('ico'));
			$data['remark'] = $this->input->post('remark');
			$data['sort'] = trim($this->input->post('sort'));
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
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
	/* Audit */
	function audit(){
		$id = trim($this->input->post('id'));
		if($id){
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$data['state'] = $this->input->post('state');
				/*执行*/
				$this->db->where('id', $val);
				if($this->db->update($this->table,$data)){
					$rt = true;
				}else{
					$rt = false;
					break;
				}
			}
			return $rt;
		}
	}
}