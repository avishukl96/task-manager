<?php
class User_account extends CI_Controller {
		
		  public function __construct()
        {
                parent::__construct();
                
				$this->load->model('user_accounts_m');
				 //$this->load->library(array('session'));
        }
		
        public function index()
        {
                $this->template->load('template', 'user_account');
        }
		
		public function register() {
			
				$data['username'] 	= 	$this->input->post('username');
                $data['name'] 		= 	$this->input->post('name');
                $data['email'] 		= 	$this->input->post('email');
                $data['password'] 	= 	$this->input->post('password');
                $data['active'] 	= 	1;
				if($this->user_accounts_m->checkUsernameExists($data['username'])){
						$response['success'] = false;
						$response['message'] = 'Username "'. $data['username'] .'" already Exists ';
						 
				}elseif($this->user_accounts_m->checkEmailExists($data['email'])){
						$response['success'] = false;
						$response['message'] =  $data['email'] .' already Exists ';
					 
				}elseif($this->user_accounts_m->register_account($data)){
						$response['email']=$this->input->post('email');
						$response['message'] = 'Registration Successfully done. ';
						$response['success'] = true;
						
				}else{
						$response['success'] = false;
						$response['message'] = 'Registration Failed ';
				} 
				 echo json_encode($response);
			}
		
		public function login() {
			 
				$data['username'] 	= 	$this->input->post('uname');
                $data['password'] 	= 	$this->input->post('psw');
				$users['users'] = $this->user_accounts_m->login_account($data);
			
				if($users['users']){
						$this->session->set_userdata($users);
						$response['message'] = 'Login Successfully. ';
						$response['success'] = true;
						
				}else{
						$response['success'] = false;
						$response['message'] = 'Username or Password is invalid. Please try again. ';
				} 
				echo json_encode($response);
			}
		   
		function logout(){
			 
			 $this->session->unset_userdata($this->session->userdata());
			 $this->session->unset_userdata($this->session->userdata('__ci_last_regenerate'));
			 $this->session->sess_destroy();
		   redirect(site_url('user_account'));
		}
		
	
}