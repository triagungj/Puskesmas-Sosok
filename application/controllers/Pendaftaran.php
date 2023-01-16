<?php
class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'transaksi';
        $data['title'] = 'Data Pendaftaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pendaftaran/list_pendaftaran_view');
        $this->load->view('templates/footer');
    }
}
