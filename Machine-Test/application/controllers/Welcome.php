<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model('users_model');
			$this->load->helper('url','form');
			$this->load->library('form_validation');
		}
		
		public function index(){
			if($this->session->userdata('logged_in')){
				redirect('dashboard');
			} else {
				//If no session, redirect to login page
				$data['title']      = 'Machine Test Login Screen';
				$this->load->view('welcome_message',$data);
			}
			
		}
		
		public function user_login_process() {
			if(($this->input->method() == 'post') AND !empty($this->input->post())){
				$username	=	$this->input->post('username');
				$password	=	$this->input->post('password');
				$this->form_validation->set_rules('username','username','trim|required|valid_email');
				$this->form_validation->set_rules('password', 'Enter the password','trim|required');
				if($this->form_validation->run()){
					$condition              = array();
					$condition['email']     = $username;
					$condition['login']     = md5(sha1($password));
					$condition['status']    = '1';
					$result_get             = $this->users_model->get_tbl_users($condition);
					if(count($result_get) > 0){
						$session_data  = $result_get[0];
						$this->session->set_userdata('logged_in', $session_data);
						redirect('dashboard');
					} else {
						$data['error']='<div class="alert alert-danger">Invalid Login Credentials</div>';
						$this->load->view('welcome_message',@$data);
					}
				} else {
					$data['error']='<div class="alert alert-danger">Invalid Login Credentials</div>';
					$this->load->view('welcome_message',@$data);
				}
			}
		}
		
		function new_user(){
			$result = array();
			if(($this->input->method() == 'post') AND !empty($this->input->post())){
				$fullname	=	$this->input->post('fullname');
				$email		=	$this->input->post('email');
				$login		=	$this->input->post('login');
				$address	=	$this->input->post('address');
				
				$this->form_validation->set_rules('email','EmailId','trim|required|valid_email');
				$this->form_validation->set_rules('fullname', 'Enter the fullname','trim|required');
				$this->form_validation->set_rules('login','Enter password','trim|required');
				$this->form_validation->set_rules('address', 'Enter the password','trim|required');
				if($this->form_validation->run()){
				
					$condition              = array();
					$condition['email']     = $email;
					$result_get             = $this->users_model->get_tbl_users($condition);
					if(count($result_get) > 0){
						$result = array('status'=>false,'message'=>'Email Already Exist');
					} else {
						$data 					= array();
						$data['email']      	= $email;
						$data['login']     	 	= md5(sha1($login));
						$data['login_id']       = 'USR'.rand(9999,999);
						$data['status']     	= '0';
						$data['user_roles_id']  =  $this->config->item('user');
						
						$personal               = array();
						$personal['fullname']   = $fullname;
						$personal['address']    = $address;
						$personal['status']     = '1';
						$result_insert          = $this->users_model->insert_details($data,$personal);
						if($result_insert){
							$result = array('status'=>'success','message'=>'Registerd Success');
						} else {
							$result = array('status'=>false,'message'=>'Network Error');
						}
					}
				} else {
				 $result = array('status'=>false,'message'=>'Validation Error');
				}
			}
			echo json_encode($result);
			exit;
		}
		
		// Logout from all page
		public function logout() {
			$this->session->sess_destroy();
			$data['error'] = '<div class="alert alert-success">Successfully Logout</div>';
			redirect(base_url(),$data);
			exit;
		}
		
	}
