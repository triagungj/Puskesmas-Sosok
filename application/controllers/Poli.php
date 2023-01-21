<?php
class Poli extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_poli->count() / $per_page);
        $list_data = $this->model_poli->tampil_data($per_page, $offset)->result();

        $data['poli'] = $list_data;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'master';
        $data['title'] = 'Data Poli';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/poli/list_poli_view', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_poli()
    {
        $nama_poli = $this->input->post('nama_poli');

        $data = array(
            'nama_poli' => $nama_poli,
        );

        if ($this->model_poli->input_data($data)) {
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
        redirect(base_url('poli'));
    }


    public function edit_poli()
    {
        $id_poli = $this->input->post('id_poli');
        $nama_poli = $this->input->post('nama_poli');

        $data = array(
            'nama_poli' => $nama_poli,
        );

        if ($this->model_poli->edit_poli($data, $id_poli)) {
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
        redirect(base_url('poli'));
    }

    public function hapus_poli()
    {
        $id_poli = $this->input->post('id_poli');
        $data = array('id_poli' => $id_poli);

        if ($this->model_poli->delete_data($data)) {
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

        redirect(base_url('poli'));
    }
}
