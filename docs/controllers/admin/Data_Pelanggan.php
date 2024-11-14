<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Data_Pelanggan
 * Controller untuk mengelola data pelanggan, termasuk menampilkan dan menghapus data pelanggan.
 */
class Data_Pelanggan extends CI_Controller {
    
    /**
     * Constructor
     * Melakukan inisialisasi dengan memuat model Model_User untuk interaksi dengan data pelanggan.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_User'); 
    }
    
    /**
     * index
     * Menampilkan halaman data pelanggan, yang memuat semua data pelanggan dari database.
     */
    public function index() {
        $data['pelanggan'] = $this->Model_User->get_pelanggan();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pelanggan', $data);
        $this->load->view('templates_admin/footer');
    }
    
    /**
     * hapus
     * Menghapus data pelanggan berdasarkan ID.
     * @param int $id ID pelanggan yang akan dihapus.
     */
    public function hapus($id) {
        $this->Model_User->hapus_pelanggan($id);
        redirect('admin/data_pelanggan');
    }
}
