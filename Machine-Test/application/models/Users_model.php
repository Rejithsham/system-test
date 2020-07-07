<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	Class Users_model extends CI_Model {
		
		public function __construct() {
			parent::__construct(); 
		}
		
		function insert_details($data,$personal_details){
			if(count($data) > 0){
				$results_users = $this->db->insert('tbl_users', $data);
				if($this->db->affected_rows() > 0){
					$user_id = $this->db->insert_id();
					if($user_id){
						$this->db->where('id', $user_id);
						$user_details['created_by']		= $user_id;
						$user_details['modified_by'] 	= $user_id;
						$user_details['created_date'] 	= date('Y-m-d H:i:s');
						$user_details['modified_date'] 	= date('Y-m-d H:i:s');
						
						$this->db->update('tbl_users', $user_details);
					}
					
					$personal_details['tbl_users_id'] 	= $user_id;
					$personal_details['created_by']		= $user_id;
					$personal_details['modified_by'] 	= $user_id;
					$personal_details['created_date'] 	= date('Y-m-d H:i:s');
					$personal_details['modified_date'] 	= date('Y-m-d H:i:s');				
					$results_user_personal_details 		= $this->db->insert('user_personal_details', $personal_details);		
					if($results_users){
						return $user_id;
						} else {
						return false;
					}
					} else {
					return false;	
				}
			}		
		}
		
		//tbl_users
		function update_tbl_users($data, $condition){
			$result = array();
			if(count($data) > 0){			
				if(isset($condition['id'])){
					$this->db->where('id', $condition['id']);
				}
				
				if(isset($condition['email'])){
					$this->db->where('email', $condition['email']);
				}
				
				if(isset($condition['status'])){
					$this->db->where('status', $condition['status']);
				}
				
				$this->db->update('tbl_users', $data);
				
				if($this->db->affected_rows() > 0){
					$result = true;
				}
			}
			return $result;
		}
		
		function get_tbl_users($data){
			$result = array();
			if(count($data) > 0){
				$this->db->select('Users.*');
				$this->db->from('tbl_users as Users');
				
				if(isset($data['status'])){
					$this->db->where('Users.status', $data['status']);
				}
				
				if(isset($data['id'])){
					$this->db->where('Users.id', $data['id']);
				}
				
				if(isset($data['email'])){
					$this->db->where('Users.email', $data['email']);
				}
				
				if(isset($data['login'])){
					$this->db->where('Users.login', $data['login']);
				}
				
				if(isset($data['created_by'])){
					$this->db->where('Users.created_by', $data['created_by']);
				}
				
				if(isset($data['user_roles_id'])){
					$this->db->where('Users.user_roles_id', $data['user_roles_id']);
				}
				
				$query		= $this->db->get();
				
				if($query->num_rows() > 0){
					$result = $query->result_array();
				}
			}
			return $result;
		}
		
		//user_personal_details
		function delete_tbl_users($data){
			$result 	= false;
			if(count($data) > 0){			
				$this->db->delete('tbl_users', $data);			
				
				if($this->db->affected_rows() > 0){
					$result 	= true;
				}
			}
			return $result;
		}
		
		function delete_user_personal_details($data){
			$result 	= false;
			if(count($data) > 0){			
				$this->db->delete('user_personal_details', $data);			
				
				if($this->db->affected_rows() > 0){
					$result 	= true;
				}
			}
			return $result;
		}
		
		function insert_user_personal_details($data){
			$result = array();
			if(count($data) > 0){			
				$this->db->insert('user_personal_details', $data);			
				
				if($this->db->affected_rows() > 0){
					$id 		= $this->db->insert_id();
					$data['id'] = $id;
					$result 	= $data;
				}
			}
			return $result;
		}
		
		function update_user_personal_details($data, $condition){
			$result = array();
			if(count($data) > 0){			
				if(isset($condition['id'])){
					$this->db->where('id', $condition['id']);
				}
				
				if(isset($condition['tbl_users_id'])){
					$this->db->where('tbl_users_id', $condition['tbl_users_id']);
				}
				
				if(isset($condition['status'])){
					$this->db->where('status', $condition['status']);
				}
				
				$this->db->update('user_personal_details', $data);
				//echo "<pre>";print_r($this->db->last_query());echo "</pre>";
				if($this->db->affected_rows() > 0){
					$result = true;
				}
			}
			return $result;
		}
		
		function get_user_personal_details($data){
			$result = array();
			if(count($data) > 0){
				$this->db->select('Personal.*');
				$this->db->from('user_personal_details as Personal');
				
				if(isset($data['status'])){
					$this->db->where('Personal.status', $data['status']);
				}
				
				if(isset($data['id'])){
					$this->db->where('Personal.id', $data['id']);
				}
				
				if(isset($data['tbl_users_id'])){
					$this->db->where('Personal.tbl_users_id', $data['tbl_users_id']);
				}
				
				if(isset($data['created_by'])){
					$this->db->where('Personal.created_by', $data['created_by']);
				}
				
				$query		= $this->db->get();
				
				if($query->num_rows() > 0){
					$result = $query->result_array();
				}
			}
			return $result;
		}
		
		function get_user_roles($data){
			$result = array();
			if(count($data) > 0){
				$this->db->select('*');
				$this->db->from('user_roles');
				
				if(isset($data['status'])){
					$this->db->where('Personal.status', $data['status']);
				}
				
				if(isset($data['id'])){
					$this->db->where('Personal.id', $data['id']);
				}
				$query		= $this->db->get();
				
				if($query->num_rows() > 0){
					$result = $query->result_array();
				}
			}
			return $result;
		}
		
		
	}		