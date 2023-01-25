<?php
class Pembayaran extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') != null ? $this->input->get('page') : 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pembayaran->count() / $per_page);
        $list_pembayaran = $this->model_pembayaran->tampil_data($offset, $per_page)->result();
        $list_tindakan = $this->model_pembayaran->kandidat_pembayaran()->result();

        foreach ($list_pembayaran as $pembayaran) {
            $pembayaran->obat = $this->model_obat_tindakan->select_data($pembayaran->id_tindakan)->result();
        }

        $data['list_pembayaran'] = $list_pembayaran;
        $data['list_tindakan'] = $list_tindakan;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'pembayaran';
        $data['title'] = 'Data Pembayaran';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pembayaran/list_pembayaran_view', $data);
        $this->load->view('templates/footer');
    }

    public function print_pembayaran()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');
        $pembayaran = $this->model_pembayaran->select_data($id_pembayaran);

        $pembayaran->obat = $this->model_obat_tindakan->select_data($pembayaran->id_tindakan)->result();

        $data['pembayaran'] = $pembayaran;
        $this->load->view('print/print_pembayaran', $data);
    }

    public function proses_pembayaran()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');
        $tgl_pembayaran = date("Y-m-d H:i:s");

        $data = array(
            'status' => 'Lunas',
            'tgl_pembayaran' => $tgl_pembayaran
        );
        $data_edit = array(
            'id_pembayaran' => $id_pembayaran
        );

        if ($this->model_pembayaran->edit_pembayaran($data, $data_edit)) {
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
        redirect(base_url('pembayaran'));
    }
    public function batalkan_pembayaran()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');

        $data = array(
            'status' => 'Belum Lunas',
            'tgl_pembayaran' => null
        );

        if ($this->model_pembayaran->edit_pembayaran($data, $id_pembayaran)) {
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
        redirect(base_url('pembayaran'));
    }
}
