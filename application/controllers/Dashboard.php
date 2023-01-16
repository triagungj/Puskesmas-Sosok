<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'dashboard';
        $data['title'] = 'dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dashboard/dashboard_view');
        $this->load->view('templates/footer');
    }
}
