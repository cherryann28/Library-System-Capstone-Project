<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('User');
	}

	public function index()
	{
		if(!empty($this->session->userdata('user_id')))
		{
			redirect('students');
		}
		$data['books_total'] = $this->User->count_all_books();
		$data['borrowed'] = $this->User->total_issued_books();
		$data['returned'] = $this->User->total_returned_books();
		$this->load->view('home', $data);
	}

	public function login()
	{
		$data['books_total'] = $this->User->count_all_books();
		$data['borrowed'] = $this->User->total_issued_books();
		$data['returned'] = $this->User->total_returned_books();
		$this->load->view('login', $data);
	}
	
	/*
		* DOCU: This function is to display create account [from the view file]
		* Owned by Cherry Ann Nepomuceno 
	*/
	public function create_account()
	{
		$data['books_total'] = $this->User->count_all_books();
		$data['borrowed'] = $this->User->total_issued_books();
		$data['returned'] = $this->User->total_returned_books();
		$this->load->view('create_account', $data);
	}

	/*
		* DOCU: This function is to validate and process the create account form, 
				if it is valid then it will save the data into database users 
				table else it will prompt an error message.
		* Owned by Cherry Ann
	*/
	public function process_create_account()
	{
		// var_dump($this->input->post());
		$result = $this->User->validate_create_account($this->input->post());
		if($result == 'valid')
		{
			$this->User->create_account($this->input->post());
			$success[] = "Welcome! Create account was successful!";
			$this->session->set_flashdata('success', $success);
			redirect('create_account');
		}
		else
		{
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('create_account');
		}
	}

	/*
		* DOCU: This function is to validate and process the login form, if it is 
				success then it will check if the user is an admin or a student 
		* Owned by Cherry Ann
	*/
	public function login_process()
	{
		$result = $this->User->validate_login($this->input->post());
		if($result != 'success')
		{
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('login');
		}
		else
		{
			$email = $this->input->post('email');
			$user = $this->User->get_users_by_email($email);
			$password = $this->input->post('password');

			$result = $this->User->validate_login_match($user, $password);

			if($result == 'success')
			{
				/* this is for if admin or user dashboard */     
				if($user['user_level'] == 'admin')
				{
					$this->session->set_userdata(
						array(
							'user_id'=> $user['id'], 
							'user_level'=> $user['user_level'],
							'name'=> $user['name'],
							));
					redirect('home');
				}
				else
				{
					$this->session->set_userdata(
						array(
							'user_id'=> $user['id'],
							'school_id'=> $user['school_id'], 
							'user_level'=> $user['user_level'],
							'name'=> $user['name'],
							));
					redirect('students');
					}	
			}
			else
			{
				$this->session->set_flashdata('invalid', 'Incorrect email/password');
				redirect('login');
			}
		}
	}

	public function student()
	{
		$this->load->view('student/index');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users');
	}

}
