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
		// aktifkan saat membutuhkan profilinf
			// untuk pengecekan Profiling 
			// $this->output->enable_profiler(TRUE);

        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

}
