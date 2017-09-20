<?php

class Model_users extends CI_Model {

	public function can_log_in(){
		
		error_log("passsssowrdddddd".md5($this->input->post('password')));
		
		$this->db->where('user_name', $this->input->post('user_name'));
		$this->db->where('password',md5($this->input->post('password')));
		$this->db->where('activated',1);
		
		$query = $this->db->get('user');
		
		
		if($query->num_rows() == 1){
			$result = $query->result();
			
			/* $expDate =  date_create($result{0}->expiration);
			$dateToday = date_create();
			$diff =  date_diff($dateToday,$expDate);
			if($diff->format("%R%a") < 0){
				return false;
			} */
			
			$data = array(
					'full_name' => $result{0}->last_name.",".$result{0}->first_name,
					'user_name' => $this->input->post('user_name'),
					'is_logged_in' => 1,
					'permission' => $result{0}->permission,
					'user_id' => $result{0}->id
			);
			
			$this->session->set_userdata($data);
			
			return true;
		}else{
			$this->session->set_userdata(null);
			return false;
		}
	}
	
	public function add_user(){
		
		if($this->input->post('user_permission')==1){
		$date = date_create();
		date_date_set($date, 9999, 1, 1);
		$expiration_date =date_format($date, 'Y-m-d');  
		}else{
		$expiration_date = $this->getUserExpirationDate();
		}
		
		
		
		$data = array(
		'user_name' => $this->input->post('user_name'),
		'password' => md5($this->input->post('password')),
		'permission' => $this->input->post('user_permission'),
		'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'email' => $this->input->post('email'),
		'course' => $this->input->post('course'),
		'contact_number' => $this->input->post('contact_number'),				
		'student_number' => $this->input->post('student_number'),
		'user_photo' => $this->input->post('user_photo'),				
		'expiration' => $expiration_date	
		);
		
		$query = $this->db->insert('user',$data);
		
		$user_id= $this->db->insert_id();
		
		if(sizeof($this->input->post('subjects[]')) > 0){
			foreach ($this->input->post('subjects[]') as $value){
				$sqlStatement = "INSERT INTO user_subject (subject_id,user_id) ";
				$sqlStatement .="SELECT ".$value.", ".$user_id;
				$queryLogs = $this->db->query($sqlStatement);
			}
		}
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function getAllNotActive(){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('activated',0);
			$this->db->where('deleted', 0);
			$this->db->where('newly_created',0);
			$this->db->order_by("user_name", "asc");
			$query = $this->db->get();
			$result = $query->result();
			return $result;
	}
	
	public function getAllActive(){
		/* $this->db->select('*');
		$this->db->from('user');
		$this->db->where('activated',1);
		$this->db->where('deleted', 0);
		$this->db->order_by("user_name", "asc");
		$query = $this->db->get(); */
		
		$sqlStatement = "select u.*, (select count(*) > 0 from item i where i.approved = 1 and i.borrower = u.id) as not_cleared from user u where u.deleted = 0 and u.activated = 1 order by u.last_name asc; ";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
		
		
	}
	
	public function getAllPending(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('activated',0);
		$this->db->where('deleted', 0);
		$this->db->where('newly_created',1);
		$this->db->order_by("user_name", "asc");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function activateSelected($id){
		$data = array(
               'activated' => 1,
            );
		$this->db->where('id', $id);
		$this->db->update('user', $data); 
	}
	
	public function clearSelected($id){
		$data = array(
				'deleted' => 1,
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	
	public function activatePendingSelected($id){
		$data = array(
				'activated' => 1,
				'newly_created' => 0
		);
		$this->db->where('id', $id);
		$this->db->where('deleted', 0);
		$this->db->update('user', $data);
	}
	
	public function deactivateSelected($id){
		$data = array(
				'activated' => 0,
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	
	
	
	public function getAllUsers(){
// 		$this->db->select('*');
// 		$this->db->from('user');
// 		$this->db->where('deleted' , 0);
// 		$this->db->order_by("user_name", "asc");
// 		$query = $this->db->get();
// 		$result = $query->result();

		$sqlStatement = "select u.*, (select count(*) > 0 from item i where i.approved = 1 and i.borrower = u.id) as not_cleared from user u where u.deleted = 0 order by u.last_name asc; ";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
		
		
	}
	
	public function setUserExpiration(){
		$data = array(
				'account_expiration' => $this->input->post('user_expiration')
		);
		
		$this->db->update('expiration', $data);
		
// get the last query of the sql 		
//		error_log("db update22".$this->db->last_query());
	}
	
	public function getUserExpirationDate(){
		$this->db->select('account_expiration');
		$this->db->from('expiration');
		$query = $this->db->get();
		$result = $query->result();
		
		if(sizeof($result) > 0){
			return $result{0}->account_expiration;
		}
		return date("Y-m-d");
	}
	
	
	public function getAllExpired(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('permission', 0);
		$this->db->where('expiration <', date("Y-m-d"));
		$this->db->order_by("user_name", "asc");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function updateExpiration($id){
		$data = array(
				'expiration' => $this->getUserExpirationDate()
		);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	
	public function getAllBorrower(){
		$sqlStatement = "select distinct u.*,s.subject_name,atc.date_needed from user u ";
		$sqlStatement .= "inner join add_to_cart atc on u.id = atc.user_id ";
		$sqlStatement .= "left join subjects s on s.subject_id = atc.subject_id ";
		$sqlStatement .= "where atc.confirmed = 1 ";
		
		
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function getAllBorrowerReturn(){
		$sqlStatement = "select * from user where id in (select distinct(borrower) from item where approved = 1); ";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function editUser(){
		
		/* error_log("first_name".$this->input->post('first_name'));
		error_log("last_name".$this->input->post('last_name'));
		error_log("email".$this->input->post('email'));
		error_log("contact_number".$this->input->post('contact_number'));
		error_log("user_photo".$this->input->post('user_photo')); */
		
		$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'contact_number' => $this->input->post('contact_number'),
				'user_photo' => $this->input->post('user_photo'),
				'course' => $this->input->post('course')
		);
		
		$this->db->where('id', $this->input->post('user_id_edit'));
		$this->db->update('user', $data);
	}
	
}