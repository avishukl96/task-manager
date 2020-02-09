<?php
class User_account extends CI_Controller {
		
		  public function __construct()
        {
                parent::__construct();
                
				$this->load->model('user_accounts_m');
				 $this->load->library(array('session'));
        }
		
        public function index()
        {
                $this->template->load('template', 'user_account');
        }
		
		public function register()
        {
			
				$data['username'] 	= 	$this->input->post('username');
                $data['name'] 		= 	$this->input->post('name');
                $data['email'] 		= 	$this->input->post('email');
                $data['password'] 	= 	$this->input->post('password');
                $data['active'] 	= 	1;
				 
				$this->user_accounts_m->register_account($data);
				 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Registration Successfully done </div>');
				redirect();
				
				
                 
        }
		
		public function login()
        {
			 
				$data['username'] 	= 	$this->input->post('uname');
                $data['password'] 		= 	$this->input->post('psw');
				$users = $this->user_accounts_m->login_account($data);
				if($users){
					$this->session->set_userdata($users);
					redirect();
				}else{
					 $this->template->load('template', 'user_account');
				}
                
        }
		
		 
		function logout(){
		   $this->session->sess_destroy();
		   redirect('login');
		}
}