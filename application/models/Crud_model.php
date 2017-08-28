<?php
class Crud_model extends CI_Model{
	
	public function fetch($table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}

		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
	

	public function fetch_tag($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function fetch_tag_row($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function update($table,$data,$where=""){
		if($where!="") {
				$this->db->where($where);
		}

		$result = $this->db->update($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($table,$where=""){
		if($where!=""){
			$this->db->where($where);
		}
	 	$result = $this->db->delete($table); 
 		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function join_reimburse_row($id){
		$this->db->select('*');
		$this->db->where('classification.id',$id);
		$this->db->from('reimbursement');
		$this->db->join('classification', 'reimbursement.classification_id = classification.id', 'inner');
		$query = $this->db->get();
		return $query->row();
	}

	public function join_user_reimbursement($where) {
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from('reimbursement');
		$this->db->join('users', 'reimbursement.user_id = users.id', 'inner');
		$query = $this->db->get();
		return $query->row();
	}

	public function join_user_reimbursement_result() {
		$this->db->select('*,reimbursement.id as rid, reimbursement.status as rstatus');
		$this->db->from('users');
		$this->db->join('reimbursement', 'reimbursement.user_id = users.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}
	// $this->db->select('*');
	// $this->db->from('collecties');
	// $this->db->join('artikelen', 'artikelen.collecties_id = collecties.id');
	// $this->db->select('artikelen.*,collecties.title as ctitle');

	

}