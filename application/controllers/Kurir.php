<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelAdmin', 'ModelBooking']);
        cek_login();
        cek_user();
    }

    public function index()
    {

        $data['title'] = 'Tambah Kurir';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kurir'] = $this->db->query("SELECT * FROM kurir")->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('cabang', 'Cabang', 'required|trim', [
            'required' => 'Cabang harus diisi'
        ]);
        $this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required|trim', [
            'required' => 'Kendaraan harus diisi'
        ]);

        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required|trim', [
            'required' => 'Pilih jenis kendaraan'
        ]);

        $this->form_validation->set_rules('nopol', 'Nomor Polisi', 'required|trim', [
            'required' => 'Nomor Polisi harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status harus diisi'
        ]);

        //konfigurasi sebeelum gambar di upload 
        $config['upload_path'] = './assets/img/profile';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['min_size'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();


        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/kurir', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_kurir' => $this->input->post('nama', true),
                'nohp_kurir' => $this->input->post('no_hp', true),
                'cabang' => $this->input->post('cabang', true),
                'kendaraan' => $this->input->post('kendaraan', true),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan', true),
                'nopol' => $this->input->post('nopol', true),
                'status' => $this->input->post('status', true),
            ];

            $this->db->insert('kurir', $data);
            $this->session->set_flashdata('message', 'Data Kurir Berhasil Ditambahkan');
            redirect('data/datakurir');
        }
    }

    public function ubahKurir()
    {

        $data['title'] = 'Ubah Data Kurir';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kurir'] = $this->db->get('kurir')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('cabang', 'Cabang', 'required|trim', [
            'required' => 'Cabang harus diisi'
        ]);
        $this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required|trim', [
            'required' => 'Kendaraan harus diisi'
        ]);

        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required|trim', [
            'required' => 'Pilih jenis kendaraan'
        ]);

        $this->form_validation->set_rules('nopol', 'Nomor Polisi', 'required|trim', [
            'required' => 'Nomor Polisi harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/kurir', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_kurir', true);
            $nama = $this->input->post('nama', true);
            $nohp = $this->input->post('no_hp', true);
            $cabang = $this->input->post('cabang', true);
            $kendaraan = $this->input->post('kendaraan', true);
            $jeniskendaraan = $this->input->post('jenis_kendaraan', true);
            $nopol = $this->input->post('nopol', true);
            $status = $this->input->post('status', true);

            //  cek jika ada gambar yang akan diupload 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id_kurir', $id);
                    $this->db->update('kurir');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_kurir' => $nama,
                'nohp_kurir' => $nohp,
                'cabang' => $cabang,
                'kendaraan' => $kendaraan,
                'jenis_kendaraan' => $jeniskendaraan,
                'nopol' => $nopol,
                'status' => $status,
            ];

            $this->db->set($data);
            $this->db->where('id_kurir', $id);
            $this->db->update('kurir');
            $this->session->set_flashdata('message', 'Data Kurir Berhasil Diubah');
            redirect('data/datakurir');
        }
    }

    public function hapusKurir()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAdmin->hapusKurir($id);
        if (!$proses) {
            $this->session->set_flashdata('message', ' Berhasil Dihapus');
            redirect(base_url('data/datakurir'));
        }
    }
}
