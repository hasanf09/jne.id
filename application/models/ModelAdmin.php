<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
    public function hapusAdmin($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->delete('user');
    }
    public function hapusUser($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->delete('user');
    }
    public function hapusSlider($id)
    {
        $this->db->where('id_slider', $id);
        $query = $this->db->delete('slider');
    }

    public function hapusBerita($id)
    {
        $this->db->where('id_berita', $id);
        $query = $this->db->delete('berita');
    }

    public function hapusInfo($id)
    {
        $this->db->where('id_info', $id);
        $query = $this->db->delete('info');
    }


    public function hapusKurir($id)
    {
        $this->db->where('id_kurir', $id);
        $query = $this->db->delete('kurir');
    }

    public function updateInfo($data = null, $where = null)
    {
        $this->db->update('info', $data, $where);
    }

    public function totalKurir()
    {
        $this->db->count_all('kurir');
        $this->db->from('kurir');

        return $this->db->get()->num_rows('kurir');
    }
}
