<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelSelect', 'ModelUser', 'ModelBooking', 'ModelAlamat']);
        cek_login();
    }

    public function bukualamat()
    {
        $data['title'] = 'Buku Alamat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id = $this->session->userdata('id_user');
        $data['penerima'] = $this->ModelBooking->getPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getPengirim($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/bukualamat', $data);
        $this->load->view('user/modaltambah', $data);
        $this->load->view('user/modaldetail', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpengirim()
    {
        $this->form_validation->set_rules('label_pengirim', 'Label Pengirim', 'required|trim', [
            'required' => 'Label alamat harus diisi'
        ]);

        $this->form_validation->set_rules('province', 'Provinsi Pengirim', 'required|trim', [
            'required' => 'Provinsi pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required|trim', [
            'required' => 'Nama pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota', 'Kabupaten Pengirim', 'required|trim', [
            'required' => 'Kabupaten pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('nohp_pengirim', 'No HP Pengirim', 'required|trim', [
            'required' => 'No HP pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kecamatan', 'Kecamatan Pengirim', 'required|trim', [
            'required' => 'Kecamatan pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required|trim', [
            'required' => 'Alamat pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa', 'Kelurahan Pengirim', 'required|trim', [
            'required' => 'Kelurahan / desa pengirim harus diisi'
        ]);


        $data['title'] = 'Tambah Alamat Pengirim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id = $this->session->userdata('id_user');
        $data['penerima'] = $this->ModelBooking->getPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getPengirim($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bukualamat', $data);
            $this->load->view('user/modaltambah', $data);
            $this->load->view('user/modaldetail', $data);
            $this->load->view('templates/footer');
        } else {
            $pengirim = [
                'id_pengirim' => $this->ModelAlamat->IDpengirim(),
                'id_user' => $this->input->post('id_user'),
                'label_pengirim' => $this->input->post('label_pengirim'),
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'nohp_pengirim' => $this->input->post('nohp_pengirim'),
                'alamat_pengirim' => $this->input->post('alamat_pengirim'),
                'provinsi_pengirim' => $this->input->post('province'),
                'kota_pengirim' => $this->input->post('kabupaten-kota'),
                'kec_pengirim' => $this->input->post('kecamatan'),
                'desa_pengirim' => $this->input->post('kelurahan-desa'),
            ];

            $this->db->insert('pengirim', $pengirim);
            $this->session->set_flashdata('message', 'Berhasil Menambahkan Alamat Baru');
            redirect('alamat/bukualamat');
        }
    }

    public function tambahpenerima()
    {
        $this->form_validation->set_rules('label_penerima', 'Label Penerima', 'required|trim', [
            'required' => 'Label alamat harus diisi'
        ]);

        $this->form_validation->set_rules('province1', 'Provinsi penerima', 'required|trim', [
            'required' => 'Provinsi penerima harus diisi'
        ]);

        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required|trim', [
            'required' => 'Nama penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota1', 'Kabupaten penerima', 'required|trim', [
            'required' => 'Kabupaten penerima harus diisi'
        ]);

        $this->form_validation->set_rules('nohp_penerima', 'No HP penerima', 'required|trim', [
            'required' => 'No HP penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kecamatan1', 'Kecamatan penerima', 'required|trim', [
            'required' => 'Kecamatan penerima harus diisi'
        ]);

        $this->form_validation->set_rules('alamat_penerima', 'Alamat penerima', 'required|trim', [
            'required' => 'Alamat penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa1', 'Kelurahan penerima', 'required|trim', [
            'required' => 'Kelurahan / desa penerima harus diisi'
        ]);

        $data['title'] = 'Tambah Alamat Penerima';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id = $this->session->userdata('id_user');
        $data['penerima'] = $this->ModelBooking->getPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getPengirim($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bukualamat', $data);
            $this->load->view('user/modaltambah', $data);
            $this->load->view('user/modaldetail', $data);
            $this->load->view('templates/footer');
        } else {
            $penerima = [
                // input data penerima
                'id_penerima' => $this->ModelAlamat->IDpenerima(),
                'id_user' => $this->input->post('id_user'),
                'label_penerima' => $this->input->post('label_penerima'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'nohp_penerima' => $this->input->post('nohp_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'provinsi_penerima' => $this->input->post('province1'),
                'kota_penerima' => $this->input->post('kabupaten-kota1'),
                'kec_penerima' => $this->input->post('kecamatan1'),
                'desa_penerima' => $this->input->post('kelurahan-desa1'),
            ];

            $this->db->insert('penerima', $penerima);
            $this->session->set_flashdata('message', 'Berhasil Menambahkan Alamat baru');
            redirect('alamat/bukualamat');
        }
    }


    public function ubahpengirim()
    {
        $data['title'] = 'Ubah Pengirim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $data['province'] = $this->ModelSelect->province();
        $data['penerima'] = $this->ModelBooking->getPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getPengirim($id);

        $this->form_validation->set_rules('label_pengirim', 'Label Pengirim', 'required|trim', [
            'required' => 'Label alamat harus diisi'
        ]);

        $this->form_validation->set_rules('province2', 'Provinsi Pengirim', 'required|trim', [
            'required' => 'Provinsi pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required|trim', [
            'required' => 'Nama pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota2', 'Kabupaten Pengirim', 'required|trim', [
            'required' => 'Kabupaten pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('nohp_pengirim', 'No HP Pengirim', 'required|trim', [
            'required' => 'No HP pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kecamatan2', 'Kecamatan Pengirim', 'required|trim', [
            'required' => 'Kecamatan pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required|trim', [
            'required' => 'Alamat pengirim harus diisi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa2', 'Kelurahan Pengirim', 'required|trim', [
            'required' => 'Kelurahan / desa pengirim harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bukualamat', $data);
            $this->load->view('user/modaltambah', $data);
            $this->load->view('user/modaldetail', $data);
            $this->load->view('templates/footer');
        } else {

            $idpengirim = $this->input->post('id_pengirim');
            $id = $this->input->post('id_user');
            $labelpengirim = $this->input->post('label_pengirim');
            $namapengirim = $this->input->post('nama_pengirim');
            $nohppengirim = $this->input->post('nohp_pengirim');
            $alamatpengirim = $this->input->post('alamat_pengirim');
            $provinsipengirim = $this->input->post('province2');
            $kotapengirim = $this->input->post('kabupaten-kota2');
            $kecpengirim = $this->input->post('kecamatan2');
            $desapengirim = $this->input->post('kelurahan-desa2');
        }

        $data = [
            'id_pengirim' => $idpengirim,
            'id_user' => $id,
            'label_pengirim' => $labelpengirim,
            'nama_pengirim' => $namapengirim,
            'nohp_pengirim' => $nohppengirim,
            'alamat_pengirim' => $alamatpengirim,
            'provinsi_pengirim' => $provinsipengirim,
            'kota_pengirim' => $kotapengirim,
            'kec_pengirim' => $kecpengirim,
            'desa_pengirim' => $desapengirim
        ];

        $this->db->set($data);
        $this->db->where('id_pengirim', $idpengirim);
        $this->db->update('pengirim');
        $this->session->set_flashdata('message', 'Alamat Pengirim Berhasil Diubah');
        redirect('alamat/bukualamat');
    }

    public function ubahpenerima()
    {
        $data['title'] = 'Ubah Pengirim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $data['province'] = $this->ModelSelect->province();
        $data['penerima'] = $this->ModelBooking->getPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getPengirim($id);

        $this->form_validation->set_rules('label_penerima', 'Label penerima', 'required|trim', [
            'required' => 'Label alamat harus diisi'
        ]);

        $this->form_validation->set_rules('province3', 'Provinsi penerima', 'required|trim', [
            'required' => 'Provinsi penerima harus diisi'
        ]);

        $this->form_validation->set_rules('nama_penerima', 'Nama penerima', 'required|trim', [
            'required' => 'Nama penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota3', 'Kabupaten penerima', 'required|trim', [
            'required' => 'Kabupaten penerima harus diisi'
        ]);

        $this->form_validation->set_rules('nohp_penerima', 'No HP penerima', 'required|trim', [
            'required' => 'No HP penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kecamatan3', 'Kecamatan penerima', 'required|trim', [
            'required' => 'Kecamatan penerima harus diisi'
        ]);

        $this->form_validation->set_rules('alamat_penerima', 'Alamat penerima', 'required|trim', [
            'required' => 'Alamat penerima harus diisi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa3', 'Kelurahan penerima', 'required|trim', [
            'required' => 'Kelurahan / desa penerima harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bukualamat', $data);
            $this->load->view('user/modaltambah', $data);
            $this->load->view('user/modaldetail', $data);
            $this->load->view('templates/footer');
        } else {

            $idpenerima = $this->input->post('id_penerima');
            $id = $this->input->post('id_user');
            $labelpenerima = $this->input->post('label_penerima');
            $namapenerima = $this->input->post('nama_penerima');
            $nohppenerima = $this->input->post('nohp_penerima');
            $alamatpenerima = $this->input->post('alamat_penerima');
            $provinsipenerima = $this->input->post('province3');
            $kotapenerima = $this->input->post('kabupaten-kota3');
            $kecpenerima = $this->input->post('kecamatan3');
            $desapenerima = $this->input->post('kelurahan-desa3');
        }

        $data = [
            'id_penerima' => $idpenerima,
            'id_user' => $id,
            'label_penerima' => $labelpenerima,
            'nama_penerima' => $namapenerima,
            'nohp_penerima' => $nohppenerima,
            'alamat_penerima' => $alamatpenerima,
            'provinsi_penerima' => $provinsipenerima,
            'kota_penerima' => $kotapenerima,
            'kec_penerima' => $kecpenerima,
            'desa_penerima' => $desapenerima
        ];

        $this->db->set($data);
        $this->db->where('id_penerima', $idpenerima);
        $this->db->update('penerima');
        $this->session->set_flashdata('message', 'Alamat Penerima Berhasil Diubah');
        redirect('alamat/bukualamat');
    }

    public function hapuspengirim()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAlamat->hapuspengirim($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Alamat Pengirim Berhasil Dihapus');
            redirect(base_url('alamat/bukualamat'));
        }
    }

    public function hapuspenerima()
    {

        $id = $this->uri->segment(3);
        $proses = $this->ModelAlamat->hapuspenerima($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Alamat Penerima Berhasil Dihapus');
            redirect(base_url('alamat/bukualamat'));
        }
    }

    public function datapengirim()
    {
        $data['title'] = 'Data Pengirim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id = $this->session->set_userdata('id_user');
        $data['penerima'] = $this->ModelBooking->getDataPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getDataPengirim($id);



        // $data['pengirim'] = $this->ModelBooking->getDataPengirim($id);

        $this->load->view('user/modaldata', $data);
    }

    public function datapenerima()
    {
        $data['title'] = 'Data Pengirim';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $id = $this->session->set_userdata('id_user');
        $data['penerima'] = $this->ModelBooking->getDataPenerima($id);
        $data['pengirim'] = $this->ModelBooking->getDataPengirim($id);



        // $data['pengirim'] = $this->ModelBooking->getDataPengirim($id);

        $this->load->view('user/modaldata', $data);
    }
}
