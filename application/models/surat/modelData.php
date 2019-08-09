<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelData extends CI_Model
{
    function get_all_data_nodin()
    {
        $this->datatables->select('id_nodin,nosurat_nodin,dari_nodin,ke_nodin,perihal_nodin,lampiran,tanggal_nodin,deleteStatus,date_created');
        $this->datatables->from('nodin');
        $this->datatables->where('deleteStatus',0);
        $this->datatables->add_column(
            'aksi',
            '<a href="../Surat/nodin_detail/$1"class="btn btn-icon waves-effect waves-light btn-primary btn-sm" ><i class="fa fa-mail-forward" data-toggle="tooltip" title="Hooray!"></i></a>' . " " .
                '<button type="button" class="btn btn-icon waves-effect waves-light btn-success btn-sm" onclick="viewData($1)" ><i class="fa fa-search" ></i></button>' . " " . '<button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" onclick="warningDelete($1)" ><i class="fa fa-trash" ></i></button>',
            'id_nodin'
        );
        return $this->datatables->generate();
    }

    function getDetailNodin($id)
    {
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('id_no_surat',$id);
        $data = $this->db->get()->row_array();
        $this->db->select('*');
        $this->db->from('nodin');
        $this->db->where('nosurat_nodin',$id);
        $dataNodin = $this->db->get()->row_array();
        if($data['id_no_surat'] == null){
            if(!$dataNodin['nosurat_nodin'] == null){
            $this->_injectDetail($id);
            $this->db->select('*');
            $this->db->from('detail');
            $this->db->where('id_no_surat',$id);
            return $this->db->get()->row_array();
            }else{

                return null;

            }
        }else{
        return $data;
        }
    }

    private function _injectDetail($id)
    {
        $data = [
            'id_no_surat' => $id,
        ];
        $this->db->insert('detail', $data);
    }
    function addDataComment()
    {
        $post = $this->input->post();
        $data = [
            'user' => $post["user"],
            'isi' => $post["comment"],
            'date_created' => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('comment', $data);
        $idSurat = $post["idSurat"];
        $idComment = $this->cekLastComment()['id_comment'];
        $this->pushCommentSurat($idSurat,$idComment);

    }
    public function cekLastComment()
    {
        $this->db->select('id_comment');
        $this->db->from('comment');
        $this->db->order_by('id_comment', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    function pushCommentSurat($idSurat,$idComment)
    {
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->where('id_no_surat', $idSurat);

        $data = $this->db->get()->row_array();

        $comment = $data['comment'];

        $dataUpdate = $comment.','.$idComment;

        $this->db->set('comment',$dataUpdate);
        $this->db->where('id_no_surat', $idSurat);
        $this->db->update('detail');

    }

    function getCommentv2($idComment)
    {

        // $this->datatables->select('comment.id_comment, comment.user, comment.isi, comment.date_created as tanggal, user.image,user.nama_user');
        // $this->datatables->from('comment');
        // $this->datatables->join('user', 'user.id_user = comment.user');
        // $where_in = $idComment;
        // $this->datatables->where_in('id_comment',explode(',',$where_in) );

        // return $this->datatables->generate();

        $this->db->select('comment.id_comment, comment.user, comment.isi, comment.date_created as tanggal, user.image,user.nama_user');
        $this->db->from('comment');
        $this->db->join('user', 'user.id_user = comment.user');
        $this->db->where('deleteStatus',0);
        $where_in = $idComment;
        $this->db->where_in('id_comment',explode(',',$where_in) );
        $this->db->order_by('id_comment', 'DESC');
        return $this->db->get()->result_array();


        
    }

    function getComment($id)
    {

        // $this->datatables->select('comment.id_comment, comment.user, comment.isi, comment.date_created as tanggal, user.image,user.nama_user');
        // $this->datatables->from('comment');
        // $this->datatables->join('user', 'user.id_user = comment.user');
        // $this->db->where('id_comment',$id);
        // return $this->datatables->generate();
        $this->db->select('comment.id_comment, comment.user, comment.isi, comment.date_created as tanggal, user.image,user.nama_user');
        $this->db->from('comment');
        $this->db->join('user', 'user.id_user = comment.user');
        $this->db->where('id_comment',$id);
        return $this->db->get()->row_array();
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

    public function deleteDataComment($idComment)
    {
        $this->db->set('deleteStatus', 1);
        $this->db->where('id_comment', $idComment);
        $this->db->update('comment');  
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

    public function deleteDataLampiran($idSurat)
    {
        $this->db->set('lampiran',"");
        $this->db->where('id_no_surat', $idSurat);
        $this->db->update('detail');
    }

    public function isTujuan($id,$user)
    {
        $this->db->select('*');
        $this->db->where('id_nodin', $id);
        $data = $this->db->get('nodin')->row_array();
        if($data['dari_nodin'] == $user)
        {
            return "1";
        }else{
            return "0";
        }
    }

    function simpan_uploadLampiran($id,$lampiran){
        $this->db->set('lampiran',$lampiran);
        $this->db->where('id_no_surat', $id);
        $this->db->update('detail');
    }
}
