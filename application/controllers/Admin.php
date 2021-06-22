<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['ModelAdmin', 'ModelBooking', 'ModelPickup', 'ModelUser']);
        cek_login();
        cek_user();
    }

    public function index()
    {

        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->ModelBooking->dataKonfirmBooking()->result_array();
        $data['pickup'] = $this->ModelPickup->dataKonfirmPickup()->result_array();

        // Chart Booking
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['bkg'] = [];

        foreach ($bln as $b) {
            $data['bkg'][] = $this->ModelBooking->chartbkg($b);
        }

        // Chart Pickup
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['pkp'] = [];

        foreach ($bln as $b) {
            $data['pkp'][] = $this->ModelPickup->chartpickup($b);
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->query("SELECT * FROM user WHERE role_id=2")->result_array();
        $data['dataadmin'] = $this->db->query("SELECT * FROM user WHERE role_id=1")->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama lengkap harus diisi'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Alamat Email harus diisi',
            'valid_email' => 'Alamat Email tidak valid',
            'is_unique' => 'Alamat Email sudah terdaftar'
        ]);

        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim|numeric|min_length[3]', [
            'required' => 'No Handphone harus diisi',
            'numeric' => 'Harus diisi angka',
            'min_length' => 'No Handphone terlalu pendek'
        ]);

        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus dipilih'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi lengkap'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password tidak sama'
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
            $data['title'] = 'Daftar Member';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/user', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => $this->input->post('no_hp'),
                'jenis_kelamin' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat'),
                'image' => $gambar,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Data Admin Berhasil Ditambahkan');
            redirect('data/datauser');
        }
    }


    public function ubahadmin()
    {

        $data['title'] = 'Ubah Data admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dataadmin'] = $this->db->query("SELECT * FROM user WHERE role_id=1")->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim', [
            'required' => 'No HP harus diisi'
        ]);

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Pilih jenis kelamin'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim', [
            'required' => 'Role ID harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_user', true);
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nohp = $this->input->post('no_hp', true);
            $jeniskelamin = $this->input->post('jenis_kelamin', true);
            $alamat = $this->input->post('alamat', true);
            $role = $this->input->post('role_id', true);

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
                    $this->db->where('id_user', $id);
                    $this->db->update('user');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $nohp,
                'jenis_kelamin' => $jeniskelamin,
                'alamat' => $alamat,
                'role_id' => $role
            ];

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Data Admin Berhasil Diubah');
            redirect('data/datauser');
        }
    }

    public function ubahuser()
    {

        $data['title'] = 'Ubah Data admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->query("SELECT * FROM user WHERE role_id=2")->result_array();
        $data['dataadmin'] = $this->db->query("SELECT * FROM user WHERE role_id=1")->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim', [
            'required' => 'No HP harus diisi'
        ]);

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Pilih jenis kelamin'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_user', true);
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $nohp = $this->input->post('no_hp', true);
            $jeniskelamin = $this->input->post('jenis_kelamin', true);
            $alamat = $this->input->post('alamat', true);
            $role = $this->input->post('role_id', true);

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
                    $this->db->where('id_user', $id);
                    $this->db->update('user');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $nohp,
                'jenis_kelamin' => $jeniskelamin,
                'alamat' => $alamat,
            ];

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Data User Berhasil Diubah');
            redirect('data/datauser');
        }
    }

    public function hapusadmin()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAdmin->hapusAdmin($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Data Admin Berhasil Dihapus');
            redirect(base_url('data/datauser'));
        }
    }

    public function hapusUser()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAdmin->hapusUser($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Data User Berhasil Dihapus');
            redirect(base_url('data/datauser'));
        }
    }


    public function slider()
    {

        $data['title'] = 'Slider';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['slider'] = $this->db->get('slider')->result_array();


        $this->form_validation->set_rules('keterangan', 'Keterangan Slide', 'required|trim|min_length[3]', [
            'required' => 'Keterangan slide harus diisi',
            'min_length' => 'Keterangan Slide terlalu pendek'
        ]);

        //konfigurasi sebeelum gambar di upload 
        $config['upload_path'] = './assets/img/slider';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['min_size'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/slider/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'keterangan' => $this->input->post('keterangan', true),
                'image' => $gambar
            ];


            $this->db->insert('slider', $data);
            $this->session->set_flashdata('message', 'Slider Baru Berhasil Ditambahkan');
            redirect('admin/slider');
        }
    }

    public function hapusslider()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAdmin->hapusSlider($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Slider Berhasil Dihapus');
            redirect(base_url('admin/slider'));
        }
    }


    public function artikel()
    {
        $data['title'] = 'Data Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim|min_length[3]', [
            'required' => 'Judul Berita harus diisi',
            'min_length' => 'Judul berita terlalu pendek'
        ]);

        $this->form_validation->set_rules('penulis', 'Nama Penulis', 'required|trim', [
            'required' => 'Penulis Berita harus diisi'
        ]);

        $this->form_validation->set_rules('tanggal_rilis', 'Tanggal Rilis', 'required|trim', [
            'required' => 'Tanggal Rilis Berita harus diisi'
        ]);

        $this->form_validation->set_rules('sumber', 'Sumber Berita', 'required|trim', [
            'required' => 'Sumber Berita Berita harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link Berita', 'required|trim', [
            'required' => 'Link Berita harus diisi'
        ]);


        //konfigurasi sebeelum gambar di upload 
        $config['upload_path'] = './assets/img/berita';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['min_size'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/artikel/index', $data);
            $this->load->view('admin/artikel/beritamodal', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'judul' => $this->input->post('judul', true),
                'penulis' => $this->input->post('penulis', true),
                'tanggal' => $this->input->post('tanggal_rilis', true),
                'sumber' => $this->input->post('sumber', true),
                'link' => $this->input->post('link', true),
                'image' => $gambar
            ];


            $this->db->insert('berita', $data);
            $this->session->set_flashdata('message', 'Artikel Baru Berhasil Ditambahkan');
            redirect('admin/artikel');
        }
    }

    public function ubahartikel()
    {
        $data['title'] = 'Ubah Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->get('berita')->result_array();

        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim|min_length[3]', [
            'required' => 'Judul Berita harus diisi',
            'min_length' => 'Judul berita terlalu pendek'
        ]);

        $this->form_validation->set_rules('penulis', 'Nama Penulis', 'required|trim', [
            'required' => 'Penulis Berita harus diisi'
        ]);

        $this->form_validation->set_rules('tanggal_rilis', 'Tanggal Rilis', 'required|trim', [
            'required' => 'Tanggal Rilis Berita harus diisi'
        ]);

        $this->form_validation->set_rules('sumber', 'Sumber Berita', 'required|trim', [
            'required' => 'Sumber Berita Berita harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link Berita', 'required|trim', [
            'required' => 'Link Berita harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/artikel/index', $data);
            $this->load->view('admin/artikel/beritamodal', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_berita');
            $judul = $this->input->post('judul', true);
            $penulis = $this->input->post('penulis', true);
            $tanggal = $this->input->post('tanggal_rilis', true);
            $sumber = $this->input->post('sumber', true);
            $link = $this->input->post('link', true);

            // cek jika ada gambar yang akan diupload 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
                $config['upload_path'] = './assets/img/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('id_berita', $id);
                    $this->db->update('berita');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'judul' => $judul,
                'penulis' => $penulis,
                'tanggal' => $tanggal,
                'sumber' => $sumber,
                'link' => $link
            );

            $this->db->set($data);
            $this->db->where('id_berita', $id);
            $this->db->update('berita');
            $this->session->set_flashdata('message', 'Artikel Berhasil Diubah');
            redirect('admin/artikel');
        }
    }

    public function info()
    {
        $data['title'] = 'Pemberitahuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get('info')->result_array();

        $this->form_validation->set_rules('judul', 'Judul Info', 'required|trim', [
            'required' => 'Judul Info harus diisi'
        ]);

        $this->form_validation->set_rules('type', 'Type Info', 'required|trim', [
            'required' => 'Type Info harus diisi'
        ]);

        $this->form_validation->set_rules('icon', 'Icon Info', 'required|trim', [
            'required' => 'Icon Info harus diisi'
        ]);

        $this->form_validation->set_rules('deskripsi', 'deskripsi Info', 'required|trim', [
            'required' => 'Deskripsi Info harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/info', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul', true),
                'type' => $this->input->post('type', true),
                'icon' => $this->input->post('icon', true),
                'deskripsi' => $this->input->post('deskripsi', true),
            ];

            $this->db->insert('info', $data);
            $this->session->set_flashdata('message', 'Info Berhasil Ditambahkan');
            redirect('admin/info');
        }
    }

    public function ubahinfo()
    {
        $data['title'] = 'Pemberitahuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['info'] = $this->db->get('info')->result_array();


        $this->form_validation->set_rules('judul', 'Judul Info', 'required|trim', [
            'required' => 'Judul Info harus diisi'
        ]);

        $this->form_validation->set_rules('type', 'Type Info', 'required|trim', [
            'required' => 'Type Info harus diisi'
        ]);

        $this->form_validation->set_rules('icon', 'Icon Info', 'required|trim', [
            'required' => 'Icon Info harus diisi'
        ]);

        $this->form_validation->set_rules('deskripsi', 'deskripsi Info', 'required|trim', [
            'required' => 'Deskripsi Info harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/info', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_info');
            $judul = $this->input->post('judul', true);
            $type = $this->input->post('type', true);
            $icon = $this->input->post('icon', true);
            $deskripsi = $this->input->post('deskripsi', true);
        }

        $data = [
            'judul' => $judul,
            'type' => $type,
            'icon' => $icon,
            'deskripsi' => $deskripsi
        ];


        $this->db->set($data);
        $this->db->where('id_info', $id);
        $this->db->update('info');
        $this->session->set_flashdata('message', 'Info Berhasil Diubah');
        redirect('admin/info');
    }



    public function hapusInfo()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelAdmin->hapusInfo($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Info Berhasil Dihapus');
            redirect(base_url('admin/info'));
        }
    }
}
