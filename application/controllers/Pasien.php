<?php
class Pasien extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'pasien';
        $data['title'] = 'Data Pasien';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pasien/list_pasien_view');
        $this->load->view('templates/footer');
    }
}
