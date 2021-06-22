<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lib
{
    protected $_ci;

    public function __construct()
    {
        $this->_ci = &get_instance();
    }

    function display($template, $data = null)
    {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('booking/template.php', $data);
    }

    public function template($content, $data = null)
    {
        $data['_content'] = $this->_ci->load->view($content, $data, true);
        $this->_ci->load->view('tarif/template.php', $data);
    }
}
