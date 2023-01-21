<?php
class Pemeriksaan extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'pemeriksaan';
        $data['title'] = 'Data Pemeriksaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pemeriksaan/list_pemeriksaan_view');
        $this->load->view('templates/footer');
    }
}
