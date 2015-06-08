<?php
class Web_html_m extends CI_Model {
	var $table = 'web_html';
	/* Page */
	function page($num, $offset, $like='',$where='',$order=''){
		if($like) {$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		$db = clone($this->db);
		$this->db->order_by('id desc');
		$query = $this->db->get($this->table,$num,$offset);
		$data = $query->result();
		$total = $db->count_all_results($this->table);
		return array('data'=>$data,'total'=>$total);
	}
	/* Count All */
	function count_all($like='',$where=''){
		if($like){$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		return $this->db->count_all_results($this->table);
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
	/* Add */
	function add(){
		$title = trim($this->input->post('title'));
		if($title){
			$data['class'] = $this->input->post('fid');
			$data['title'] = $title;
			$data['uname'] = $_SESSION['uinfo']['uname'];
			$data['ctime'] = trim($this->input->post('ctime'));
			$data['img'] = trim($this->input->post('img'));
			$data['key'] = trim($this->input->post('key'));
			$data['summary'] = $this->input->post('summary');
			$data['content'] = $this->input->post('content');
			
			return $this->db->insert($this->table,$data)?true:false;
		}
	}
	/* Update */
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['class'] = $this->input->post('fid');
			$data['title'] = trim($this->input->post('title'));
			$data['ctime'] = trim($this->input->post('ctime'));
			$data['img'] = trim($this->input->post('img'));
			$data['key'] = trim($this->input->post('key'));
			$data['summary'] = $this->input->post('summary');
			$data['content'] = $this->input->post('content');
			
			$this->db->where('id', $id);
			return $this->db->update($this->table, $data)?true:false;
		}
	}
	/* Delete */
	function del(){
		$id = trim($this->input->post('id'));
		if($id){
			$this->db->trans_start();
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$this->db->delete($this->table,array('id'=>$val));
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{return FALSE;}
	}
	/* Audit */
	function audit(){
		$id = trim($this->input->post('id'));
		if($id){
			$this->db->trans_start();
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$data['state'] = $this->input->post('state');
				$this->db->update($this->table,$data,array('id'=>$val));
			}
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{return FALSE;}
	}
}