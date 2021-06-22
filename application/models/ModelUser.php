<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function get($id = null)
    {

        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function ubahProfil($data, $where)
    {
        $this->db->where($where);
        $this->db->update('user', $data);
        return TRUE;
    }


    public function totalUser()
    {
        $this->db->count_all('user');
        $this->db->from('user');

        return $this->db->get()->num_rows('user');
    }
}
