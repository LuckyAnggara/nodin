<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->library('datatables');
        $this->load->model('surat/modelData');
        $this->load->library('form_validation');
    }

    public function Nota_Dinas()
    {
        $this->load->view('Templates/topbar.php');
        $this->load->view('Surat/Nota Dinas/index.php');
        $this->load->view('Templates/rightbar.php');
        $this->load->view('Templates/footer.php');
        $this->load->view('Surat/Nota Dinas/NotaDinasJs.php');
    }

    public function Nodin_Detail($id)
    {
        $data['detail'] = $this->modelData->getDetailNodin($id);
        $data['comment'] = $this->getDataComment($data['detail']['comment']);        
        $this->load->view('Templates/topbar.php');
        $this->load->view('Surat/Nota Dinas/detail.php',$data);
        $this->load->view('Templates/rightbar.php');
        $this->load->view('Templates/footer.php');
        $this->load->view('Surat/Nota Dinas/NotaDinasJs.php');
    }


    function getDataMasuk()
    {
        echo $this->modelData->get_all_data_nodin();
    }

    public function addNodin()
    {
        $this->modelData->addDataNodin();
    }

    public function editNodin()
    {

        $this->modelData->editDataNodin();
    }

    public function viewDetailNodin($id)
    {
        // print_r($this->modelData->get_data_nodin($id));
       $data = $this->modelData->get_data_nodin($id);
       echo json_encode($data);

    }

    function getNoNodin()
    {

        $data = $this->modelData->cekLastNodin();
        echo json_encode($data);
    }

    public function deleteNodin($id)
    {
        if (empty($id)) {
            redirect('Surat/Nota_Dinas');
        } else {

            $this->modelData->deleteData($id); // tambah data siswa
            redirect('Surat/Nota_Dinas');
        }
    }

    function getDataTujuan()
    {
        $namaTujuan = $this->input->post('nama');
        $data = $this->modelData->get_all_data_tujuan($namaTujuan);
        echo json_encode($data);
        
    }

    function getDataComment($data)
    {
        $comment = explode(",", $data);
        foreach ($comment as $key => $value) {
            $dataComment[] = $this->modelData->getComment($value);
        }
        return $dataComment;
    }

    function getDataComment2($data)
    {
        $comment = explode("_", $data);
        foreach ($comment as $key => $value) {
            $dataComment[] = $this->modelData->getComment($value);
        }
echo "<pre>";
print_r($dataComment);
echo "</pre>";
        
    }
    
}
