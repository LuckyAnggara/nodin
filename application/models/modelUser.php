<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    function getDataUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        return $this->db->get()->row_array();
    }

    function getData($user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $user);
        return $this->db->get()->row_array();
    }



    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}