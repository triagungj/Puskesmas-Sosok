<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $poli_statistic = $this->model_pendaftaran->group_total_data()->result();
        $status_bayar_statistic = $this->model_pembayaran->total_status_bayar();
        $total_pendaftaran = $this->model_pendaftaran->count();
        $total_pemeriksaan = $this->model_pemeriksaan->count();
        $total_tindakan = $this->model_tindakan->count();

        $data['poli_statistic'] = $poli_statistic;
        $data['status_bayar_statistic'] = $status_bayar_statistic;
        $data['total_pendaftaran'] = $total_pendaftaran;
        $data['total_pemeriksaan'] = $total_pemeriksaan;
        $data['total_tindakan'] = $total_tindakan;

        $data['page'] = 'dashboard';
        $data['title'] = 'dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dashboard/dashboard_view', $data);
        $this->load->view('templates/footer');
    }
}
