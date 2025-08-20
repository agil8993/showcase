<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'user'; // kalau mau ganti jadi 'user', ubah di sini

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('user_id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('user_id', $id)->delete($this->table);
    }
}
