<?php
class Laporan extends CI_Controller
{

    public function index()
    {

        $data['page'] = 'laporan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/list_laporan_view');
        $this->load->view('templates/footer');
    }
}
