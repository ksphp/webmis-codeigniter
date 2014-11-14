<?php
class Web_news_m extends CI_Model {
	var $table = 'web_news';
	var $tableHtml = 'web_news_html';
	/* Page */
	function page($num, $offset, $like='',$where=''){
		if($like) {$this->db->like($like);}
		if($where) {$this->db->where_in('state', $where['in']);}
		$db = clone($this->db);
		$this->db->order_by('id desc');
		$query = $this->db->get($this->table,$num,$offset);
		$data = $query->result();
		$total = $db->count_all_results($this->table);
		return array('data'=>$data,'total'=>$total);
	}
	
	/* Get One */
	function getOne(){
		$id = $this->input->post('id');
		if($id){
			$data[$this->table.'.id'] = $id;
			$this->db->join($this->tableHtml, $this->table.'.id = '.$this->tableHtml.'.nid');
			$query = $this->db->get_where($this->table,$data);
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
			$data['img'] = $this->input->post('img');
			$data['source'] = trim($this->input->post('source'));
			$data['author'] = trim($this->input->post('author'));
			$data['key'] = preg_replace("/ /",",",$this->input->post('key'));
			$data['summary'] = $this->input->post('summary');
			$data['uname'] = $_SESSION['uinfo']['uname'];
			$data['ctime'] = trim($this->input->post('ctime'));
			$contnet = $this->input->post('content');
			
			if($this->db->insert($this->table,$data)){
				$dataHtml['nid'] = $this->db->insert_id();
				$dataHtml['content'] = $contnet;
				return $this->db->insert($this->tableHtml,$dataHtml)?true:false;
			}else{
				return false;
			}
		}
	}
	/* Update */
	function update(){
		$id = $this->input->post('id');
		if($id){
			$data['class'] = $this->input->post('fid');
			$data['title'] = trim($this->input->post('title'));
			$data['img'] = $this->input->post('img');
			$data['source'] = trim($this->input->post('source'));
			$data['author'] = trim($this->input->post('author'));
			$data['ctime'] = trim($this->input->post('ctime'));
			$data['key'] = preg_replace("/ /",",",$this->input->post('key'));
			$data['summary'] = $this->input->post('summary');
			$contnet = $_POST['content'];
			
			$this->db->where('id', $id);
			if($this->db->update($this->table,$data)){
				$dataHtml['content'] = $contnet;
				$this->db->where('nid', $id);
				return $this->db->update($this->tableHtml, $dataHtml)?true:false;
			}else{
				return false;
			}
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
					$rt = true;
				}else{
					$rt = false;
					break;
				}
				$this->db->where('nid', $val);
				if($this->db->delete($this->tableHtml)){
					$rt = true;
				}else{
					$rt = false;
					break;
				}
			}
			return $rt;
		}
	}
	/* Audit */
	function audit(){
		$id = trim($this->input->post('id'));
		if($id){
			$arr = array_filter(explode(' ', $id));
			foreach($arr as $val){
				$data['state'] = $this->input->post('state');
				/*添加审核人*/
				if($data['state']=='1' || $data['state']=='2'){
					$data['audit'] = $_SESSION['uinfo']['uname'];
					$data['atime'] = date('Y-m-d H:i:s');
				}
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