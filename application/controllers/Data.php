<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelAlamat', 'ModelPickup']);
        cek_login();
        cek_user();
    }

    public function dataUser()
    {

        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->query("SELECT * FROM user WHERE role_id=2")->result_array();
        $data['dataadmin'] = $this->db->query("SELECT * FROM user WHERE role_id=1")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/user', $data);
        $this->load->view('templates/footer');
    }

    public function dataKurir()
    {

        $data['title'] = 'Data Kurir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kurir'] = $this->db->query("SELECT * FROM kurir")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/kurir', $data);
        $this->load->view('templates/footer');
    }

    public function databooking()
    {

        $data['title'] = 'Data Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->getDataBooking()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/booking', $data);
        $this->load->view('templates/footer');
    }

    public function pickup()
    {

        $data['title'] = 'Data Pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pickup'] = $this->ModelPickup->getDataPickup()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/pickup', $data);
        $this->load->view('templates/footer');
    }

    public function bookingDetail()
    {
        $data['title'] = 'Detail Booking';
        $idbooking = $this->uri->segment(3);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->cetak(['id_booking' => $idbooking])->result_array();
        $data['pengirim'] = $this->ModelAlamat->joinpengirim(['id_booking' => $idbooking])->result_array();
        $data['penerima'] = $this->ModelAlamat->joinpenerima(['id_booking' => $idbooking])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/detailbooking', $data);
        $this->load->view('templates/footer');
    }
}
