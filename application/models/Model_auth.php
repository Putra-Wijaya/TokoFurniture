<?php

/**
 * Model_auth
 */
class Model_auth extends CI_Model
{
    /**
     * cek_login
     *
     * @param string $username
     * @param string $password
     * @return object|false
     */
    public function cek_login($username, $password)
    {
        // Ambil data user berdasarkan username
        $user = $this->db->select('username, password, role_id, nama')
                         ->where('username', $username)
                         ->limit(1)
                         ->get('user')
                         ->row();

        // Jika user ditemukan, verifikasi password
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user; // Return data user jika password cocok
            }
        }

        return FALSE; // Return FALSE jika user tidak ditemukan atau password salah
    }
}

