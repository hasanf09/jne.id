<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAlamat extends CI_Model
{

    public function hapuspengirim($id)
    {
        $this->db->where('id_pengirim', $id);
        $query = $this->db->delete('pengirim');
    }

    public function hapuspenerima($id)
    {
        $this->db->where('id_penerima', $id);
        $query = $this->db->delete('penerima');
    }

    public function pengirimWhere($where)
    {
        return $this->db->get_where('pengirim', $where);
    }

    public function joinpengirim($where)
    {
        $this->db->select('booking.id_booking,booking.id_pengirim,pengirim.id_pengirim,pengirim.id_user,pengirim.label_pengirim,pengirim.nama_pengirim,pengirim.nohp_pengirim,pengirim.alamat_pengirim,pengirim.provinsi_pengirim,pengirim.kota_pengirim,pengirim.kec_pengirim,pengirim.desa_pengirim,provinces.name_province,regencies.name_regencies,districts.name_districts,villages.name_villages');
        $this->db->from('pengirim');
        $this->db->join('booking', 'pengirim.id_pengirim=booking.id_pengirim');
        $this->db->join('provinces', 'pengirim.provinsi_pengirim=provinces.id');
        $this->db->join('regencies', 'pengirim.kota_pengirim=regencies.id');
        $this->db->join('districts', 'pengirim.kec_pengirim=districts.id');
        $this->db->join('villages', 'pengirim.desa_pengirim=villages.id');
        $this->db->where($where);

        return $this->db->get();
    }

    public function joinpenerima($where)
    {
        $this->db->select('booking.id_booking,booking.id_penerima,penerima.id_penerima,penerima.id_user,penerima.label_penerima,penerima.nama_penerima,penerima.nohp_penerima,penerima.alamat_penerima,penerima.provinsi_penerima,penerima.kota_penerima,penerima.kec_penerima,penerima.desa_penerima,provinces.name_province,regencies.name_regencies,districts.name_districts,villages.name_villages');
        $this->db->from('penerima');
        $this->db->join('booking', 'penerima.id_penerima=booking.id_penerima');
        $this->db->join('provinces', 'penerima.provinsi_penerima=provinces.id');
        $this->db->join('regencies', 'penerima.kota_penerima=regencies.id');
        $this->db->join('districts', 'penerima.kec_penerima=districts.id');
        $this->db->join('villages', 'penerima.desa_penerima=villages.id');
        $this->db->where($where);

        return $this->db->get();
    }

    public function IDpengirim()
    {

        $this->db->select('RIGHT(pengirim.id_pengirim,4) as kode', FALSE);
        $this->db->order_by('id_pengirim', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengirim');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "PR-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

    public function IDpenerima()
    {

        $this->db->select('RIGHT(penerima.id_penerima,4) as kode', FALSE);
        $this->db->order_by('id_penerima', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penerima');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "PM-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }
}
