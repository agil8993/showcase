<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->template->load('template_admin', 'admin/kategori', $data);
    }

    public function save() {
        $id = $this->input->post('kategori_id');
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori', true)
        ];

        if ($id) {
            $this->Kategori_model->update($id, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Kategori berhasil diperbarui.</div>');
        } else {
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Kategori baru berhasil ditambahkan.</div>');
        }
        redirect('admin/kategori');
    }

    public function delete($id) {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Kategori berhasil dihapus.</div>');
        redirect('admin/kategori');
    }
}
