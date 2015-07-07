<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index()
	{
		$this->load->view('student_login_page');
	}

	public function register()
	{
			$this->load->library("Form_validation");
			$this->form_validation->set_rules("first_name", "First Name", "trim|required");
			$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
			$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
			$this->form_validation->set_rules("password", "Password", "trim|required|matches[confirm_password]|md5");
			$this->form_validation->set_rules("confirm_password", "Confirm_password", "trim|required");

			if($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata("registration_errors", validation_errors());
				redirect('/students/index');
			}
			else
			{
				$first_name = $this->input->post('first_name', TRUE);
				$last_name = $this->input->post('last_name', TRUE);
				$email = $this->input->post('email', TRUE);
				$password = md5($this->input->post('password', TRUE));
				// $encrypt = md5($password, TRUE);

				$user_details= array(
					"first_name" => $first_name,
					"last_name" => $last_name,
					"email" => $email,
					"password" => $password
					);
				$this->load->model("Student_model");
				$register_complete = $this->Student_model->add_user($user_details);
				if($register_complete == TRUE)
				{
					redirect('/');
				}
			}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = md5(md5($this->input->post('password', TRUE)));
		// $encrypt = md5($password);
		$this->load->model('Student_model');
		$user = $this->Student_model->get_user_by_email($email);


		if($user && $user['password'] == $password)
		{
			$user = array(
				'id' => $user['id'],
				'email' => $user['email'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'is_logged_in' => true
				);
			$this->session->set_userdata($user);
			redirect("/students/profile");
		}
		else
		{
			$this->session->set_flashdata("login_error", "Invalid email or password!");
			redirect("/students/index");
		}
	}

	public function profile()
	{
		if($this->session->userdata('is_logged_in') === TRUE)
		{
			$this->load->view('success');
			echo "You are now logged in! Click <a href='/students/logout'>Here</a> to Logout. ";
		}
		else
		{
			redirect("/students/login");
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/students/index");
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */