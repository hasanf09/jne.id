<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pickup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelSelect', 'ModelBooking', 'ModelUser', 'ModelAlamat', 'ModelPickup']);
        $this->load->library('form_validation');
        cek_login();
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama wajib diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim', [
            'required' => 'No HP wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('province', 'Provinsi pengirim', 'required|trim', [
            'required' => 'Provinsi pengirim wajib di isi'
        ]);
        $this->form_validation->set_rules('kabupaten-kota', 'Kabupaten Pengirim', 'required|trim', [
            'required' => 'Nama pengirim wajib di isi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan pengirim', 'required|trim', [
            'required' => 'Kecamatan pengirim wajib di isi'
        ]);
        $this->form_validation->set_rules('kelurahan-desa', 'Kelurahan pengirim', 'required|trim', [
            'required' => 'Kelurahan / desa pengirim wajib di isi'
        ]);
        $this->form_validation->set_rules('barang', 'Barang', 'required|trim', [
            'required' => 'Data Barang wajib di isi'
        ]);
        $this->form_validation->set_rules('qty', 'Jumlah', 'required|trim', [
            'required' => 'Jumlah barang wajib di isi'
        ]);
        $this->form_validation->set_rules('kendaraan', 'kendaraan', 'required|trim', [
            'required' => 'kendaraan wajib di isi'
        ]);
        $this->form_validation->set_rules('waktu', 'Waktu Pickup', 'required|trim', [
            'required' => 'Waktu pickup wajib di isi'
        ]);


        $data['title'] = 'Pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id_kurir = $this->uri->segment(3);
        $d = $this->db->query("SELECT id_kurir FROM kurir WHERE status='tersedia'")->row();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pickup/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_kurir' => $d->id_kurir,
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('province'),
                'kota' => $this->input->post('kabupaten-kota'),
                'kec' => $this->input->post('kecamatan'),
                'desa' => $this->input->post('kelurahan-desa'),
                'barang' => $this->input->post('barang'),
                'jumlah' => $this->input->post('qty'),
                'kendaraan' => $this->input->post('kendaraan'),
                'waktu' => $this->input->post('waktu'),
                'note' => $this->input->post('note')
            ];


            $this->db->insert('pickup', $data);
            $this->session->set_flashdata('message', 'Permintaan Pickup Berhasil');
            redirect('pickup/getpickup');
        }
    }

    public function getpickup()
    {
        $data['title'] = 'Pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');

        $data['pickup'] = $this->db->query("SELECT * FROM pickup WHERE id_user ORDER BY id_pickup DESC LIMIT 1")->result_array();
        $data['kurir'] = $this->db->query("SELECT * FROM kurir WHERE status='tersedia' LIMIT 1")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pickup/getpickup', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data['title'] = 'Update Status Pickup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pickup'] = $this->ModelPickup->joinPickup()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pickup/update', $data);
        $this->load->view('templates/footer');
    }

    public function konfir()
    {

        $id = $this->session->userdata('id_user');
        $id_pickup = $this->uri->segment(3);

        //  ubah status dikirim ketika admin mengkonfirmasi bahwa barang telah diantar ke counter 
        $status = 'Menunggu Konfirmasi';
        $this->db->query("UPDATE pickup SET pickup.status='$status' WHERE pickup.id_pickup='$id_pickup'");


        $this->session->set_flashdata('message',  '<div class="alert alertmessage alert-success" role="alert">Data Berhasil Berhasil Disimpan</div>');
        redirect('pickup/update');
    }

    public function updatePickup()
    {
        $id_pickup = $this->uri->segment(3);
        $pickup = $this->db->get('pickup')->result_array();
        foreach ($pickup as $p) {
            $st = $p['status'];
        }

        if ($st == "Menunggu Konfirmasi") {
            $status = 'Kurir Sedang Dalam Perjalanan';
            $this->db->query("UPDATE pickup SET pickup.status='$status' WHERE pickup.id_pickup='$id_pickup'");
        } else if ($st == "Kurir Sedang Dalam Perjalanan") {
            $status = 'Barang Sudah Diterima Kurir';
            $this->db->query("UPDATE pickup SET pickup.status='$status' WHERE pickup.id_pickup='$id_pickup'");
        } else {
            redirect('pickup/update');
        }


        $this->session->set_flashdata('message',  '<div class="alert alertmessage alert-success" role="alert">Berhasil Mengupdate No Resi </div>');
        redirect('pickup/update');
    }

    public function hapuspickup()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelPickup->hapusPickup($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Pickup Berhasil Dibatalkan');
            redirect(base_url('riwayat/pickup'));
        }
    }
}
