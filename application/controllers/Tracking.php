<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelAlamat', 'ModelPengiriman']);
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Pengiriman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tracking'] = $this->ModelPengiriman->joinTracking()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('tracking/index', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data['title'] = 'Update Status Pengiriman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tracking'] = $this->ModelPengiriman->joinTracking()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('tracking/update', $data);
        $this->load->view('templates/footer');
    }

    public function updateProcess()
    {
        $id_booking = $this->uri->segment(3);
        $tracking = $this->ModelPengiriman->joinTracking()->result_array();
        foreach ($tracking as $t) {
            $st = $t['status'];
        }

        if ($st == "Manifest") {
            $status = 'On Process';
            $this->db->query("UPDATE pengiriman, booking SET pengiriman.status='$status', booking.status='$status' WHERE booking.id_booking='$id_booking' AND pengiriman.id_booking='$id_booking'");
        } else if ($st == "On Process") {
            $status = 'Received On Destination';
            $this->db->query("UPDATE pengiriman, booking SET pengiriman.status='$status', booking.status='$status' WHERE booking.id_booking='$id_booking' AND pengiriman.id_booking='$id_booking'");
        } else if ($st == "Received On Destination") {
            $status = 'Delivered';
            $this->db->query("UPDATE pengiriman, booking SET pengiriman.status='$status', booking.status='$status' WHERE booking.id_booking='$id_booking' AND pengiriman.id_booking='$id_booking'");
        } else {
            redirect('tracking/update');
        }



        $this->session->set_flashdata('message',  '<div class="alert alertmessage alert-success" role="alert">Berhasil Mengupdate No Resi </div>');
        redirect('tracking/update');
    }
}
