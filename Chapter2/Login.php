<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (($this->session->userdata('login'))) {
			redirect('Admin');
		}
		$this->form_validation->set_rules('uname', 'Uname', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login');
		} else {
			$this->_process();
		}
	}

	private function _process()
	{
		$uname = $this->input->post('uname');
		$pass = $this->input->post('password');
		$admin = $this->db->get_where('users', ['uname' => $uname])->row_array();
		if ($admin) {
			if (md5($pass) == $admin['pass']) {
				if ($admin['roles'] == '0') {
					$data = [
						'id' => $admin['id'],
						'n_user' => $admin['n_user'],
						'uname' => $admin['username'],
						'roles' => $admin['roles'],
						'login' => 'ok'
					];
					$this->session->set_userdata($data);
					redirect('Admin');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center"> User yang terdaftar bukan admin!</div>');
					redirect('Login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center"> Kata sandi salah!</div>');
				redirect('Login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Admin belum terdaftar!</div>');
			redirect('Login');
		}
	}

	public function registrasi()
	{
		$this->load->view('admin/registrasi');
	}
}
