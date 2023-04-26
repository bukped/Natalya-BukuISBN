<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('login'))) {
            redirect('Main');
        }
        $this->load->model('M_Auth');
        $this->id  =  $this->session->userdata('id');
    }

    public function index()
    {
        $data['u_log'] = $this->M_Auth->getUser($this->id);
        $data['u_history'] = $this->M_Auth->getSimpananUser($this->id)->result();
        $data['u_pinjaman'] = $this->M_Auth->getPinjamanUser($this->id)->result();
        $data['namanya'] = $this->session->userdata('n_user');
        $data['login'] = $this->session->userdata('login');
        $data['id'] = $this->session->userdata('id');
        $data['header'] = 'templates/header';
        $data['content'] = 'user/main';
        $data['footer'] = 'templates/footer';
        $this->load->view('templates/index', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('n_users');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('roles');
        $this->session->unset_userdata('login');
        $this->session->set_userdata('id', NULL);
        redirect('Main', 'refresh');
    }

    public function ajukan($id, $unit)
    {
        $nominal = $this->input->post("nominal");
        $margin = $nominal * 0.25;
        $cicilan = $this->input->post("cicilan");
        $waktu = $this->input->post("waktu");
        $kebutuhan = $this->input->post("kebutuhan");
        //$masa_kerja = $this->input->post("masa_kerja");
        $jaminan = $this->input->post("jaminan");
        $gambar = $this->input->post("gambar");
        // $tgl_pinjaman = $this->input->post("tgl_pinjaman");
        // $tgl_bts_pembayaran = $this->input->post("tgl_bts_pembayaran");
        // echo "Namanya :" . $n_user .  " unamenya : " . $uname . " passnya: " . $pass . " Unitnya : " . $unit;
        $data_insert = array(
            "id_user" => $id,
            "nominal" => $nominal,
            "margin" => $margin,
            "cicilan" => $cicilan,
            "waktu" => $waktu,
            //"masa_kerja" => $masa_kerja,
            "kebutuhan" => $kebutuhan,
            "jaminan" => $jaminan,
            "gambar" => $gambar
            // "tgl_pinjaman" => $tgl_pinjaman,
            // "tgl_bts_pembayaran" => $tgl_bts_pembayaran
        );

        if ($this->input->post('btn') == "submit") {
            // if ($tgl_pinjaman < date(Y - m - d)) {
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pengajuan Di tolak Karena Tanggal Tidak Sesuai</div>');
            //     echo "<script> window.location.href = '" . base_url() . "User';</script>";
            //     echo "Insert data gagal";
            if ($nominal < 1000000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pengajuan Di tolak Karena kurang dari minimal pinjaman</div>');
                echo "<script> window.location.href = '" . base_url() . "User';</script>";
                echo "Insert data gagal";
            } else if ($nominal > 10000000 && $unit = '28') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pengajuan Di tolak Karena melebihi batas Pinjaman</div>');
                echo "<script> window.location.href = '" . base_url() . "User';</script>";
                echo "Insert data gagal";
            } else if ($nominal > 5000000  && $unit != '28') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pengajuan Di tolak Karena melebihi batas Pinjaman</div>');
                echo "<script> window.location.href = '" . base_url() . "User';</script>";
            } else {
                $res = $this->M_Auth->InsertData('tb_pinjaman', $data_insert);
                if ($res >= 1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Sukses Ajukan Pinjaman</div>');
                    echo "<script> window.location.href = '" . base_url() . "User';</script>";
                }
            }
        }
    }

    public function simpan($id)
    {
        $nominal = $this->input->post("nominal");
        // echo "Namanya :" . $n_user .  " unamenya : " . $uname . " passnya: " . $pass . " Unitnya : " . $unit;
        $saldo = $this->db->get_where('users', ['id' => $id])->row_array();
        $data_insert = array(
            "id_user" => $id,
            "nominal" => $nominal
        );
        $total = $nominal + $saldo['saldo'];
        $data_update = array('saldo' => $total);
        $where = array('id' => $id);
        if ($this->input->post('btn') == "submit") {
            if ($nominal < 10000) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Simpanan Di tolak Karena kurang dari minimal simpanan</div>');
                echo "<script> window.location.href = '" . base_url() . "User';</script>";
            } else {
                $res = $this->M_Auth->InsertData('tb_simpanan', $data_insert);
                $res2 = $this->M_Auth->UpdateData('users', $data_update, $where);
                if ($res >= 1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Tabungan Sukses Diinput</div>');
                    echo "<script> window.location.href = '" . base_url() . "User';</script>";
                }
            }
        }
    }
}
