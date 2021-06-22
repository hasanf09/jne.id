<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelPickup', 'ModelUser']);
        cek_login();
        cek_user();
    }

    public function booking()
    {
        $data['title'] = 'Laporan Data Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->laporan()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan/booking', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_booking()
    {

        $data['booking'] = $this->ModelBooking->laporan()->result_array();

        $this->load->view('admin/laporan/booking_cetak', $data);
    }

    public function laporan_booking_pdf()
    {

        $data['booking'] = $this->ModelBooking->laporan()->result_array();

        $html = $this->load->view('admin/laporan/booking_pdf', $data, true);


        // load Fungsi mPDF
        $mpdf = new \Mpdf\Mpdf();

        // Atur orientasi
        $mpdf->AddPage('L');

        // Write Some HTML Code
        $mpdf->WriteHTML($html);

        // Output Atau Tampilan nama pdf
        $nama_file_pdf = 'Laporan_data_booking' . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    public function booking_export_excel()
    {
        $data = array('title' => 'Laporan Booking', 'booking' => $this->ModelBooking->laporan()->result_array());
        $this->load->view('admin/laporan/booking_excel', $data);
    }

    public function pickup()
    {
        $data['title'] = 'Laporan Data pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pickup'] = $this->db->get('pickup')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan/pickup', $data);
        $this->load->view('templates/footer');
    }


    public function cetak_laporan_pickup()
    {

        $data['pickup'] = $this->db->get('pickup')->result_array();

        $this->load->view('admin/laporan/pickup_cetak', $data);
    }


    public function laporan_pickup_pdf()
    {

        $data['pickup'] = $this->db->get('pickup')->result_array();

        $html = $this->load->view('admin/laporan/pickup_pdf', $data, true);


        // load Fungsi mPDF
        $mpdf = new \Mpdf\Mpdf();

        // Atur orientasi
        $mpdf->AddPage('L');

        // Write Some HTML Code
        $mpdf->WriteHTML($html);

        // Output Atau Tampilan nama pdf
        $nama_file_pdf = 'Laporan_data_pickup' . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    public function pickup_export_excel()
    {
        $data = array('title' => 'Laporan pickup', 'pickup' => $this->db->get('pickup')->result_array());
        $this->load->view('admin/laporan/pickup_excel', $data);
    }
}
