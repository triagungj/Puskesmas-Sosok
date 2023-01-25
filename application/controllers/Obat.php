<?php
class Obat extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_obat->count() / $per_page);
        $list_data = $this->model_obat->tampil_data($per_page, $offset)->result();

        $data['obat'] = $list_data;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'master';
        $data['title'] = 'Data Obat';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/obat/list_obat_view', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_obat()
    {
        $nama_obat = $this->input->post('nama_obat');
        $jenis_obat = $this->input->post('jenis_obat');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');

        $data = array(
            'nama_obat' => $nama_obat,
            'jenis_obat' => $jenis_obat,
            'stok' => $stok,
            'satuan' => $satuan,
            'harga' => $harga,
        );

        if ($this->model_obat->input_data($data)) {
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
        redirect(base_url('obat'));
    }
    public function tambah_stok_obat()
    {
        $id_obat = $this->input->post('id_obat');
        $stok = $this->input->post('stok');
        $stok_input = $this->input->post('stok_input');

        $total_stok = $stok + $stok_input;

        $data = array(
            'stok' => $total_stok,
        );

        if ($this->model_obat->edit_obat($data, $id_obat)) {
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
        redirect(base_url('obat'));
    }
    public function edit_obat()
    {
        $id_obat = $this->input->post('id_obat');
        $nama_obat = $this->input->post('nama_obat');
        $jenis_obat = $this->input->post('jenis_obat');
        $stok = $this->input->post('stok');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');

        $data = array(
            'nama_obat' => $nama_obat,
            'jenis_obat' => $jenis_obat,
            'stok' => $stok,
            'satuan' => $satuan,
            'harga' => $harga,
        );

        if ($this->model_obat->edit_obat($data, $id_obat)) {
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
        redirect(base_url('obat'));
    }

    public function hapus_obat()
    {
        $id_obat = $this->input->post('id_obat');
        $data = array('id_obat' => $id_obat);

        if ($this->model_obat->delete_data($data)) {
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
        redirect(base_url('obat'));
    }
}
