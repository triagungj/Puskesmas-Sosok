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

    public function tambah_dokter()
    {
        $jabatan = 'dokter';

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $spesialisasi = $this->input->post('spesialisasi');

        $dataUser = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'jabatan' => $jabatan,
        );
        $dataDokter = array(
            'nama_dokter' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'spesialisasi' => $spesialisasi,
        );

        if ($this->model_dokter->input_data($dataUser, $dataDokter)) {
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
        redirect(base_url('dokter'));
    }

    public function edit_dokter()
    {
        $id_dokter = $this->input->post('id_dokter');
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $spesialisasi = $this->input->post('spesialisasi');

        if ($password != null) {
            $dataUser = array(
                'username' => $username,
                'password' => $password,
            );
        } else {
            $dataUser = array(
                'username' => $username,
            );
        }

        $dataDokter = array(
            'nama_dokter' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'spesialisasi' => $spesialisasi,
            'id_user' => $id_user,
        );

        if ($this->model_dokter->edit_dokter($dataUser, $dataDokter, $id_dokter)) {
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
        redirect(base_url('dokter'));
    }

    public function hapus_dokter()
    {
        $id_user = $this->input->post('id_user');
        $data = array('id_user' => $id_user);

        if ($this->model_user->delete_data($data)) {
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

        redirect(base_url('dokter'));
    }
}
