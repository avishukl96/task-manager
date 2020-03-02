<?php

    class My_task_manager extends CI_Model {

         
		function tasks($status){
			
			
			$this->db->where('status',$status);
			return $this->db->get('task-manager')->result_array();
			 
			
		}
		
		   
		

}

?>