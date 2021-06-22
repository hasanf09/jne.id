<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSelect extends CI_Model
{
    function province()
    {
        $this->db->order_by('name_province', 'ASC');
        $provinces = $this->db->get('provinces');


        return $provinces->result_array();
    }

    function kabupaten($provId)
    {

        $kabupaten = "<option value'0'> Pilih Kabupaten </option>";

        $this->db->order_by('name_regencies', 'ASC');
        $kab = $this->db->get_where('regencies', array('province_id' => $provId));

        foreach ($kab->result_array() as $data) {
            $kabupaten .= "<option value='$data[id]'>$data[name_regencies]</option>";
        }

        return $kabupaten;
    }


    function kecamatan($kabId)
    {
        $kecamatan = "<option value'0'> Pilih Kecamatan </option>";

        $this->db->order_by('name_districts', 'ASC');
        $kec = $this->db->get_where('districts', array('regency_id' => $kabId));

        foreach ($kec->result_array() as $data) {
            $kecamatan .= "<option value='$data[id]'>$data[name_districts]</option>";
        }

        return $kecamatan;
    }

    function kelurahan($kecId)
    {
        $kelurahan = "<option value'0'> Pilih Kelurahan </option>";

        $this->db->order_by('name_villages', 'ASC');
        $kel = $this->db->get_where('villages', array('district_id' => $kecId));

        foreach ($kel->result_array() as $data) {
            $kelurahan .= "<option value='$data[id]'>$data[name_villages]</option>";
        }

        return $kelurahan;
    }
}
