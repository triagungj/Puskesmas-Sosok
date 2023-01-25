<?php
class Dokter_poli extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_dokter_poli->count() / $per_page);
        $list_dokter_poli = $this->model_dokter_poli->tampil_data($offset, $per_page)->result();
        $list_dokter = $this->model_dokter->get_all_data()->result();
        $list_poli = $this->model_poli->get_all_data()->result();

        $data['dokter_poli'] = $list_dokter_poli;
        $data['list_dokter'] = $list_dokter;
        $data['list_poli'] = $list_poli;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'master';
        $data['title'] = 'Data Dokter Poli';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/dokter_poli/list_dokter_poli_view', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_dokter_poli()
    {
        $id_poli = $this->input->post('id_poli');
        $id_dokter = $this->input->post('id_dokter');

        $data = array(
            'id_poli' => $id_poli,
            'id_dokter' => $id_dokter,
        );

        if ($this->model_dokter_poli->input_data($data)) {
            $this->session->set_flashdata('message_success', 'Berhasil menambahkan data');
        } else {
            if (ENVIRONMENT == 'production') {
                $error =  "Gagal memproses data. Coba lagi.";
            } else {
                $dbError =  $this->db->error();
                $error =  $dbError['message'];
            }
            $this->session->set_flashdata('message_failure', $error);
        };
        redirect(base_url('dokter_poli'));
    }
    public function edit_dokter_poli()
    {
        $id_dokter_poli = $this->input->post('id_dokter_poli');
        $id_poli = $this->input->post('id_poli');
        $id_dokter = $this->input->post('id_dokter');

        $data = array(
            'id_poli' => $id_poli,
            'id_dokter' => $id_dokter,
        );

        if ($this->model_dokter_poli->edit_dokter_poli($data, $id_dokter_poli)) {
            $this->session->set_flashdata('message_success', 'Berhasil mengupdate data');
        } else {
            if (ENVIRONMENT == 'production') {
                $error =  "Gagal memproses data. Coba lagi.";
            } else {
                $dbError =  $this->db->error();
                $error =  $dbError['message'];
            }
            $this->session->set_flashdata('message_failure', $error);
        };
        redirect(base_url('dokter_poli'));
    }

    public function hapus_dokter_poli()
    {
        $id_dokter_poli = $this->input->post('id_dokter_poli');
        $data = array('id_dokter_poli' => $id_dokter_poli);

        if ($this->model_dokter_poli->delete_data($data)) {
            $this->session->set_flashdata('message_success', 'Berhasil menghapus data');
        } else {
            if (ENVIRONMENT == 'production') {
                $error =  "Gagal memproses data. Coba lagi.";
            } else {
                $dbError =  $this->db->error();
                $error =  $dbError['message'];
            }
            $this->session->set_flashdata('message_failure', $error);
        }
        redirect(base_url('dokter_poli'));
    }
}
