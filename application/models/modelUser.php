<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    function getDataUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id);
        return $this->db->get()->row_array();
    }
}