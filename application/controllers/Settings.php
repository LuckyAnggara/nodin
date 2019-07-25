<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->library('datatables');
    }
    public function index()
    {
        $this->load->view('Templates/topbar.php');
        $this->load->view('Settings/index.php');
        $this->load->view('Templates/rightbar.php');
        $this->load->view('Templates/footer.php');
        $this->load->view('Settings/settingsJs.php');
    }
}
