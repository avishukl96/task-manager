<?php

    class User_accounts_m extends CI_Model {

         
		function register_account($data){
			
			
			$this->db->insert('users',$data);
			return true;
			
		}
		
		   
		function checkEmailExists($email){
			
			$this->db->where('email',$email);
			$data = $this->db->get('users')->Row();
			
			if($data){
				return true;
			}else{
				return false;
			}
			
		}
		
		function checkUsernameExists($username){
			
			$this->db->where('username',$username);
			$data = $this->db->get('users')->Row();
			
			if($data){
				return true;
			}else{
				return false;
			}
			
		}
		
		function login_account($data){
			
			
			$this->db->where('username',$data['username']);
			$this->db->where('password',$data['password']);
			$users = $this->db->get('users')->Row_array();
			//var_dump($users);die;
			if($users){
				return $users;
			}else{
				return false;
			}
			 
			
		}
        

}

?>