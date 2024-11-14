<?php

/**
 * Model_Invoice
 */
class Model_Invoice extends CI_Model {
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        // Set default timezone
        date_default_timezone_set('Asia/Jakarta');
    }
	
	/**
	 * index
	 *
	 * @return void
	 */
	public function index() {
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
	
		// Validasi input
		if (empty($nama) || empty($alamat) || empty($no_telp)) {
			return false; 
		}
	
		$config['upload_path'] = './uploads/'; // Pastikan folder ini ada dan dapat ditulisi
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048; // Max size 2MB
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			redirect('dashboard');
			return false; 
		} else {
			$upload_data = $this->upload->data();
			$bukti_pembayaran = $upload_data['file_name'];
		}
	
		$invoice = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			'bukti_pembayaran' => $bukti_pembayaran 
		);
	
		$this->db->insert('invoice', $invoice);
		$id_invoice = $this->db->insert_id();
	
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_invoice' => $id_invoice,
				'id_barang' => $item['id'],
				'nama_barang' => $item['name'],
				'jumlah' => $item['qty'],
				'harga' => $item['price'],
			);
			$this->db->insert('pesanan', $data);
		}
		return true;
	}
	
    
    /**
     * tampil_data
     *
     * @return void
     */
    public function tampil_data() {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result(); 
        } else {
            return [];
        }
    }
    
    /**
     * ambil_id_invoice
     *
     * @param  mixed $id_invoice
     * @return void
     */
    public function ambil_id_invoice($id_invoice) {
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row(); 
        } else {
            return false; 
        }
    }
    
    /**
     * ambil_id_pesanan
     *
     * @param  mixed $id_invoice
     * @return void
     */
    public function ambil_id_pesanan($id_invoice) {
        $result = $this->db->where('id_invoice', $id_invoice)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result(); 
        } else {
            return []; 
        }
    }
	
}
