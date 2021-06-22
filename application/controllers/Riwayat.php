<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelSelect', 'ModelBooking', 'ModelUser', 'ModelPickup', 'ModelAlamat']);
        cek_login();
    }

    public function booking()
    {

        $data['title'] = 'Riwayat Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $data['riwayat'] = $this->ModelBooking->tampilBooking()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/riwayat', $data);
        $this->load->view('templates/footer');
    }

    public function pickup()
    {

        $data['title'] = 'Riwayat Pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $data['pickup'] = $this->ModelPickup->joinPickup()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pickup/riwayat', $data);
        $this->load->view('templates/footer');
    }
}
