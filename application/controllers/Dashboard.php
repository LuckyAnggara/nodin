<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Templates/topbar.php');
		$this->load->view('Templates/header.php');
		$this->load->view('Templates/rightbar.php');
		$this->load->view('Templates/footer.php');
	}
}
