<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPickup extends CI_Model
{

    public function getDataPickup()
    {
        return $this->db->get('pickup');
    }

    public function dataKonfirmPickup()
    {
        $this->db->select('*');
        $this->db->from('pickup');
        $this->db->where('status="Menunggu Konfirmasi"');

        return $this->db->get();
    }

    public function hapusPickup($id)
    {
        $this->db->where('id_pickup', $id);
        $query = $this->db->delete('pickup');
    }

    public function joinPickup()
    {
        $this->db->select('pickup.id_pickup,pickup.id_user,pickup.nama,pickup.no_hp,pickup.alamat,pickup.status,pickup.tanggal_pickup,kurir.id_kurir,kurir.nama_kurir,kurir.nohp_kurir,kurir.kendaraan,kurir.jenis_kendaraan,kurir.nopol');
        $this->db->from('pickup');
        $this->db->join('kurir', 'pickup.id_kurir=kurir.id_kurir');

        return $this->db->get();
    }


    public function totalPickup()
    {
        $this->db->count_all('pickup');
        $this->db->from('pickup');

        return $this->db->get()->num_rows('pickup');
    }

    public function chartpickup($bulan)
    {
        $like = '2020-' . $bulan . date('-m');

        $this->db->count_all('pickup');
        $this->db->from('pickup');
        $this->db->where('status="Barang Sudah Diterima Kurir"');
        $this->db->like('tanggal_pickup', $like, 'after');

        return $this->db->get()->num_rows('pickup');
    }
}
