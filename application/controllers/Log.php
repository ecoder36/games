<?php
	class Log extends CI_Controller{

// Log in user
		public function login(){
			$data['title'] = 'Sign In';
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates/footer');
			} else {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				// Login user
			
				if($username == "a" && $password == md5("123")){
					// Create session
				//	die('SUCCESS');//for test
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in_1' => true
					);
					$this->session->set_userdata($user_data);//from ($user_data) you can access the array when ever you want
					// Set message
					$this->session->set_flashdata('sucess', 'You are now logged in');
					redirect('games/add');
				} else {
					// Set message
					$this->session->set_flashdata('danger', 'Login is invalid');
					redirect('log/login');
				}		
			}
		}//https://www.codeigniter.com/user_guide/libraries/sessions.html
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in_1');
		//	$this->session->unset_userdata('user_id');
		//	$this->session->unset_userdata('username');
			// Set message
			$this->session->set_flashdata('sucess', 'You are now logged out');
			redirect('log/login');
		}

}