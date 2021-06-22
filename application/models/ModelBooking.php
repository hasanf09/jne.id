<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBooking extends CI_Model
{

    public function get($id = null)
    {

        $this->db->from('booking');
        if ($id != null) {
            $this->db->where('booking_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // Get Data 

    public function getBooking($id)
    {
        return $this->db->get('booking', $id)->result_array();
    }

    public function getDataBooking()
    {
        return $this->db->get('booking');
    }

    public function dataKonfirmBooking()
    {
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->where('status="booking"');

        return $this->db->get();
    }


    public function getPengirim($id)
    {
        return $this->db->get('Pengirim', $id)->result_array();
    }

    public function getPenerima($id)
    {
        return $this->db->get('Penerima', $id)->result_array();
    }

    public function penerimaWhere($where)
    {
        return $this->db->get_where('penerima', $where);
    }

    public function pengirimWhere($where)
    {
        return $this->db->get_where('pengirim', $where);
    }

    public function getDataWhere($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function hapusBooking($id)
    {
        $this->db->where('id_booking', $id);
        $query = $this->db->delete('booking');
    }

    public function tampilBooking()
    {
        $this->db->select('booking.id_booking,booking.id_user,booking.kode_booking,booking.status,booking.no_resi, booking.tanggal_booking, pengirim.nama_pengirim, pengirim.nohp_pengirim, penerima.nama_penerima, penerima.nohp_penerima');
        $this->db->from('booking');
        $this->db->join('user', 'booking.id_user=user.id_user');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima');
        $this->db->order_by('id_booking', 'ASC');
        // $this->db->where('id_booking');

        return $this->db->get();
    }

    public function kodeBooking()
    {
        $this->db->select('booking.id_booking, booking.kode_booking, booking.kota_asal, booking.kota_tujuan,booking.isi_paket,booking.layanan, booking.ongkir, penerima.nama_penerima, pengirim.nama_pengirim');
        $this->db->from('booking');
        $this->db->join('user', 'booking.id_user=user.id_user');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim', 'user.id_user=pengirim.id_user');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima', 'user.id_user=pengirim.id_user');
        $this->db->order_by('id_booking', 'DESC');
        $this->db->limit('1');

        return $this->db->get();
    }

    public function cetak($where)
    {
        $this->db->select('booking.id_booking,booking.kode_booking,booking.berat, booking.no_resi, booking.isi_paket,booking.ongkir,booking.layanan');
        $this->db->from('booking');
        $this->db->join('user', 'booking.id_user=user.id_user');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima');
        $this->db->where($where);

        return $this->db->get();
    }

    public function cetakResi($where)
    {
        $this->db->select('booking.id_booking,booking.bar_code,booking.kode_booking,booking.berat, booking.no_resi, booking.isi_paket,booking.ongkir,booking.layanan,booking.kota_asal,booking.kota_tujuan');
        $this->db->from('booking');
        $this->db->join('user', 'booking.id_user=user.id_user');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima');
        $this->db->where($where);

        return $this->db->get();
    }

    public function laporan()
    {
        $this->db->select('booking.id_booking,booking.id_user,booking.kode_booking,booking.status,booking.no_resi, booking.tanggal_booking,booking.kota_asal,booking.kota_tujuan, booking.isi_paket,booking.berat,booking.ongkir, pengirim.nama_pengirim, pengirim.nohp_pengirim, penerima.nama_penerima, penerima.nohp_penerima');
        $this->db->from('booking');
        $this->db->join('user', 'booking.id_user=user.id_user');
        $this->db->join('pengirim', 'booking.id_pengirim=pengirim.id_pengirim');
        $this->db->join('penerima', 'booking.id_penerima=penerima.id_penerima');

        return $this->db->get();
    }

    public function total()
    {
        $this->db->count_all('booking');
        $this->db->from('booking');

        return $this->db->get()->num_rows('booking');
    }

    public function totalBooking()
    {
        $this->db->count_all('booking');
        $this->db->from('booking');

        return $this->db->get()->num_rows('booking');
    }

    public function totalTransaksi()
    {
        return $this->db->get('v_total_transaksi')->result_array();
    }

    // public function totalBlmKonfirm()
    // {
    //     return $this->db->get('v_total_blm_konfirm')->result_array();
    // }



    public function totalBelumKonfirm()
    {
        $this->db->count_all('booking');
        $this->db->from('booking');
        $this->db->where('status="booking"');

        return $this->db->get()->num_rows('booking');
    }

    function getKodeBooking()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_booking,4)) AS kd_max FROM booking WHERE DATE(tanggal_booking)=CURDATE()");
        $kd = "";
        $bk = "BKG-";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {

            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $bk . date('ymd') . $kd;
    }


    // untuk No Resi 
    public function kodeOtomatis($tabel, $key)
    {
        $this->db->select('right(' . $key . ',3) as kode', false);
        $this->db->order_by($key, 'desc');
        $this->db->limit(1);
        $query = $this->db->get($tabel);
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 5;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('dmY') . $kodemax;

        return $kodejadi;
    }

    public function chartbkg($bulan)
    {
        // date_default_timezone_set('Asia/Jakarta');
        $like = 'BKG-' . date('y') . $bulan;
        $this->db->like('kode_booking', $like, 'after');
        return count($this->db->get('booking')->result_array());
    }
}
