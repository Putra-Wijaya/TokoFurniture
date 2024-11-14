<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome
 */
class Welcome extends CI_Controller {
	
	/**
	 * index
	 *
	 * @return void
	 */
	public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

}
