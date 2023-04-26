<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("M_Auth");
	}

	public function index()
	{
		$config1 = array(
			array(
				'field' => 'n_user',
				'label' => 'nama',
				'rules' => 'required'
			), array(
				'field' => 'uname',
				'label' => 'username',
				'rules' => 'required|min_length[5]|alpha_numeric|is_unique[users.uname]'
			), array(
				'field' => 'pass',
				'label' => 'password',
				'rules' => 'required|min_length[5]|alpha_numeric'
			), array(
				'field' => 'no_hp',
				'label' => 'No Telp',
				'rules' => 'numeric|max_length[14]'
			), array(
				'field' => 'tgl_lahir',
				'label' => 'Tanggal lahir',
				'rules' => 'required'
			)
		);

		$config2 = array(
			array(
				'field' => 'u_name',
				'label' => 'username',
				'rules' => 'required'
			), array(
				'field' => 'u_pass',
				'label' => 'password',
				'rules' => 'required'
			),
		);
		$data['login'] = 'no';
		$data['id'] = $this->session->userdata('id');
		$data['namanya'] = $this->session->userdata('n_user');
		$data['header'] = 'templates/header';
		$data['content'] = 'templates/main';
		$data['footer'] = 'templates/footer';

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi.');
		$this->form_validation->set_message('is_unique', '%s telah digunakan.');
		$this->form_validation->set_message('numeric', 'field %s hanya menggunakan angka');
		$this->form_validation->set_message('max_length', 'field %s tidak boleh lebih dari 14 karakter.');
		$this->form_validation->set_message('alpha_numeric', 'field %s tidak boleh menggunakan karakter unik.');
		$this->form_validation->set_message('min_length', 'field %s tidak boleh kurang dari 5 karakter.');

		if ($this->input->post('btn') == "submit") {
			$this->form_validation->set_rules($config1);
			if ($this->form_validation->run() == false) {

				$this->load->view('templates/index', $data);
			} else {
				$this->regis();
			}
		} elseif ($this->input->post('btn2') == "submit") {
			$this->form_validation->set_rules($config2);
			if ($this->form_validation->run() == false) {
				$this->load->view('templates/index', $data);
			} else {
				$this->auth();
			}
		} else {
			$this->load->view('templates/index', $data);
		}
	}

	public function regis()
	{
		$n_user = $this->input->post("n_user");
		$uname = $this->input->post("uname");
		$pass = md5($this->input->post("pass"));
		$no_hp = $this->input->post("no_hp");
		$tgl_lahir = $this->input->post("tgl_lahir");
		$unit = $this->input->post("unit");
		// echo "Namanya :" . $n_user .  " unamenya : " . $uname . " passnya: " . $pass . " Unitnya : " . $unit;
		$data_insert = array(
			"uname" => $uname,
			"pass" => $pass,
			"n_user" => $n_user,
			"no_hp" => $no_hp,
			"tgl_lahir" => $tgl_lahir,
			"unit" => $unit
		);
		if ($this->input->post('btn') == "submit") {
			$res = $this->M_Auth->InsertData('users', $data_insert);

			if ($res >= 1) {
				echo "<script> window.location.href = '" . base_url() . "Main';</script>";
			} else {
				echo "Insert data gagal";
			}
		}
	}

	public function auth()
	{
		$uname = $this->input->post('u_name');
		$pass = $this->input->post('u_pass');
		$user = $this->db->get_where('users', ['uname' => $uname])->row_array();
		if ($user) {
			if (md5($pass) == $user['pass']) {
				$data = [
					'id' => $user['id'],
					'n_user' => $user['n_user'],
					'uname' => $user['username'],
					'roles' => $user['roles'],
					'login' => 'ok'
				];
				$this->session->set_userdata($data);
				redirect('User');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center"> Kata sandi salah!</div>');
				redirect('Main');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">User belum terdaftar!</div>');
			redirect('Main');
		}
	}
}
