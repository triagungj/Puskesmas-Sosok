<?php
class Pemeriksaan extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pemeriksaan->count() / $per_page);
        if ($this->session->id_dokter != null) {
            $id_dokter = $this->session->id_dokter;
            $list_pemeriksaan = $this->model_pemeriksaan->tampil_data_by_dokter($offset, $per_page, $id_dokter)->result();
            $list_pendaftaran = $this->model_pemeriksaan->kandidat_pemeriksaan_by_dokter($id_dokter)->result();
        } else {
            $list_pemeriksaan = $this->model_pemeriksaan->tampil_data($offset, $per_page)->result();
            $list_pendaftaran = $this->model_pemeriksaan->kandidat_pemeriksaan()->result();
        }

        $data['pemeriksaan'] = $list_pemeriksaan;
        $data['list_pendaftaran'] = $list_pendaftaran;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'pemeriksaan';
        $data['title'] = 'Data Pemeriksaan';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pemeriksaan/list_pemeriksaan_view', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pemeriksaan()
    {
        $no_rm = $this->input->post('no_rm');
        $keterangan = preg_replace("/[\n\r]/", "<br />",  $this->input->post('keterangan'));
        $keterangan = str_replace("<br /><br />", "<br />", $keterangan);
        $tgl_pemeriksaan = date("Y-m-d H:i:s");
        $id_pendaftaran = $this->input->post('id_pendaftaran');

        $data = array(
            'no_rm' => $no_rm,
            'keterangan' => $keterangan,
            'tgl_pemeriksaan' => $tgl_pemeriksaan,
            'id_pendaftaran' => $id_pendaftaran,
        );

        if ($this->model_pemeriksaan->input_data($data)) {
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
        redirect(base_url('pemeriksaan'));
    }
    public function edit_pemeriksaan()
    {
        $no_rm = $this->input->post('no_rm');
        $keterangan = preg_replace("/[\n\r]/", "<br />",  $this->input->post('keterangan'));
        $keterangan = str_replace("<br /><br />", "<br />", $keterangan);

        $data = array(
            'keterangan' => $keterangan
        );

        if ($this->model_pemeriksaan->edit_pemeriksaan($data, $no_rm)) {
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
        redirect(base_url('pemeriksaan'));
    }

    public function hapus_pemeriksaan()
    {
        $no_rm = $this->input->post('no_rm');
        $data = array('no_rm' => $no_rm);

        if ($this->model_pemeriksaan->delete_data($data)) {
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
        redirect(base_url('pemeriksaan'));
    }
}
