<?php
class Pasien extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_pasien->count() / $per_page);
        $list_data = $this->model_pasien->tampil_data($per_page, $offset)->result();

        $data['pasien'] = $list_data;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'pasien';
        $data['title'] = 'Data Pasien';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pasien/list_pasien_view', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pasien()
    {
        $nama_pasien = $this->input->post('nama_pasien');
        $nik = $this->input->post('nik');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $no_hp = $this->input->post('no_hp');

        $data = array(
            'nama_pasien' => $nama_pasien,
            'nik' => $nik,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'agama' => $agama,
            'no_hp' => $no_hp,
        );

        if ($this->model_pasien->input_data($data)) {
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
        redirect(base_url('pasien'));
    }
    public function edit_pasien()
    {
        $id_pasien = $this->input->post('id_pasien');
        $nama_pasien = $this->input->post('nama_pasien');
        $nik = $this->input->post('nik');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $no_hp = $this->input->post('no_hp');

        $data = array(
            'nama_pasien' => $nama_pasien,
            'nik' => $nik,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'agama' => $agama,
            'no_hp' => $no_hp,
        );

        if ($this->model_pasien->edit_pasien($data, $id_pasien)) {
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
        redirect(base_url('pasien'));
    }

    public function hapus_pasien()
    {
        $id_pasien = $this->input->post('id_pasien');
        $data = array('id_pasien' => $id_pasien);

        if ($this->model_pasien->delete_data($data)) {
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

        redirect(base_url('pasien'));
    }
}
