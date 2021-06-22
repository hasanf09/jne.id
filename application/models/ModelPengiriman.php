<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPengiriman extends CI_Model
{
    public function joinPengiriman()
    {
        $this->db->select('pengiriman.id_booking, pengiriman.id_user, booking.kode_booking, booking.tanggal_booking,pengiriman.tanggal_konfirm,booking.no_resi,booking.status');
        $this->db->from('pengiriman');
        $this->db->join('booking', 'pengiriman.id_booking=booking.id_booking AND booking.id_user=pengiriman.id_user');

        return $this->db->get();
    }

    public function joinTanggalBooking()
    {
        $this->db->select('booking.tanggal_booking');
        $this->db->from('booking');
        $this->db->join('pengiriman', 'pengiriman.id_booking=booking.id_booking');

        return $this->db->get();
    }

    public function joinTracking()
    {
        $this->db->select('booking.id_booking, booking.no_resi, booking.status,booking.kota_asal,booking.kota_tujuan, pengiriman.tanggal_konfirm,pengirim.nama_pengirim, pengirim.nohp_pengirim, penerima.nama_penerima, penerima.nohp_penerima ');
        $this->db->from('booking');
        $this->db->join('pengiriman', 'booking.no_resi=pengiriman.no_resi');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima');

        return $this->db->get();
    }

    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }
}
