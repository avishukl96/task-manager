<?php
class Task_manager extends CI_Controller {
		
		  public function __construct()
        {
                parent::__construct();
                
				$this->load->model('my_task_manager');
        }
		
        public function index()
        {
                $this->template->load('template', 'home');
        }
		
		 public function my_tasks()
        {
			$data['pending_tasks'] = $this->my_task_manager->tasks('pending');
			$data['in_progress_tasks'] = $this->my_task_manager->tasks('inprogress');
			$data['complated_tasks'] = $this->my_task_manager->tasks('complated');
			
                $this->template->load('template', 'task-manager',$data);
        }
		public function add_task()
        {		$session = $this->session->userdata();
                $data['title'] = $this->input->post('task');
                $data['status'] = $this->input->post('status');
				$data['user_id'] = $session['users']['id']; 
				$this->db->insert('task-manager',$data);
				$data['task_id'] = $this->db->insert_id();
				echo json_encode($data);
        }
		
		public function update_task()
        {		//$session = $this->session->userdata();
                $data['title'] = $this->input->post('task');
                $data['status'] = $this->input->post('status');
				//$data['user_id'] = $session['users']['id']; 
				$this->db->where('id',$this->input->post('task_id'));
				$this->db->update('task-manager',$data);
				$data['task_id'] = $this->input->post('task_id');
				echo json_encode($data);
        }
		
		public function delete_task()
        {		 
                
				$this->db->where('id',$this->input->post('delete_task_id'));
				$this->db->delete('task-manager');
				$data['delete_task_id'] = $this->input->post('delete_task_id');
				echo json_encode($data);
        }
}

?>