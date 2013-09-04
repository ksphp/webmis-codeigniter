<?php
class Web_html_m extends CI_Model {
	var $table = 'web_html';
	/*分页*/
	function page($num, $offset, $like='',$where='',$order=''){
		$this->db->from($this->table);
		$this->db->order_by($order);
		if($like) {$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		$this->db->limit($num,$offset);
		$query = $this->db->get();
		return $query->result();
	}
	/*数据表条数*/
	function count_all($like='',$where=''){
		if($like){$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		return $this->db->count_all_results($this->table);
	}
	/*查询一条数据*/
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$query = $this->db->get_where($this->table, array('id' => $id));
			$data = $query->result();
			return $data[0];
		}
	}
	/*添加*/
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
	/*更新*/
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
	/*删除*/
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
	/*审核*/
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