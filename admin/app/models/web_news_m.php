<?php
class Web_news_m extends CI_Model {
	var $table = 'web_news';
	var $tableHtml = 'web_news_html';
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
			$data[$this->table.'.id'] = $id;
			$this->db->join($this->tableHtml, $this->table.'.id = '.$this->tableHtml.'.nid');
			$query = $this->db->get_where($this->table,$data);
			
			return $query->result();
		}
	}
	/*添加*/
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
	/*更新*/
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
	
	/*删除*/
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
	/*审核*/
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
?>