<?php
class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pendaftaran->count() / $per_page);
        $list_pendaftaran = $this->model_pendaftaran->tampil_data($offset, $per_page)->result();
        $list_dokter_poli = $this->model_dokter_poli->get_all_data()->result();
        $list_pasien = $this->model_pasien->get_all_data()->result();

        $data['pendaftaran'] = $list_pendaftaran;
        $data['list_dokter_poli'] = $list_dokter_poli;
        $data['list_pasien'] = $list_pasien;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'pendaftaran';
        $data['title'] = 'Data Pendaftaran';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pendaftaran/list_pendaftaran_view', $data);
        $this->load->view('templates/footer');
    }

    public function print_pendaftaran()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');

        $pendaftaran = $this->model_pendaftaran->select_data($id_pendaftaran);

        $data['pendaftaran'] = $pendaftaran;

        $this->load->view('print/print_pendaftaran', $data);
    }

    public function tambah_pendaftaran()
    {
        $keluhan = preg_replace("/[\n\r]/", "<br />", $this->input->post('keluhan'));
        $keluhan = str_replace("<br /><br />", "<br />", $keluhan);
        $tgl_pendaftaran = date("Y-m-d H:i:s");
        $id_pasien = $this->input->post('id_pasien');
        $id_dokter_poli = $this->input->post('id_dokter_poli');
        $nomor_kartu = $this->input->post('nomor_kartu');
        $opsi = $this->input->post('opsi');

        if ($opsi == 'Lain-lain') {
            $opsi = $this->input->post('opsi_lain');
        }

        $data = array(
            'keluhan' => $keluhan,
            'tgl_pendaftaran' => $tgl_pendaftaran,
            'id_pasien' => $id_pasien,
            'id_dokter_poli' => $id_dokter_poli,
            'opsi' => $opsi,
            'nomor_kartu' => $nomor_kartu,
        );

        if ($this->model_pendaftaran->input_data($data)) {
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
        redirect(base_url('pendaftaran'));
    }
    public function edit_pendaftaran()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $keluhan = preg_replace("/[\n\r]/", "<br />", $this->input->post('keluhan'));
        $keluhan = str_replace("<br /><br />", "<br />", $keluhan);
        $id_dokter_poli = $this->input->post('id_dokter_poli');
        $nomor_kartu = $this->input->post('nomor_kartu');
        $opsi = $this->input->post('opsi');

        if ($opsi == 'Lain-lain') {
            $opsi = $this->input->post('opsi_lain');
        }

        $data = array(
            'keluhan' => $keluhan,
            'id_dokter_poli' => $id_dokter_poli,
            'opsi' => $opsi,
            'nomor_kartu' => $nomor_kartu,
        );

        if ($this->model_pendaftaran->edit_pendaftaran($data, $id_pendaftaran)) {
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
        redirect(base_url('pendaftaran'));
    }

    public function hapus_pendaftaran()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $data = array('id_pendaftaran' => $id_pendaftaran);

        if ($this->model_pendaftaran->delete_data($data)) {
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
        redirect(base_url('pendaftaran'));
    }
}
