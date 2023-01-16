<?php
class User extends CI_Controller
{
    public function index()
    {
        $get_page = $this->input->get('page') ?? 1;
        $per_page = 10;
        $offset_index = $get_page - 1;
        $offset = $offset_index * $per_page;
        $total_page = ceil($this->model_user->count() / $per_page);
        $list_data = $this->model_user->tampil_data($per_page, $offset)->result();

        $data['user'] = $list_data;
        $data['page_index'] = $get_page;
        $data['offset_index'] = $offset;
        $data['total_page'] = $total_page;

        $data['page'] = 'user';
        $data['title'] = 'Data User';
        $data['message_success'] = $this->session->flashdata('message_success');
        $data['message_failure'] = $this->session->flashdata('message_failure');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/user/list_user_view', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');

        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'jabatan' => $jabatan,
        );

        if ($this->model_user->input_data($data)) {
            $this->session->set_flashdata('message_success', 'Berhasil menambahkan data');
        } else {
            $error =  $this->db->error();
            $this->session->set_flashdata('message_failure', $error['message']);
        };
        redirect(base_url('user'));
    }
    public function edit_user()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jabatan = $this->input->post('jabatan');

        if ($password != null) {
            $data = array(
                'username' => $username,
                'password' => $password,
                'jabatan' => $jabatan,
            );
        } else {
            $data = array(
                'username' => $username,
                'jabatan' => $jabatan,
            );
        }

        if ($this->model_user->edit_user($data, $id_user)) {
            $this->session->set_flashdata('message_success', 'Berhasil mengupdate data');
        } else {
            $error =  $this->db->error();
            $this->session->set_flashdata('message_failure', $error['message']);
        };
        redirect(base_url('user'));
    }

    public function hapus_user()
    {
        $id_user = $this->input->post('id_user');
        $data = array('id_user' => $id_user);
        $this->model_user->delete_data($data);
        redirect(base_url('user'));
    }
}
