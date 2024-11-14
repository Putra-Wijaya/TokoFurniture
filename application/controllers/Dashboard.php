<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard
 */
class Dashboard extends CI_Controller{
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();

		// aktifkan saat membutuhkan profiling
			// untuk pengecekan Profiling 
			// $this->output->enable_profiler(TRUE);
			// Caching view bagian tertentu
			// $this->output->cache(10);  // Cache halaman selama 10 menit

        if($this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('auth/login');
        }
    }
    
    /**
     * belanja
     *
     * @return void
     */
    public function belanja()
    {
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('belanja', $data  );
		$this->load->view('templates/footer');

    }
    
    /**
     * tambah_ke_keranjang
     *
     * @param  mixed $id
     * @return void
     */
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Model_barang->find($id);
        $data = array(
                'id'      => $barang->id_barang,
                'qty'     => 1,
                'price'   => $barang->harga,
                'name'    => $barang->nama_barang,
                'gambar'  => '/uploads/' . $barang->gambar,
        );
        
        $this->cart->insert($data);
        redirect('dashboard/belanja');
    }
    
    /**
     * detail_keranjang
     *
     * @return void
     */
    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    
    /**
     * hapus_keranjang
     *
     * @return void
     */
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }
    
    /**
     * hapus_item
     *
     * @param  mixed $rowid
     * @return void
     */
    public function hapus_item($rowid) 
    {
		// Hapus item dari keranjang berdasarkan rowid
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0 // Set quantity menjadi 0 untuk menghapus item
		);

		$this->cart->update($data); // Perbarui keranjang

		// Redirect kembali ke halaman keranjang setelah item dihapus
		redirect('dashboard/detail_keranjang');
    }
	
	/**
	 * update_keranjang
	 *
	 * @return void
	 */
	public function update_keranjang()
	{
		// Mengambil `rowid` dan perubahan jumlah `qty` dari permintaan POST
		$rowid = $this->input->post('rowid');
		$qtyChange = $this->input->post('qty');
	
		// Ambil data item di keranjang berdasarkan rowid
		$item = $this->cart->get_item($rowid);
	
		if ($item) {
			// Menghitung jumlah baru dengan perubahan
			$new_qty = $item['qty'] + $qtyChange;
	
			// Pastikan jumlah minimal adalah 1
			if ($new_qty < 1) {
				$new_qty = 1;
			}
	
			// Update jumlah item di keranjang
			$this->cart->update(array(
				'rowid' => $rowid,
				'qty'   => $new_qty
			));
	
			// Dapatkan data item yang diperbarui
			$updated_item = $this->cart->get_item($rowid);
			$subtotal = $updated_item['subtotal'];
			$total = $this->cart->total();
	
			// Kirim data dalam format JSON untuk AJAX
			echo json_encode(array(
				'status'   => 'success',
				'qty'      => $new_qty,
				'subtotal' => number_format($subtotal, 0, ',', '.'),
				'total'    => number_format($total, 0, ',', '.')
			));
		} else {
			// Respon jika item tidak ditemukan
			echo json_encode(array('status' => 'error', 'message' => 'Item tidak ditemukan.'));
		}
	}
	
    
    /**
     * pembayaran
     *
     * @return void
     */
    public function pembayaran()
    {
		// $this->output->enable_profiler(TRUE);
		$keranjang = $this->cart->contents();
		$grand_total = 0;
	
		foreach ($keranjang as $item) {
			$grand_total += $item['subtotal'];
		}
	
		$data = [
			'keranjang' => $keranjang,
			'grand_total' => $grand_total
		];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran',$data);
        $this->load->view('templates/footer');
    }

	 // Fungsi untuk memproses pesanan	 
	 /**
	  * proses_pesanan
	  *
	  * @return void
	  */
	 public function proses_pesanan()
	 {
		 // Ambil data dari form
		 $nama = $this->input->post('nama');
		 $alamat = $this->input->post('alamat');
		 $no_telp = $this->input->post('no_telp');
		 $bank = $this->input->post('bank');
		 $grand_total = 0;
		 
		 // Ambil data keranjang belanja
		 $keranjang = $this->cart->contents();
		 
		 // Cek jika keranjang belanja tidak kosong
		 if (!empty($keranjang)) {
			 // Mulai transaksi
			 $this->db->trans_start();
 
			 // Masukkan data invoice ke tabel invoice
			 $data_invoice = [
				 'nama' => $nama,
				 'alamat' => $alamat,
				 'tgl_pesan' => date('Y-m-d H:i:s'),
				 'no_telp' => $no_telp,
				 'bukti_pembayaran' => $this->_upload_bukti_pembayaran() // Upload bukti pembayaran
			 ];
			 $this->db->insert('invoice', $data_invoice);
			 $id_invoice = $this->db->insert_id(); // Ambil ID invoice yang baru saja disimpan
 
			 // Simpan data pesanan ke tabel pesanan
			 foreach ($keranjang as $item) {
				 $total_harga = $item['subtotal'];
				 
				 // Masukkan data pesanan
				 $data_pesanan = [
					 'id_invoice' => $id_invoice,
					 'id_barang' => $item['id'],
					 'nama_barang' => $item['name'],
					 'jumlah' => $item['qty'],
					 'harga' => $item['price'],
					 'tanggal' => date('Y-m-d H:i:s')
				 ];
 
				 $this->db->insert('pesanan', $data_pesanan);
 
				 // Update stok barang setelah pemesanan
				 $this->Model_barang->kurangi_stok($item['id'], $item['qty']);
			 }
 
			 // Commit transaksi
			 $this->db->trans_complete();
 
			 // Jika transaksi sukses
			 if ($this->db->trans_status() === TRUE) {
				 // Kosongkan keranjang belanja setelah pembayaran sukses
				 $this->cart->destroy();
 
				 // Set pesan sukses
				 $this->session->set_flashdata('success', 'Pesanan Anda berhasil diproses.');
				 redirect('dashboard/pembayaran'); // Redirect ke halaman konfirmasi
			 } else {
				 // Jika terjadi kesalahan
				 $this->db->trans_rollback();
				 $this->session->set_flashdata('error', 'Terjadi kesalahan, pesanan gagal diproses.');
				 redirect('dashboard/pembayaran'); // Redirect kembali ke halaman checkout
			 }
		 } else {
			 // Jika keranjang kosong
			 $this->session->set_flashdata('error', 'Keranjang belanja kosong.');
			 redirect('dashboard/pembayaran'); // Redirect ke halaman keranjang
		 }
	 }
 
	 // Fungsi untuk meng-upload bukti pembayaran	 
	 /**
	  * _upload_bukti_pembayaran
	  *
	  * @return void
	  */
	 private function _upload_bukti_pembayaran()
	 {
		 // Konfigurasi upload file
		 $config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'jpg|png|jpeg|gif';
		 $config['max_size'] = 2048; // Maksimal 2MB
 
		 $this->load->library('upload', $config);
 
		 if ($this->upload->do_upload('userfile')) {
			 $data = $this->upload->data();
			 return $data['file_name']; // Mengembalikan nama file yang berhasil di-upload
		 } else {
			 return null; // Jika upload gagal
		 }
	}



    /**
     * proses_pesanan
     *
     * @return void
     */
    // public function proses_pesanan()
    // {
    //     $is_processed = $this->Model_invoice->index();
    //     if($is_processed){
    //         $this->cart->destroy();
    //         $this->load->view('templates/header');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view('keranjang');
    //         $this->load->view('templates/footer');
    //     } else {
    //         echo "Maaf Pesanan Anda Gagal diproses!";
    //     }
        
    // }
    


    /**
     * detail
     *
     * @param  mixed $id_barang
     * @return void
     */
    public function detail($id_barang)
    {
        $data['barang'] = $this->Model_barang->detail_brg($id_barang);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
}
