<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['slider'] = $this->db->get('slider')->result_array();

        $this->load->view('templates/home/home-header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/home/home-footer');
    }

    public function coba()
    {

        $this->load->view('templates/home/home-header');
        $this->load->view('tracking/lacak', $data);
        $this->load->view('templates/home/home-footer');
    }
}
