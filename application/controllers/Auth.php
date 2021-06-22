<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Alamat Email harus diisi',
            'valid_email' => 'Alamat Email tidak valid'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Member';
            $this->load->view('auth/login', $data);
        } else {
            //Jika Validasinya succes
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //Jika user nya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek pasword
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user']
                    ];
                    // Pilihan Login user atau admin
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', 'Selamat Anda Berhasil Login !');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
                // Flash data atau pemberitahuan jika login berhasil atau tidak
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama lengkap harus diisi'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Alamat Email harus diisi',
            'valid_email' => 'Alamat Email tidak valid',
            'is_unique' => 'Alamat Email sudah terdaftar'
        ]);

        $this->form_validation->set_rules('phone', 'No Handphone', 'required|trim|numeric|min_length[3]', [
            'required' => 'No Handphone harus diisi',
            'numeric' => 'Harus diisi angka',
            'min_length' => 'No Handphone terlalu pendek'
        ]);

        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus dipilih'
        ]);

        $this->form_validation->set_rules('address', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi lengkap'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Member';
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => $this->input->post('phone'),
                'jenis_kelamin' => $this->input->post('gender'),
                'alamat' => $this->input->post('address'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat ! Akun member anda berhasil dibuat. Silahkan Log In</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout</div>');
        redirect('auth');
    }

    public function blokir()
    {
        $this->load->view('auth/blokir');
    }
}
