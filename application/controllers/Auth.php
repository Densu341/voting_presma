<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('name')) {
			redirect('committee');
		}
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi success
			$this->_login();
		}
	}

	private function _login()
	{
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['name' => $name])->row_array();

		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'name' => $user['name'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						redirect('committee');
					} else if ($user['role_id'] == 3) {
						redirect('voting');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		if ($this->session->userdata('name')) {
			redirect('committee');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]',
			[
				'is_unique' => 'This email has already registered!'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[8]|matches[password2]',
			[
				'matches' => 'Password dont match!',
				'min_length' => 'Password to short!',
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'image' => 'default.svg',
				'password' => password_hash(
					$this->input->post('password1'),
					PASSWORD_DEFAULT
				),
				'role_id' => 3,
				'is_active' => 0,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			// $this->_sendEmail();

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your acount has ben created. Please login</div>');
			redirect('auth');
		}
	}

	// private function _sendEmail()
	// {
	// 	$config = [
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_user' => 'dedendev341@gmail.com',
	// 		'smtp_pass' => 'dedendev341',
	// 		'smtp_port' => 465,
	// 		'mailtype' => 'html',
	// 		'charset' => 'utf-8',
	// 		'newline' => "\r \n"
	// 	];

	// 	$this->load->library('email', $config);

	// 	$this->email->from('dedendev341@gmail.com', 'Web Voting Presma');
	// 	$this->email->to('denyirawan341@gmail.com');
	// 	$this->email->subject('Testing');
	// 	$this->email->message('Hello World!');

	// 	if ($this->email->send()) {
	// 		return true;
	// 	} else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
	// }

	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Access Blocked!';
		$this->load->view('auth/blocked', $data);
	}
}
