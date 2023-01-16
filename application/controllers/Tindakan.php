<?php
class Tindakan extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'transaksi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/tindakan/list_tindakan_view');
        $this->load->view('templates/footer');
    }
}
