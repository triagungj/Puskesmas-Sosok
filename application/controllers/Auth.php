<?php

class Auth extends CI_Controller
{
    public function index()
    {
        if (isset($this->session->id_user)) {
            redirect(base_url('dashboard'));
        } else {
            $data['message_success'] = $this->session->flashdata('message_success');
            $data['message_failure'] = $this->session->flashdata('message_failure');

            $data['username'] = $this->session->flashdata('username');

            $this->load->view('auth/login_view', $data);
        }
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            'password' => $password,
        );

        $status = $this->model_user->login($data)->num_rows();
        $data_user = $this->model_user->login($data)->row();
        if ($status == 1) {
            $_SESSION["id_user"] = $data_user->id_user;
            $_SESSION["nama_user"] = $data_user->nama;
            $_SESSION["jabatan"] = $data_user->jabatan;
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('username', $username);
            $this->session->set_flashdata('message_failure', 'Username/Password anda salah');
            redirect(base_url());
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}
