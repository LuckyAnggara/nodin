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
        $this->load->library('upload');
    }

    public function Nota_Dinas()
    {
        $data['user'] = $this->modelUser->getDataUser('PHP');
        $this->load->view('Templates/topbar.php', $data);
        $this->load->view('Surat/Nota Dinas/index.php');
        $this->load->view('Templates/rightbar.php');
        $this->load->view('Templates/footer.php');
        $this->load->view('Surat/Nota Dinas/NotaDinasJs.php');
    }


    public function Nodin_Detail($id)
    {
        $data['user'] = $this->modelUser->getDataUser('PHP');
        $data['detail'] = $this->modelData->getDetailNodin($id);
        $cek = $this->modelData->isTujuan($data['detail']['id_no_surat'], $data['user']['id_user']);
        if ($cek == 1) {
            $data['comment'] = $this->getDataComment($data['detail']['comment']);
            $this->load->view('Templates/topbar.php', $data);
            $this->load->view('Surat/Nota Dinas/detail.php', $data);
            $this->load->view('Templates/rightbar.php');
            $this->load->view('Surat/Nota Dinas/DetailJs.php');
            $this->load->view('Templates/footer.php');
        } else {
            $this->load->view('Templates/topbar.php', $data);
            $this->load->view('Surat/Nota Dinas/index2.php');
            // $this->load->view('Surat/Nota Dinas/detail.php',$data);
            $this->load->view('Templates/rightbar.php');
            $this->load->view('Templates/footer.php');
            // $this->load->view('Surat/Nota Dinas/DetailJs.php');
        }
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
    function deleteLampiran()
    {
        $post = $this->input->post();
        $idSurat = $post['idSurat'];
        $this->modelData->deleteDataLampiran($idSurat);
    }
    function addComment()
    {
        $this->modelData->addDataComment();
    }
    function deleteComment()
    {
        $post = $this->input->post();
        $idComment = $post['idComment'];
        $this->modelData->deleteDataComment($idComment);
    }

    function getDataComment($data)
    {
        $comment = explode(",", $data);
        foreach ($comment as $key => $value) {
            $dataComment[] = $this->modelData->getComment($value);
        }
        return $dataComment;
    }

    function getDataComment2()
    {

        $id = $this->uri->segment('3');
        $data = $this->modelData->getDetailNodin($id);
        $dataComment = $this->modelData->getCommentv2($data['comment']);
        $dataComment = json_encode($dataComment);
        echo $dataComment;
    }

    function uploadLampiran($idSurat)
    {
        $config['upload_path'] = './assets/lampiran/surat/nodin/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = false; //nama yang terupload nantinya
        $config['overwrite'] = TRUE;
        $config['max_size'] = '6000';
        $new_name = $idSurat . '.pdf';
        $config['file_name'] = $new_name;

        $this->upload->initialize($config);
        if (!empty($_FILES['fileLampiran'])) {
            if ($this->upload->do_upload('fileLampiran')) {
                $gbr = $this->upload->data();
                $lampiran = $gbr['file_name']; //Mengambil file name dari gambar yang diupload
                $judul = $idSurat;
                $this->modelData->simpan_uploadLampiran($judul, $lampiran);
                redirect($this->uri->uri_string());
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->Nodin_Detail($idSurat);
            //echo $this->upload->display_errors();
        }
    }

    function getTujuan($id)
    {
        $id = $this->uri->segment('3');
        $data = $this->modelData->getDataTujuan($id);
        $tujuan = explode(",", $data['ke_nodin']);

        for ($i = 0; $i < count($tujuan); $i++) {
            $new_input['data'] = array(
                'no' => $i + 1,
                'tujuan' => $tujuan[$i],
                'status' => 'unread'
            );
            $dataTujuan[$i] = $new_input['data'];
        }

        $result = json_encode($dataTujuan);
        echo $result;
    }

    function sendData()
    { }
}