<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelSelect', 'ModelUser', 'ModelBooking', 'ModelPickup']);
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Customer Service';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_trans'] = $this->ModelBooking->totalTransaksi();
        $id = $this->session->userdata('id_user');
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['bkg'] = [];

        foreach ($bln as $b) {
            $data['bkg'][] = $this->ModelBooking->chartbkg($b);
        }

        // $data['totalbooking'] = $this->ModelBooking->totalBooking();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profilsaya()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profilsaya', $data);
        $this->load->view('templates/footer');
    }


    public function ubahprofil()
    {
        $data['title'] = 'Ubah Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim', [
            'required' => 'No HP harus diisi'
        ]);

        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Pilih jenis kelamin'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', [
            'required' => 'alamat harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahprofil', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_user', true);
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $no_hp = $this->input->post('no_hp', true);
            $jenis_kelamin = $this->input->post('gender', true);
            $alamat = $this->input->post('alamat', true);


            // cek jika ada gambar yang akan diupload 
            $upload_image = $_FILES['image']['name'];

            

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat
            );


            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Profil Anda Berhasil Diperbarui');
            redirect('user/profilsaya');
        }
    }

    public function ubahpassword()
    {

        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama harus diisi'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[6]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfimasi Password Baru', 'required|trim|min_length[6]|matches[password_baru1]', [
            'required' => 'Konfirmasi password baru',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password tidak sama'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('user/ubahpassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan password lama !</div>');
                    redirect('user/ubahpassword');
                } else {
                    // Password sudak OK 
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah </div>');
                    redirect('user/ubahpassword');
                }
            }
        }
    }
}
