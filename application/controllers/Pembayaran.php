<?php
class Pembayaran extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'transaksi';
        $data['title'] = 'Data Pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pembayaran/list_pembayaran_view');
        $this->load->view('templates/footer');
    }
}
