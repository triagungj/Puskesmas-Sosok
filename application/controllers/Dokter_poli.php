<?php
class Dokter_poli extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'dokter_poli';
        $data['title'] = 'Data Dokter Poli';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        // $this->load->view('master/dokter/list_dokter_view');
        $this->load->view('templates/footer');
    }
}
