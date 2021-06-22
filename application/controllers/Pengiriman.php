<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Zend');
        $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelAlamat', 'ModelPengiriman']);
        $this->booking_id='';
        cek_login();
        cek_user();
    }

    public function resi()
    {
        $data['title'] = 'Update No Resi ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengiriman'] = $this->ModelPengiriman->joinPengiriman()->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/pengiriman', $data);
        $this->load->view('templates/footer');

       // echo var_dump($data['pengiriman']) ;
        // $no_resi='';
        // foreach($data['pengiriman'] as $value){
            
        //     if($value['id_booking']==$this->booking_id){
        //         $no_resi=value['no_resi'];
        //     }
        // }
        // return $no_resi;
    }

    public function konfir()
    {

        $id = $this->session->userdata('id_user');
        $id_booking = $this->uri->segment(3);
        //$this->booking_id=$id_booking;
        $noresi = $this->db->query("SELECT * FROM booking where id_booking='$id_booking'")->row()->no_resi;
        $tglsekarang = date('Y-m-d H:m:s');

        $datapengiriman = [
            'no_resi' => $noresi,
            'id_booking' => $id_booking,
            'id_user' => $id,
            'tanggal_konfirm' => $tglsekarang,
            'status' => 'Manifest'
        ];

        $this->db->insert('pengiriman', $datapengiriman);

        //  ubah status dikirim ketika admin mengkonfirmasi bahwa barang telah diantar ke counter 
        $status = 'Manifest';
        $this->db->query("UPDATE pengiriman, booking SET pengiriman.status='$status', booking.status='$status' WHERE booking.id_booking='$id_booking' AND pengiriman.id_booking='$id_booking'");


        $this->session->set_flashdata('message',  '<div class="alert alertmessage alert-success" role="alert">Data Berhasil Berhasil Disimpan</div>');
        redirect('pengiriman/resi');
    }

    public function updateResi()
    {
        $id_booking = $this->uri->segment(3);
        $noresi =  $this->ModelBooking->kodeotomatis('pengiriman', 'no_resi');

        $this->zend->load('Zend/Barcode');
        $imageResource = Zend_Barcode::factory('code128', 'image', array('text' => $noresi), array())->draw();
        $imageName = $noresi . '.jpg';
        $imagePath = './assets/img/barcode/'; // penyimpanan file barcode
        imagejpeg($imageResource, $imagePath . $imageName);
        $pathBarcode = $imagePath . $imageName; //Menyimpan path image bardcode ked

        $this->db->query("UPDATE pengiriman, booking SET booking.bar_code='$imageName', booking.no_resi='$noresi',pengiriman.no_resi='$noresi' WHERE booking.id_booking='$id_booking' AND pengiriman.id_booking='$id_booking'");

        $this->session->set_flashdata('message',  '<div class="alert alertmessage alert-success" role="alert">Berhasil Mengupdate No Resi </div>');
        redirect('pengiriman/resi');
    }

    public function cetakresi()
    {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = "Cetak Nomor Resi";
        $idbooking = $this->uri->segment(3);
        $data['booking'] = $this->ModelBooking->cetakResi(['id_booking' => $idbooking])->result_array();
        $data['pengirim'] = $this->ModelAlamat->joinpengirim(['id_booking' => $idbooking])->result_array();
        $data['penerima'] = $this->ModelAlamat->joinpenerima(['id_booking' => $idbooking])->result_array();

        $this->load->view('tracking/cetakresi', $data);
    }
}
