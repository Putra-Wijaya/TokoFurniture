<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dashboard_admin
 * 
 * Kelas ini menangani tampilan utama dari admin dashboard serta beberapa fitur terkait
 * dengan penjualan, pendapatan, dan data lainnya yang dibutuhkan untuk admin.
 * 
 * @package Application\Controllers
 */
class Dashboard_Admin extends CI_Controller
{
    /**
     * Konstruktor kelas Dashboard_admin.
     * Memuat model yang diperlukan dan melakukan pengecekan sesi login.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Model_barang');

        // Pengecekan sesi untuk memastikan hanya role_id 1 (admin) yang bisa mengakses.
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('auth/login');
        }
    }

    /**
     * Menampilkan halaman utama dashboard admin.
     * Mengambil berbagai data statistik seperti pendapatan, total pelanggan, barang,
     * jumlah penjualan, pesanan terbaru, dan data penjualan.
     */
    public function index() {
        // Mengambil total pendapatan
        $data['total_pendapatan'] = $this->Dashboard_model->getTotalPendapatan();
        
        // Mengambil jumlah total pelanggan
        $data['user'] = $this->Dashboard_model->getTotalPelanggan();
        
        // Mengambil jumlah total barang
        $data['barang'] = $this->Dashboard_model->getTotalBarang();
        
        // Mengambil jumlah total penjualan
        $data['jumlah'] = $this->Dashboard_model->getTotalPenjualan();
        
        // Mengambil semua pesanan
        $data['pesanan'] = $this->Dashboard_model->get_all_orders();
        
        // Mengambil pesanan terbaru
        $data['pesanan_terbaru'] = $this->Dashboard_model->pesanan_terbaru();
        
        // Mengambil data penjualan
        $data['sales'] = $this->Dashboard_model->get_sales_data();

        // Memuat tampilan dashboard dengan data yang sudah diambil
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }

    /**
     * Menampilkan halaman detail pesanan berdasarkan ID pesanan.
     *
     * @param int $id ID dari pesanan yang ingin ditampilkan detailnya.
     */
}

