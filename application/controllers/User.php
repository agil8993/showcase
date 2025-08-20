<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        $data['users'] = $this->User_model->get_all();
        $this->template->load('template_admin', 'user', $data); // ganti 'user_view' sesuai nama file view kamu
    }

    public function save() {
        $id = $this->input->post('user_id');

        $data = [
            'nama'     => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'role'     => $this->input->post('role', true)
        ];

        // Password di-hash jika diisi
        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        if ($id) {
            $this->User_model->update($id, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data user berhasil diperbarui.</div>');
        } else {
            $this->User_model->insert($data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">User baru berhasil ditambahkan.</div>');
        }

        redirect('user');
    }

    public function delete($id) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success">User berhasil dihapus.</div>');
        redirect('user');
    }
}
