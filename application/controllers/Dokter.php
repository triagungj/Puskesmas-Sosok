<?php
class Dokter extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_dokter->count() / $per_page);
        $list_data = $this->model_dokter->tampil_data($offset, $per_page)->result();

        $data['dokter'] = $list_data;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'dokter';
        $data['title'] = 'Data Dokter';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dokter/list_dokter_view', $data);
        $this->load->view('templates/footer');
    }
}
