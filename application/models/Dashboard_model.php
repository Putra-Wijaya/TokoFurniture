<?php

/**
 * Class Dashboard_model
 * 
 * Kelas ini berfungsi untuk mengambil data terkait dengan dashboard admin, seperti total pendapatan, pelanggan, barang, penjualan, dan pesanan terbaru.
 * Ini menggunakan model CodeIgniter untuk berinteraksi dengan database.
 */
class Dashboard_model extends CI_Model {
    
    /**
     * getTotalPendapatan
     * 
     * @return string Total pendapatan dalam format Rupiah.
     */
    public function getTotalPendapatan() {
        // Memilih kolom jumlah yang dikalikan dengan harga untuk menghitung total pendapatan
        $this->db->select('SUM(jumlah * harga) AS total_pendapatan');
        
        // Menjalankan query untuk mendapatkan total pendapatan dari tabel 'pesanan'
        $total_pendapatan = $this->db->get('pesanan')->row()->total_pendapatan;
        
        // Memformat total pendapatan dalam format Rupiah dan mengembalikannya
        return $this->formatRupiah($total_pendapatan);
    }
    
    /**
     * getTotalPelanggan
     * 
     * Fungsi ini menghitung jumlah pelanggan dengan `role_id` 2 (misalnya pelanggan).
     * Mengambil data dari tabel 'user'.
     *
     * @return int Jumlah pelanggan.
     */
    public function getTotalPelanggan() {
        // Menambahkan kondisi untuk memilih user dengan role_id = 2
        $this->db->where('role_id', 2);
        
        // Menghitung jumlah baris yang memenuhi kriteria (jumlah pelanggan)
        return $this->db->count_all_results('user'); 
    }
    
    /**
     * getTotalBarang
     * 
     * Fungsi ini menghitung jumlah barang yang ada di tabel 'barang'.
     *
     * @return int Jumlah barang yang tersedia.
     */
    public function getTotalBarang() {
        // Menghitung jumlah seluruh barang yang ada di tabel 'barang'
        return $this->db->count_all('barang');
    }
    
    /**
     * getTotalPenjualan
     * 
     * Fungsi ini menghitung total jumlah barang yang terjual.
     * Mengambil data dari tabel 'pesanan'.
     *
     * @return int Jumlah total barang yang terjual.
     */
    public function getTotalPenjualan() {
        // Menggunakan fungsi SUM untuk menghitung total jumlah barang yang terjual
        $this->db->select_sum('jumlah');
        
        // Menjalankan query dan mengembalikan hasil jumlah
        return $this->db->get('pesanan')->row()->jumlah;
    }
    
    /**
     * formatRupiah
     * 
     * Fungsi ini digunakan untuk memformat nominal dalam format Rupiah (contoh: Rp 1.000.000).
     *
     * @param  mixed $nominal Nilai nominal yang ingin diformat.
     * @return string Nominal yang diformat dalam format Rupiah.
     */
    private function formatRupiah($nominal) {
        // Memformat nominal sebagai mata uang Rupiah
        return 'Rp ' . number_format($nominal, 0, ',', '.');
    }
    
    /**
     * get_all_orders
     * 
     * Fungsi ini mengambil semua data pesanan dari tabel 'pesanan'.
     *
     * @return array Daftar semua pesanan.
     */
    public function get_all_orders() {
        // Menjalankan query untuk mengambil seluruh data pesanan
        $query = $this->db->get('pesanan');
        
        // Mengembalikan hasil query dalam bentuk array
        return $query->result();
    }
    
    /**
     * get_order_by_id
     * 
     * Fungsi ini mengambil detail pesanan berdasarkan ID pesanan.
     *
     * @param  mixed $id ID pesanan yang ingin diambil.
     * @return object Data pesanan yang sesuai dengan ID.
     */
    public function get_order_by_id($id) {
        // Menambahkan kondisi untuk mencari pesanan berdasarkan ID
        $this->db->where('id', $id);
        
        // Menjalankan query untuk mendapatkan data pesanan berdasarkan ID
        $query = $this->db->get('pesanan');
        
        // Mengembalikan hasil query yang berupa satu baris data (pesanan)
        return $query->row(); 
    }
    
    /**
     * get_sales_data
     * 
     * Fungsi ini mengambil data penjualan berdasarkan bulan, dengan total penjualan per bulan.
     * Menggunakan grup data berdasarkan bulan untuk analisis penjualan.
     *
     * @return array Data penjualan per bulan.
     */
    public function get_sales_data() {
        // Memilih data bulan dan total penjualan berdasarkan bulan
        $this->db ->select("MONTH(tanggal) as month, DATE_FORMAT(tanggal, '%M')as month_name, SUM(jumlah * harga)as total ");
        $this->db->from("pesanan");
        
        // Mengelompokkan data berdasarkan bulan
        $this->db->group_by("MONTH(tanggal)");
        
        // Menjalankan query untuk mendapatkan data penjualan
        $query = $this->db->get();
        
        // Mengembalikan hasil query dalam bentuk array
        return $query->result_array();
    }
    
    /**
     * pesanan_terbaru
     * 
     * Fungsi ini mengambil daftar pesanan terbaru dengan opsi untuk membatasi jumlah pesanan yang ditampilkan.
     * Menggunakan join untuk menggabungkan data pesanan dan bukti pembayaran dari tabel 'invoice'.
     *
     * @param  mixed $limit Jumlah pesanan terbaru yang ingin ditampilkan (default 5).
     * @return array Daftar pesanan terbaru.
     */
    public function pesanan_terbaru($limit = 5) {
        // Memilih data pesanan dan bukti pembayaran dari tabel yang digabungkan
        $this->db->select('pesanan.*, invoice.bukti_pembayaran');
        $this->db->from('pesanan');
        $this->db->join('invoice', 'pesanan.id_invoice = invoice.id_invoice', 'left');
        
        // Mengurutkan data berdasarkan tanggal pesanan (desc)
        $this->db->order_by('pesanan.tanggal', 'DESC');
        
        // Membatasi hasil query sesuai dengan limit yang diberikan
        $this->db->limit($limit);
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->db->get()->result();
    }
    
}

