<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Registrasi
 */
class Registrasi extends CI_Controller{
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username harus diisi']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]', ['required' => 'Password harus diisi', 'matches' => 'Konfirmasi password tidak sesuai']);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('registrasi');
            $this->load->view('templates/footer');
        }else {

        $password = $this->input->post('password_1');

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		
            $data = array(
                'id' => '',
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $hashed_password,
                'role_id' => 2,
            );

            $this->db->insert('user', $data);
			$this->session->set_flashdata('success', 'Registration successful!');
            redirect('auth/login');
        }
		
    }
}
