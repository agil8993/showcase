<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karya_model extends CI_Model {
    protected $table = 'karya';

    public function getAll() {
        $this->db->select('karya.*, user.nama as nama_user, kategori_karya.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('user', 'user.user_id = karya.user_id', 'left');
        $this->db->join('kategori_karya', 'kategori_karya.kategori_id = karya.kategori_id', 'left');
        return $this->db->get()->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['karya_id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('karya_id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['karya_id' => $id]);
    }
}
