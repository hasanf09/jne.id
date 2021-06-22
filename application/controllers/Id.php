<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Id extends CI_Controller
{
    public function visimisi()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/visimisi');
        $this->load->view('templates/home/home-footer');
    }

    public function sejarah()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/sejarah');
        $this->load->view('templates/home/home-footer');
    }

    public function manajemen()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/manajemen');
        $this->load->view('templates/home/home-footer');
    }

    public function penghargaan()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/penghargaan');
        $this->load->view('templates/home/home-footer');
    }

    public function produk()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/produk');
        $this->load->view('templates/home/home-footer');
    }

    public function layanan()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/layanan');
        $this->load->view('templates/home/home-footer');
    }

    public function kontak()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/kontak');
        $this->load->view('templates/home/home-footer');
    }

    public function lokasi()
    {
        $this->load->view('templates/home/home-header');
        $this->load->view('home/lokasi');
        $this->load->view('templates/home/home-footer');
    }

    public function tracking()
    {
        $where = $this->input->post('cari');
        $data['track'] = $this->db->query("SELECT booking.no_resi, booking.status, booking.provinsi_asal,booking.kota_asal,booking.provinsi_tujuan,booking.kota_tujuan,booking.ongkir,booking.layanan,booking.berat,booking.isi_paket,pengiriman.tanggal_konfirm,pengirim.nama_pengirim,pengirim.nohp_pengirim,pengirim.alamat_pengirim,penerima.nama_penerima,penerima.nohp_penerima,penerima.alamat_penerima 
        FROM booking 
        JOIN pengiriman ON pengiriman.id_booking=booking.id_booking
        JOIN pengirim ON pengirim.id_pengirim=booking.id_pengirim
        JOIN penerima ON penerima.id_penerima=booking.id_penerima WHERE booking.no_resi LIKE '%$where%'")->result_array();

        $this->load->view('templates/home/home-header');
        $this->load->view('tracking/tracking', $data);
        $this->load->view('templates/home/home-footer');
    }
}
