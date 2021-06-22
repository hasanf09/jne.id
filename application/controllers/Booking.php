<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('lib');
        $this->load->model(['ModelSelect', 'ModelBooking', 'ModelUser', 'ModelAlamat']);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        cek_login();
    }


    public function index()
    {

        $this->form_validation->set_rules('provinsiasal', 'Provinsi asal', 'required|trim', [
            'required' => 'Harap pilih provinsi asal'
        ]);

        $this->form_validation->set_rules('kurir', 'kurir', 'required|trim', [
            'required' => 'Harap pilih kurir pengiriman'
        ]);

        $this->form_validation->set_rules('asal', 'Kota asal', 'required|trim', [
            'required' => 'Harap pilih kota asal'
        ]);

        $this->form_validation->set_rules('prov', 'Provinsi tujuan', 'required|trim', [
            'required' => 'Harap pilih provinsi Tujuan'
        ]);

        $this->form_validation->set_rules('kabupaten', 'Kota tujuan', 'required|trim', [
            'required' => 'Harap pilih kota tujuan'
        ]);

        $this->form_validation->set_rules('berat', 'Berat', 'required|trim', [
            'required' => 'Berat barang harus diisi'
        ]);


        $this->form_validation->set_rules('layanan', 'layanan', 'required|trim', [
            'required' => 'Harap pilih layanan yang tersedia'
        ]);

        $this->form_validation->set_rules('jeniskiriman', 'jenis kiriman', 'required|trim', [
            'required' => 'Harap pilih jenis kiriman'
        ]);

        $this->form_validation->set_rules('isi', 'Isi Paket', 'required|trim', [
            'required' => 'Keterangan isi paket wajib di isi'
        ]);

        $this->form_validation->set_rules('nama_pengirim', 'Nama pengirim', 'required|trim', [
            'required' => 'Nama pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('nama_penerima', 'Nama penerima', 'required|trim', [
            'required' => 'Nama penerima wajib di isi'
        ]);

        $this->form_validation->set_rules('label_pengirim', 'Label pengirim', 'required|trim', [
            'required' => 'Label pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('label_penerima', 'Label penerima', 'required|trim', [
            'required' => 'Label penerima wajib di isi'
        ]);

        $this->form_validation->set_rules('nohp_pengirim', 'No HP  pengirim', 'required|trim|max_length[13]', [
            'required' => 'No hp pengirim wajib di isi',
            'max_length' => 'No Hp melebihi angka maksimal'
        ]);

        $this->form_validation->set_rules('nohp_penerima', 'No HP penerima', 'required|trim|max_length[13]', [
            'required' => 'No hp penerima wajib di isi',
            'max_length' => 'No Hp melebihi angka maksimal'
        ]);

        $this->form_validation->set_rules('alamat_pengirim', 'Alamat pengirim', 'required|trim', [
            'required' => 'Alamat pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('alamat_penerima', 'Alamat penerima', 'required|trim', [
            'required' => 'Alamat penerima wajib di isi'
        ]);

        $this->form_validation->set_rules('province', 'Provinsi pengirim', 'required|trim', [
            'required' => 'Provinsi pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('province1', 'Provinsi penerima', 'required|trim', [
            'required' => 'Nama pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota', 'Kabupaten Pengirim', 'required|trim', [
            'required' => 'Nama pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('kabupaten-kota1', 'Kabupaten penerima', 'required|trim', [
            'required' => 'Nama pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('kecamatan', 'Kecamatan pengirim', 'required|trim', [
            'required' => 'Kecamatan pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('kecamatan1', 'Kecamatan penerima', 'required|trim', [
            'required' => 'Kecamatan penerima wajib di isi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa', 'Kelurahan pengirim', 'required|trim', [
            'required' => 'Kelurahan / desa pengirim wajib di isi'
        ]);

        $this->form_validation->set_rules('kelurahan-desa1', 'Kelurahan penerima', 'required|trim', [
            'required' => 'Kelurahan  / desa penerima wajib di isi'
        ]);

        $data['title'] = 'Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['province'] = $this->ModelSelect->province();
        $data['kodebooking'] = $this->ModelBooking->getKodeBooking();
        $id = $this->session->userdata('id_user');
        $data['pengirim'] = $this->ModelAlamat->IDpengirim();
        $data['penerima'] = $this->ModelAlamat->IDpenerima();
        $data['datapengirim'] = $this->db->get('pengirim')->result_array();
        $data['datapenerima'] = $this->db->get('penerima')->result_array();
        $provasal = explode(",", $this->input->post('asal', TRUE));
        $provtujuan = explode(",", $this->input->post('asal', TRUE));
        $asal = explode(",", $this->input->post('asal', TRUE));
        $kab = explode(",", $this->input->post('kabupaten', TRUE));
        $cost = explode(",", $this->input->post('layanan', TRUE));


        // Jika Validasinya tidak cocok 
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/modaldata', $data);
            $this->lib->display('booking/form', $data);
            $this->load->view('templates/footer');

            // Jika Validasi nya cocok/ jalan 
        } else {

            $booking = array(
                // input data booking
                'id_penerima' => $this->input->post('id_penerima'),
                'id_pengirim' => $this->input->post('id_pengirim'),
                'id_user' => $this->input->post('id_user'),
                'kode_booking' => $this->input->post('kode_booking'),
                'no_resi' => $this->ModelBooking->kodeOtomatis("booking","no_resi"),
                'status' => 'Booking',
                'provinsi_asal' => $provasal[1],
                'kota_asal' => $asal[1],
                'provinsi_tujuan' => $provtujuan[1],
                'kota_tujuan' => $kab[1],
                'berat' => $this->input->post('berat'),
                'kurir' => $this->input->post('kurir'),
                'layanan' => $cost[1],
                'jenis_kiriman' => $this->input->post('jeniskiriman'),
                'isi_paket' => $this->input->post('isi'),
                'ongkir' => $this->input->post('ongkir'),
            );

            $this->db->insert('booking', $booking);

            $pengirim = array(

                // input data pengirim 
                'id_pengirim' => $this->input->post('id_pengirim'),
                'id_user' => $this->input->post('id_user'),
                'label_pengirim' => $this->input->post('label_pengirim'),
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'nohp_pengirim' => $this->input->post('nohp_pengirim'),
                'alamat_pengirim' => $this->input->post('alamat_pengirim'),
                'provinsi_pengirim' => $this->input->post('province'),
                'kota_pengirim' => $this->input->post('kabupaten-kota'),
                'kec_pengirim' => $this->input->post('kecamatan'),
                'desa_pengirim' => $this->input->post('kelurahan-desa'),
            );

            $this->db->insert('pengirim', $pengirim);

            $penerima = array(
                // input data penerima
                'id_penerima' => $this->input->post('id_penerima'),
                'id_user' => $this->input->post('id_user'),
                'label_penerima' => $this->input->post('label_penerima'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'nohp_penerima' => $this->input->post('nohp_penerima'),
                'alamat_penerima' => $this->input->post('alamat_penerima'),
                'provinsi_penerima' => $this->input->post('province1'),
                'kota_penerima' => $this->input->post('kabupaten-kota1'),
                'kec_penerima' => $this->input->post('kecamatan1'),
                'desa_penerima' => $this->input->post('kelurahan-desa1'),
            );

            $this->db->insert('penerima', $penerima);
            $this->session->set_flashdata('message', 'Kode Booking Berhasil Dibuat');
            redirect('booking/kodebooking');
        }
    }

    // FUNCTION UNTUK MENGAMBIL DATA ALAMAT PENGIRIM DAN PENERIMA 
    function ambil_data()
    {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if ($modul == "kabupaten") {
            echo $this->ModelSelect->kabupaten($id);
        } else if ($modul == "kecamatan") {
            echo $this->ModelSelect->kecamatan($id);
        } else if ($modul == "kelurahan") {
            echo $this->ModelSelect->kelurahan($id);
        }
    }

    //  FUNCTION UNTUK MENGAMBIL DATA ONGKIR 
    public function city()
    {
        $prov = $this->input->post('prov', TRUE);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$prov",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: b1cd07aa0be6376f133288dbd5cbf5ba"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);

            echo '<option value="" selected disabled>--Kota/Kabupaten--</option>';

            for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                echo '<option 
        value="' . $data['rajaongkir']['results'][$i]['city_id'] . ',' . $data['rajaongkir']['results'][$i]['city_name'] . '">' . $data['rajaongkir']['results'][$i]['city_name'] . '</option>';
            }
        }
    }

    public function origin()
    {
        $prov = $this->input->post('prov', TRUE);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$prov",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: b1cd07aa0be6376f133288dbd5cbf5ba"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);

            echo '<option value="" selected disabled>--Kota/Kabupaten--</option>';

            for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                echo '<option 
        value="' . $data['rajaongkir']['results'][$i]['city_id'] . ',' . $data['rajaongkir']['results'][$i]['city_name'] . '">' . $data['rajaongkir']['results'][$i]['city_name'] . '</option>';
            }
        }
    }

    public function getcost()
    {
        $asal = $this->input->post('asal', TRUE);
        $dest = $this->input->post('dest', TRUE);
        $kurir = $this->input->post('kurir', TRUE);
        $berat = $this->input->post('berat', TRUE) * 1000;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: b1cd07aa0be6376f133288dbd5cbf5ba"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);

            echo '<option value="" selected disabled>-- Layanan yang Tersedia --</option>';

            for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {

                for ($l = 0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

                    echo '<option value="' . $data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'] . ',' . $data['rajaongkir']['results'][$i]['costs'][$l]['service'] . '(' . $data['rajaongkir']['results'][$i]['costs'][$l]['description'] . ')' . '&nbsp;' . $data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['etd'] . '&nbsp;' . 'HARI' . '">';
                    echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'] . '(' . $data['rajaongkir']['results'][$i]['costs'][$l]['description'] . ')' . '&nbsp;' . $data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['etd'] . '&nbsp;' . 'HARI' . '</option>';
                }
            }
        }
    }
    public function cost()
    {
        $biaya = explode(',', $this->input->post('layanan', TRUE));
        $total = $this->input->post('berat') * $biaya[0];

        echo $biaya[0];
        echo $total[0];
    }


    public function kodebooking()
    {

        $data['title'] = 'Kode Booking';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id = $this->session->userdata('id_user');
        $data['kodebooking'] = $this->ModelBooking->kodeBooking()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/getkodebooking', $data);
        $this->load->view('templates/footer');
    }

    public function hapusBooking()
    {
        $id = $this->uri->segment(3);
        $proses = $this->ModelBooking->hapusBooking($id);
        if (!$proses) {
            $this->session->set_flashdata('message', 'Booking Berhasil Dihapus');
            redirect(base_url('riwayat/booking'));
        }
    }


    public function cetaklabel()
    {
        $data['title'] = 'Cetak Label Pengiriman';
        $id = $this->session->userdata('id_user');
        $idbooking = $this->uri->segment(3);
        $data['booking'] = $this->ModelBooking->cetak(['id_booking' => $idbooking])->result_array();
        $data['pengirim'] = $this->ModelAlamat->joinpengirim(['id_booking' => $idbooking])->result_array();
        $data['penerima'] = $this->ModelAlamat->joinpenerima(['id_booking' => $idbooking])->result_array();

        $this->load->view('booking/cetaklabel', $data);
    }
}
