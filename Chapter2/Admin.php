<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('login'))) {
			redirect('Login');
		} else if ($this->session->userdata('roles') != '0') {
			$this->session->unset_userdata('n_users');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('roles');
			$this->session->set_userdata('id', NULL);
			$this->session->unset_userdata('login');
			redirect('Main');
		}
		$this->load->model('M_Admin');
		$this->id  =  $this->session->userdata('id');
	}

	public function index()
	{
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['namanya'] = $this->session->userdata('n_user');
		$data['t_pinjaman'] = $this->M_Admin->countPinjaman();
		$data['t_simpanan'] = $this->M_Admin->countSimpanan();
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/main';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function Simpanan()
	{
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['u_all'] = $this->M_Admin->getSimpananll()->result();
		$data['namanya'] = $this->session->userdata('n_user');
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/simpanan';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function Pinjaman()
	{
		$this->M_Admin->getData('tb_pinjaman')->result();
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['u_all'] = $this->M_Admin->getPinjamanAll()->result();
		//$data['u_all'] = $this->M_Admin->getUserAll()->result();
		$data['namanya'] = $this->session->userdata('n_user');
		// $data['nominal'] = $this->M_Admin->execute("SELECT nominal FROM tb_pinjaman")->row();
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/pinjaman';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function checklist()
	{
		$this->M_Admin->getData('tb_pinjaman')->result();
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['u_all'] = $this->M_Admin->getPinjamanAll1()->result();
		//$data['u_all'] = $this->M_Admin->getUserAll()->result();
		$data['namanya'] = $this->session->userdata('n_user');
		// $data['nominal'] = $this->M_Admin->execute("SELECT nominal FROM tb_pinjaman")->row();
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/checklist';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function ditolak()
	{
		$this->M_Admin->getData('tb_pinjaman')->result();
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['u_all'] = $this->M_Admin->getPinjamanAll2()->result();
		//$data['u_all'] = $this->M_Admin->getUserAll()->result();
		$data['namanya'] = $this->session->userdata('n_user');
		// $data['nominal'] = $this->M_Admin->execute("SELECT nominal FROM tb_pinjaman")->row();
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/tolak';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function acc($id)
	{
		$data_update = array('acc_1' => '1');
		$where = array('id_pinjaman' => $id);
		$res = $this->M_Admin->UpdateData('tb_pinjaman', $data_update, $where);

		if ($res >= 1) {
			redirect('Admin/checklist');
		}
	}

	public function tolak($id)
	{
		$data_update = array('acc_1' => '2');
		$where = array('id_pinjaman' => $id);
		$res = $this->M_Admin->UpdateData('tb_pinjaman', $data_update, $where);

		if ($res >= 1) {
			redirect('Admin/checklist');
		}
	}

	public function update_pinjaman($id)
	{
		$waktu = $this->input->post("waktu");
		$kebutuhan = $this->input->post("kebutuhan");
		$jaminan = $this->input->post("jaminan");

		$data_update = array(
			"waktu" => $waktu,
			"kebutuhan" => $kebutuhan,
			"jaminan" => $jaminan
		);

		$where = array('id_pinjaman' => $id);

		if ($this->input->post('btn') == "submit") {
			$res = $this->M_Admin->UpdateData('tb_pinjaman', $data_update, $where);

			if ($res >= 1) {
				echo "<script> window.location.href = '" . base_url() . "Admin/Pinjaman';</script>";
			} else {
				echo "Insert data gagal";
			}
		}
	}

	public function delete_pinjaman($id)
	{
		$where = array('id' => $id);
		$res = $this->M_Admin->DeleteData('users', $where);

		if ($res >= 1) {
			redirect('Admin/Pinjaman');
		}
	}

	public function Anggota()
	{
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['u_all'] = $this->M_Admin->getUserAll()->result();
		$data['namanya'] = $this->session->userdata('n_user');
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/anggota';
		$data['footer'] = 'admin/footer';
		$this->load->view('admin/index', $data);
	}

	public function add_anggota()
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
			$res = $this->M_Admin->InsertData('users', $data_insert);

			if ($res >= 1) {
				echo "<script> window.location.href = '" . base_url() . "Admin/Anggota';</script>";
			} else {
				echo "Insert data gagal";
			}
		}
	}

	public function update_anggota($id)
	{
		$n_user = $this->input->post("n_user");
		$uname = $this->input->post("uname");
		$pass = $this->input->post("pass");
		$no_hp = $this->input->post("no_hp");
		$unit = $this->input->post("unit");

		$data_update = array(
			"uname" => $uname,
			"pass" => $pass,
			"n_user" => $n_user,
			"no_hp" => $no_hp,
			"unit" => $unit
		);

		$where = array('id' => $id);

		if ($this->input->post('btn') == "submit") {
			$res = $this->M_Admin->UpdateData('users', $data_update, $where);

			if ($res >= 1) {
				echo "<script> window.location.href = '" . base_url() . "Admin/Anggota';</script>";
			} else {
				echo "Insert data gagal";
			}
		}
	}

	public function delete_anggota($id)
	{
		$where = array('id' => $id);
		$data_update = array(
			"status" => 'off',
		);
		$res = $this->M_Admin->UpdateData('users', $data_update, $where);

		if ($res >= 1) {
			redirect('Admin/Anggota');
		}
	}

	public function Profile()
	{
		$data['u_log'] = $this->M_Admin->getUser($this->id);
		$data['namanya'] = $this->session->userdata('n_user');
		$data['header'] = 'admin/header';
		$data['sidebar'] = 'admin/sidebar';
		$data['navbar'] = 'admin/navbar';
		$data['content'] = 'admin/profile';
		$data['footer'] = 'admin/footer';

		$this->load->view('admin/index', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('n_users');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('roles');
		$this->session->unset_userdata('login');
		$this->session->set_userdata('id', NULL);

		$this->session->set_flashdata('message', '<div class="alert alert-success text-center"> Anda telah keluar</div');
		redirect('Login', 'refresh');
	}
}
