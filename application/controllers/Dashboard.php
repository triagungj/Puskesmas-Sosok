<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $poli_statistic = $this->model_pendaftaran->group_total_data()->result();

        $data['poli_statistic'] = $poli_statistic;
        $data['page'] = 'dashboard';
        $data['title'] = 'dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dashboard/dashboard_view', $data);
        $this->load->view('templates/footer');
    }
}
