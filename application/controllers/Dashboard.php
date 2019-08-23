<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$user = $this->session->userdata('id_user');
		$data['user'] = $this->modelUser->getDataUser($user);
		$this->load->view('Templates/topbar.php', $data);
		$this->load->view('Templates/rightbar.php');
		$this->load->view('Templates/footer.php');
		$this->load->view('Dashboard/js.php');
	}
}