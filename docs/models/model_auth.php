<?php

/**
 * Model_auth
 */
class Model_auth extends CI_Model{    
    /**
     * cek_login
     *
     * @return void
     */
    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
                           ->where('password', $password)
                           ->limit(1)
                           ->get('user');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return array();
        }
    }
}
