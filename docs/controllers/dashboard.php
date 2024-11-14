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
        $data['barang'] = $this->model_barang->tampil_data()->result();
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
        $barang = $this->model_barang->find($id);
        $data = array(
                'id'      => $barang->id_barang,
                'qty'     => 1,
                'price'   => $barang->harga,
                'name'    => $barang->nama_barang
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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    
    /**
     * proses_pesanan
     *
     * @return void
     */
    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('keranjang');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf Pesanan Anda Gagal diproses!";
        }
        
    }
    
    /**
     * detail
     *
     * @param  mixed $id_barang
     * @return void
     */
    public function detail($id_barang)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_barang);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
}
