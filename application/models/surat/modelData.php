<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelData extends CI_Model
{
    function get_all_data_nodin()
    {
        $this->datatables->select('id_nodin,nosurat_nodin,dari_nodin,ke_nodin,perihal_nodin,lampiran,tanggal_nodin,deleteStatus,date_created');
        $this->datatables->from('nodin');
        $this->datatables->where('deleteStatus',0);
        $this->datatables->add_column('lampiran', "<a data-toggle='tooltip' data-placement='left' title='Tooltip on left' href='../assets/lampiran/surat/nodin/$1'>$1</a>", 'lampiran');
        $this->datatables->add_column(
            'aksi',
            '<a href="./detailmasuk/$1"class="btn btn-icon waves-effect waves-light btn-primary btn-sm" ><i class="fa fa-mail-forward" data-toggle="tooltip" title="Hooray!"></i></a>' . " " .
                '<button type="button" class="btn btn-icon waves-effect waves-light btn-success btn-sm" onclick="viewData($1)" ><i class="fa fa-search" ></i></button>' . " " . '<button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" onclick="warningDelete($1)" ><i class="fa fa-trash" ></i></button>',
            'id_nodin'
        );
        return $this->datatables->generate();
    }

     function get_all_data_tujuan($namaTujuan)
    {
        $this->db->select('nama');
        $this->db->from('tujuanintern');
        $this->db->like('nama',$namaTujuan);
        return $this->db->get()->result_array();
    }

    public function addDataNodin()
    {
        $nomor = $this->cekLastNodin();
        $noSurat = $nomor['nosurat_nodin'] + 1;
        $post = $this->input->post();
        $keNodin = implode(', ', $post['tujuan']);
        $data = [
            'nosurat_nodin' => $noSurat,
            'dari_nodin' => $post["asal"],
            'ke_nodin' => $keNodin,
            'perihal_nodin' => $post["perihal"],
            'tanggal_nodin' => $post["tanggalNodin"],
            'date_created' => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('nodin', $data);
    }

    public function editDataNodin()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $keNodin = implode(', ', $post['tujuan']);
        $data = [
            'dari_nodin' => $post["asal"],
            'ke_nodin' => $keNodin,
            'perihal_nodin' => $post["perihal"],
            'tanggal_nodin' => $post["tanggalNodin"],
            'date_created' => date("Y-m-d H:i:s"),
        ];
        $this->db->where('id_nodin', $id);
        $this->db->update('nodin', $data);
    }

    public function cekLastNodin()
    {
        $this->db->select('nosurat_nodin');
        $this->db->from('nodin');
        $this->db->order_by('nosurat_nodin', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }



    private function _lampiranNodin()
    {
        $image_path = './assets/lampiran/surat/nodin';
        $namaFile = $this->input->post('noSurat');
        $config['upload_path']          = $image_path;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 0;
        $config['overwrite'] = true;
        $config['file_name'] = $namaFile;

        $this->load->library('upload', $config);
        $upload_lampiran = $_FILES['lampiran'];

        if ($this->upload->do_upload('lampiran')) {
            $file = $this->upload->data('file_name');
            return $file;
        } else {
            echo $this->upload->display_errors();
            return "";
        }
    }

    public function deleteData($id) // hanya merubah status akses delete full data di admin
    {
        $this->db->set('deleteStatus', 1);
        $this->db->where('id_nodin', $id);
        $this->db->update('nodin');
    }

    function get_data_nodin($id)
    {
        $this->db->select('*');
        $this->db->where('id_nodin', $id);
        return $this->db->get('nodin')->row_array();
    }
}
