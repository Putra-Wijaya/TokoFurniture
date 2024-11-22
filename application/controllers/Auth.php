<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth
 */
class Auth extends CI_Controller{
    
    /**
     * login
     *
     * @return void
     */

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib Diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib Diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('form_login');
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Cek login melalui model
			$auth = $this->Model_auth->cek_login($username, $password);

			if ($auth) {
				// Set session
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);
				$this->session->set_userdata('nama', $auth->nama);

				// Redirect berdasarkan role_id
				switch ($auth->role_id) {
					case 1:
						redirect('admin/dashboard_admin');
						break;
					case 2:
						redirect('welcome');
						break;
					default:
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Role tidak dikenali.</div>');
						redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username atau Password Anda Salah!</div>');
				redirect('auth/login');
			}
		}
	}


    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
