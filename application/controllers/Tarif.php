<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{

    private $api_key = 'b1cd07aa0be6376f133288dbd5cbf5ba';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('lib');
    }

    public function index()
    {
        $data['province'] = json_decode($this->province());

        $this->load->view('templates/home/home-header');
        $this->lib->template('tarif/ongkir', $data);
        $this->load->view('templates/home/home-footer');
    }

    public function province()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            return $response;
        }
    }

    public function city()
    {
        $id = $this->input->get('q');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            $data = json_decode($response, true);
            for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . "</option>";
            }
        }
    }

    function cost()
    {
        $origin         = $this->input->get('origincity');
        $destination     = $this->input->get('destinationcity');
        $weight         = $this->input->get('weight') * 1000;
        $courier         = $this->input->get('courier');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data['query'] = json_decode($response);

            $this->load->view('templates/home/home-header');
            $this->lib->template('tarif/tarif', $data);
            $this->load->view('templates/home/home-footer');
        }
    }
}
