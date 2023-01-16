<?php
class Obat extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'obat';
        $data['page'] = 'Data Obat';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/obat/list_obat_view');
        $this->load->view('templates/footer');
    }
}
