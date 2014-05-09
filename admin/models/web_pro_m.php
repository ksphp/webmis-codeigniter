<?php
class Web_pro_m extends CI_Model {
	var $table = 'web_pro';
	/* Page */
	function page($num, $offset, $like='',$where='',$order=''){
		$this->db->from($this->table);
		$this->db->order_by($order);
		if($like) {$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		$this->db->limit($num,$offset);
		$query = $this->db->get();
		return $query->result();
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
			$data = $query->result();
			return $data[0];
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
?>