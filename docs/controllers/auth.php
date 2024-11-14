<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib Diisi!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib Diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Anda Salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>');
                redirect('auth/login');
            } else {
                // Session setup with security considerations
                $this->session->sess_regenerate(TRUE);
                $this->session->set_userdata('user_id', $auth->id); // Store user ID, not username
                $this->session->set_userdata('role_id', (int)$auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        // Optional: redirect to a default page or show an error
                        redirect('auth/login');
                        break;
                }
            }
        }
    }
    
    public function logout() {
        // Destroy session safely
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
