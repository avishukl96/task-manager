<?php
class Task_manager extends CI_Controller {
		
		  public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		
        public function index()
        {
                $this->template->load('template', 'home');
        }
}

?>