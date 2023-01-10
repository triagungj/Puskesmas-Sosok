<?php
class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->model_user->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }
}
