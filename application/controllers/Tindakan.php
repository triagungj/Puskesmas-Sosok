<?php
class Tindakan extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_tindakan->count() / $per_page);
        $list_tindakan = $this->model_tindakan->tampil_data($offset, $per_page)->result();
        $list_pemeriksaan = $this->model_tindakan->kandidat_tindakan($offset, $per_page)->result();
        $list_obat = $this->model_obat->get_all_data()->result();

        foreach ($list_tindakan as $tindakan) {
            $tindakan->obat = $this->model_obat_tindakan->select_data($tindakan->id_tindakan)->result();
        }

        $data['list_tindakan'] = $list_tindakan;
        $data['list_pemeriksaan'] = $list_pemeriksaan;
        $data['list_obat'] = $list_obat;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'tindakan';
        $data['title'] = 'Data Tindakan';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/tindakan/list_tindakan_view', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_tindakan()
    {
        $no_rm = $this->input->post('no_rm');
        $nama_tindakan = $this->input->post('nama_tindakan');
        $jumlah_biaya = $this->input->post('jumlah_biaya');
        $tgl_tindakan = date("Y-m-d H:i:s");
        $id_obat = $this->input->post('id_obat');
        $jumlah_obat = $this->input->post('jumlah_obat');

        $data = array(
            'nama_tindakan' => $nama_tindakan,
            'tgl_tindakan' => $tgl_tindakan,
            'jumlah_biaya' => $jumlah_biaya,
            'no_rm' => $no_rm,
        );

        $id_tindakan = $this->model_tindakan->input_data($data);
        if ($id_tindakan != null) {
            if ($id_obat != null) {
                $list_data_obat = array();
                for ($i = 0; $i < sizeof($id_obat); $i++) {
                    $data_obat = array(
                        'id_obat' => $id_obat[$i],
                        'jumlah_obat' => $jumlah_obat[$i],
                        'id_tindakan' => $id_tindakan
                    );
                    array_push($list_data_obat, $data_obat);
                }
                if ($this->model_obat_tindakan->input_multi_data($list_data_obat)) {
                    $this->session->set_flashdata('message_success', 'Berhasil menambahkan data');
                } else {
                    $data = array('id_tindakan' => $id_tindakan);
                    $this->model_tindakan->delete_data($data);

                    if (ENVIRONMENT == 'production') {
                        $error =  "Gagal memproses data. Coba lagi.";
                    } else {
                        $dbError =  $this->db->error();
                        $error =  $dbError['message'];
                    }
                    $this->session->set_flashdata('message_failure', $error);
                }
            }
        } else {
            if (ENVIRONMENT == 'production') {
                $error =  "Gagal memproses data. Coba lagi.";
            } else {
                $dbError =  $this->db->error();
                $error =  $dbError['message'];
            }
            $this->session->set_flashdata('message_failure', $error);
        };
        redirect(base_url('tindakan'));
    }
    public function edit_pemeriksaan()
    {
        $no_rm = $this->input->post('no_rm');
        $keterangan = preg_replace("/[\n\r]/", "<br />",  $this->input->post('keterangan'));
        $keterangan = str_replace("<br /><br />", "<br />", $keterangan);

        $data = array(
            'keterangan' => $keterangan
        );

        if ($this->model_tindakan->edit_pemeriksaan($data, $no_rm)) {
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
        redirect(base_url('tindakan'));
    }

    public function hapus_tindakan()
    {
        $id_tindakan = $this->input->post('id_tindakan');
        $data = array('id_tindakan' => $id_tindakan);

        if ($this->model_tindakan->delete_data($data)) {
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
        redirect(base_url('tindakan'));
    }
}
