<?php
class Poli extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'poli';
        $data['title'] = 'Data Poli';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/poli/list_poli_view');
        $this->load->view('templates/footer');
    }
}
