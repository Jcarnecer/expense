<?php
class Crud_model extends CI_Model{
	// function set_update(){
	// 	$classification = $this->fetch('classification');
	// 	print_r($classification);
	// 	foreach($classification as $row){
	// 		$c_name = $row->classification;
	// 		$c_allowance = $row->allowance_per_user;
	// 		print_r("<br>".$c_name."<br>");
	// 		$user = $this->fetch('users');
	// 		foreach($user as $user_row){
	// 			$u_allowance_update = $user_row->allowance_update;
	// 			// print_r($u_allowance_update);
	// 		}
	// 	}
		
	// 	// $startdate = $u_allowance_update;
	// 	$startdate = '2017-10-16';
	// 	// $check = date('Y-m-d',strtotime($next_month,$startdate));
	// 	$auto_update = date("Y-m-d", strtotime(date("Y-m-d", strtotime($startdate))."+1 Month"));
	// 	// if($)
	// 	print_r($startdate);
	// 	echo "<br>";
	// 	print_r($auto_update);
	// 	echo "<br>";
	// 	if(date('Y-m-d') > $auto_update){
	// 		echo "remain";
	// 	}else{
	// 		echo "update";
	// 	}
	// 	die;
    //     $expiration = time()-(3600*3); 
    //     $this->db->query("UPDATE reservation set status = 0 WHERE reserve_date < ".$expiration." AND status !=2 AND status !=4 ");  
    // }


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

	public function last_inserted_row($table,$data) {
		$this->db->insert($table, $data);
		$id = $this->db->insert_id();
		$q = $this->db->get_where($table, array('id' => $id));
		return $q->row();
	}

	public function join_reimburse_row($id){
		$this->db->select('*,reimbursement.receipt_img as rimg');
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
		$this->db->order_by('reimbursement.created_at','desc');
		$this->db->join('users', 'reimbursement.user_id = users.id', 'inner');
		$query = $this->db->get();
		return $query->row();
	}

	public function join_user_reimbursement_result() {
		$this->db->select('*,reimbursement.id as rid, reimbursement.status as rstatus, reimbursement.created_at as rcreated_at');
		$this->db->from('users');
		$this->db->order_by('rcreated_at','desc');
		$this->db->join('reimbursement', 'reimbursement.user_id = users.id', 'inner');
		$query = $this->db->get();
		return $query->result();
	}
	// $this->db->select('*');
	// $this->db->from('collecties');
	// $this->db->join('artikelen', 'artikelen.collecties_id = collecties.id');
	// $this->db->select('artikelen.*,collecties.title as ctitle');

	

}