<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('surat/modelData');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('status') == 'login') {
                redirect(base_url('Dashboard'));
            } else {
                $this->load->view('login/index.php');
            }
        } else {
            $this->aksi_login();
        }
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->modelUser->cek_login('user', $where)->num_rows();

        if ($cek > 0) {
            $cek2 = $this->modelUser->getData($username);
            $data_session = array(
                'id_user' => $cek2['id_user'],
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("Dashboard"));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User dan Password Salah!!</div>');
            redirect(base_url('login')); // jika akun sedang login
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}