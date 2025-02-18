<?php

/**
 * Kontak
 */
class Kontak extends CI_Controller {
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('form_validation');

		// aktifkan saat membutuhkan profiling
			// untuk pengecekan Profiling 
			// $this->output->enable_profiler(TRUE);
    }
    
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kontak');
        $this->load->view('templates/footer');
    }
    
    /**
     * send_message
     *
     * @return void
     */
    public function send_message() {
        // Aturan validasi form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
			
            $this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('kontak');
			$this->load->view('templates/footer');

        } else {
            // Siapkan data untuk email
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );

            // Pengaturan email
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com'; // SMTP host
            $config['smtp_port'] = 587; // SMTP port
            $config['smtp_user'] = '';
            $config['smtp_pass'] = '';
            $config['mailtype'] = 'html'; // Tipe email
            $config['charset'] = 'utf-8'; // Karakter set
            $config['newline'] = "\r\n"; // Newline
            $config['crlf'] = "\r\n"; // Carriage return line feed
			$config['smtp_crypto'] = 'tls';

            $this->email->initialize($config); // Menginisialisasi konfigurasi email

            $this->email->from($data['email'], $data['name']);
            $this->email->to(''); // Ganti dengan alamat email tujuan
            $this->email->subject($data['subject']);
            $this->email->message($data['message']);

            // Kirim email
            if ($this->email->send()) {
                // Jika email berhasil dikirim
                $this->session->set_flashdata('success', 'Pesan berhasil dikirim!');

                redirect('kontak'); // Kembali ke halaman kontak
            } else {
                // Jika pengiriman email gagal
                echo $this->email->print_debugger(); // Debugger untuk melihat kesalahan
                die();
            }
        }
    }
}
