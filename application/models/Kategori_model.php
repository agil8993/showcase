<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    private $table = "kategori_karya";

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('kategori_id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('kategori_id', $id)->delete($this->table);
    }
}
