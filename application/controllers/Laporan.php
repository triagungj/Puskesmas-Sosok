<?php
class Laporan extends CI_Controller
{
    public function index()
    {
        redirect(base_url());
    }
    public function laporan_pendaftaran()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $month = $this->input->get('month');

        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pendaftaran->count() / $per_page);
        if ($month != null) {
            $list_pendaftaran = $this->model_pendaftaran->select_data_by_month($offset, $per_page, $month)->result();
        } else {
            $list_pendaftaran = $this->model_pendaftaran->tampil_data($offset, $per_page)->result();
        }

        $data['pendaftaran'] = $list_pendaftaran;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'laporan';
        $data['title'] = 'Laporan Pendaftaran';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/laporan_pendaftaran_view', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_pemeriksaan()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $month = $this->input->get('month');

        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pemeriksaan->count() / $per_page);
        if ($month != null) {
            $list_pemeriksaan = $this->model_pemeriksaan->select_data_by_month($offset, $per_page, $month)->result();
        } else {
            $list_pemeriksaan = $this->model_pemeriksaan->tampil_data($offset, $per_page)->result();
        }
        $data['pemeriksaan'] = $list_pemeriksaan;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'laporan';
        $data['title'] = 'Laporan Pemeriksaan';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/laporan_pemeriksaan_view', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_pembayaran()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $month = $this->input->get('month');

        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pembayaran->count() / $per_page);
        if ($month != null) {
            $list_pembayaran = $this->model_pembayaran->select_data_by_month($offset, $per_page, $month)->result();
        } else {
            $list_pembayaran = $this->model_pembayaran->tampil_data($offset, $per_page)->result();
        }
        foreach ($list_pembayaran as $pembayaran) {
        $pembayaran->obat = $this->model_obat_tindakan->select_data($pembayaran->id_tindakan)->result();
        }

        $data['list_pembayaran'] = $list_pembayaran;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'laporan';
        $data['title'] = 'Laporan Pembayaran';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/laporan_pembayaran_view', $data);
        $this->load->view('templates/footer');
    }
}
