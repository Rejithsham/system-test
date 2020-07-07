<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('users_model');
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->perPage = 10;
	}

        public function index(){
            if($this->session->userdata('logged_in')){
                $data = array();
                $session_data = $this->session->userdata('logged_in');
                if($session_data['user_roles_id'] == $this->config->item('admin')){
                    
                    $condition                  = array();
                    $condition['user_roles_id'] = $this->config->item('user');
                    $data['users']              = $this->users_model->get_tbl_users($condition);
                    $data['title']  = 'Admin Dashboard';
                    $this->load->view('admin_dashboard',$data);
                } else {
                    $data['title']  = 'User Dashboard';
                    $this->load->view('Dashboard',$data);
                }
            } else {
                $data['error']='<div class="alert alert-danger">Session Expired Please Login!</div>';
                redirect(base_url(),$data);
            }
                
        }
        
        public function users_list(){
            if($this->session->userdata('logged_in')){
                 $data = array();
                    $session_data = $this->session->userdata('logged_in');
                if($session_data['user_roles_id'] == $this->config->item('admin')){
                    $condition                  = array();
                    $condition['user_roles_id'] = $this->config->item('user');
                    $data['users']              = $this->users_model->get_tbl_users($condition);
                     
                   
                    $this->load->view('users_list',$data);
                }
            } else {
                $data['error']='<div class="alert alert-danger">Session Expired Please Login!</div>';
                redirect(base_url(),$data);
            }
                
        }
        function approve(){
        $result = array();
            if(($this->input->method() == 'post') AND !empty($this->input->post())){
				$id	        =	$this->input->post('id');
				
				$this->form_validation->set_rules('id','id','trim|required');
				
				if($this->form_validation->run()){
					$condition              = array();
					$condition['id']        = $id;
					$result_get             = $this->users_model->get_tbl_users($condition);
					if(count($result_get) > 0){
                        $data = array();
                        if($result_get[0]['status'] == '1'){
                        $data['status'] = '0';
                        } else {
                        $data['status'] = '1';
                        }
                        
                        $data['modified_by'] 	= $this->session->userdata('logged_in')['id'];
                        $data['modified_date'] 	= date('Y-m-d H:i:s');
                        $update                 = $this->users_model->update_tbl_users($data,$condition);
                        if($update){
                            $result = array('status'=>'success','message'=>' Success');
                        } else {
                            $result = array('status'=>'error','message'=>'failed update');
                        }
					} else {
						 $result = array('status'=>'error','message'=>'failed data');
					}
				} else {
					 $result = array('status'=>'error','message'=>'failed run');
				}
			}
            echo json_encode($result);
            exit;
        }
        
        function delete(){
        $result = array();
            if(($this->input->method() == 'post') AND !empty($this->input->post())){
				$id	        =	$this->input->post('id');
				
				$this->form_validation->set_rules('id','id','trim|required');
				
				if($this->form_validation->run()){
					$condition              = array();
					$condition['id']        = $id;
					$result_get             = $this->users_model->get_tbl_users($condition);
					if(count($result_get) > 0){
                       
                        $update                 = $this->users_model->delete_tbl_users($condition);
                        $update_1                 = $this->users_model->delete_user_personal_details($condition);
                        if($update && $update_1){
                            $result = array('status'=>'success','message'=>' Success');
                        } else {
                            $result = array('status'=>'error','message'=>'failed update');
                        }
					} else {
						 $result = array('status'=>'error','message'=>'failed data');
					}
				} else {
					 $result = array('status'=>'error','message'=>'failed run');
				}
			}
            echo json_encode($result);
            exit;
        }
        
        function update_user(){
                $result = array();
			if(($this->input->method() == 'post') AND !empty($this->input->post())){
				$fullname	=	$this->input->post('fullname');
				$email		=	$this->input->post('email');
				$address	=	$this->input->post('address');
				$filename	= $_FILES['image']['name'];
				$this->form_validation->set_rules('email','EmailId','trim|required|valid_email');
				$this->form_validation->set_rules('fullname', 'Enter the fullname','trim|required');
				
				$this->form_validation->set_rules('address', 'Enter the password','trim|required');
				if($this->form_validation->run()){
                    $session = $this->session->userdata('logged_in');
					$condition              = array();
					$condition['email']     = $email;
					$result_get             = $this->users_model->get_tbl_users($condition);
					if(count($result_get) > 0){
                        $condition              = array();
                        $condition['id']        = $session['id'];
                        
						$data 					= array();
						$data['email']      	= $email;
						$data['modified_by'] 	= $session['id'];
                        $data['modified_date'] 	= date('Y-m-d H:i:s');
						$result_insert          = $this->users_model->update_tbl_users($data,$condition);
                        
                        $condition              = array();
                        $condition['tbl_users_id']        = $session['id'];
						$personal               = array();
                        
                if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
                
                
                        if(!is_dir(FCPATH .$this->config->item('assets_upload_path').$session['id'].'/'.$this->config->item('profile_img_folder').'/')) {
                            mkdir(FCPATH .$this->config->item('assets_upload_path').$session['id'].'/'.$this->config->item('profile_img_folder').'/', 0777, true);
                        }
                                //$tmp								= $_FILES['file']['tmp_name'];
                                $ext								= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                                $time_st							= time();
                                $dst								= FCPATH.$this->config->item('assets_upload_path').$session['id'].'/'.$this->config->item('profile_img_folder').'/';
                                $pro_img							= array();
                                $pro_img['upload_path']         	= $dst;
                                $pro_img['allowed_types']        	= implode('|', $this->config->item('image_file_types'));
                                $pro_img['max_size']             	= $this->config->item('file_upload_size');
                                $pro_img['file_name'] 		 	 	= "profile_".$session['id'].'_'.$time_st.'.'.$ext;			
                                $this->load->library('upload', $pro_img);
                                if($this->upload->do_upload('image')){
                                    $personal['img_name']				= 'profile_'.$session['id'].'_'.$time_st.'.'.$ext;
                                    $personal['img_path']				= $session['id'].'/'.$this->config->item('profile_img_folder').'/';
                                }
                }
                                $personal['fullname']       = $fullname;
                                $personal['address']       = $address;
                                $personal['modified_by'] 	= $session['id'];
                                $personal['modified_date'] 	= date('Y-m-d H:i:s');
                                //print_r($personal);
                                $result_insert_1              = $this->users_model->update_user_personal_details($personal,$condition);
                            
                            if($result_insert && $result_insert_1){
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
        
}