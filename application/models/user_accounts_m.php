<?php

    class User_accounts_m extends CI_Model {

         
		function register_account($data){
			
			$this->db->insert('users',$data);
			return true;
			
		}
		
		function login_account($data){
			
			
			$this->db->where('username',$data['username']);
			$this->db->where('password',$data['password']);
			$users = $this->db->get('users')->row();
			//var_dump($users);die;
			if($users){
				return $users;
			}else{
				return false;
			}
			 
			
		}
        

}

?>