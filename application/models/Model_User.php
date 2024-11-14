<?php

/**
 * Model_User
 */
class Model_User extends CI_Model {
        
    /**
     * get_pelanggan
     *
     * @return void
     */
    public function get_pelanggan() {
        $this->db->where('role_id', 2);
        $query = $this->db->get('user');
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }
    
    /**
     * hapus_pelanggan
     *
     * @param  mixed $id
     * @return void
     */
    public function hapus_pelanggan($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
}

