<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Karya_model');
        $this->load->model('Kategori_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['karya'] = $this->Karya_model->getAll();
        $data['kategori'] = $this->Kategori_model->getAll();
        $data['user'] = $this->User_model->getAll();
        $this->template->load('template_admin','admin/karya',$data);
    }

    public function add() {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'file_path' => $this->_uploadFile(),
            'kategori_id' => $this->input->post('kategori_id'),
        ];
        $this->Karya_model->insert($data);
        redirect('admin/karya');
    }

    public function edit($id) {
        $karya = $this->Karya_model->getById($id);
        $file_path = $karya->file_path;

        if (!empty($_FILES['file_path']['name'])) {
    // hapus file lama kalau ada
    if ($karya->file_path && file_exists($karya->file_path)) {
        unlink($karya->file_path);
    }
    $file_path = $this->_uploadFile();
}


        $data = [
            'user_id' => $this->input->post('user_id'),
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'file_path' => $file_path,
            'kategori_id' => $this->input->post('kategori_id'),
        ];

        $this->Karya_model->update($id, $data);
        redirect('admin/karya');
    }

    public function delete($id) {
        $this->Karya_model->delete($id);
        redirect('admin/karya');
    }

    private function _uploadFile() {
    $config['upload_path']   = './uploads/karya/';  // folder khusus karya
    $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx';
    $config['max_size']      = 2048;
    $config['file_name']     = time().'_'.$_FILES['file_path']['name']; // biar unik

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file_path')) {
        return 'uploads/karya/'.$this->upload->data('file_name'); // simpan path relatif
    }
    return null;
}

}
