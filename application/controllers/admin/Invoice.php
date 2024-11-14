<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use Mpdf\Mpdf;

/**
 * Class Invoice
 * Controller untuk mengelola data invoice, termasuk menampilkan, menampilkan detail, 
 * serta mengekspor data invoice ke dalam format PDF dan Excel.
 */
class Invoice extends CI_Controller {
        
    /**
     * Constructor
     * Memastikan pengguna sudah login dan memiliki role yang sesuai, serta memuat model yang diperlukan.
     */
    public function __construct() {
        parent::__construct();

		$this->load->library('session');

        // Pastikan pengguna sudah login dan memiliki role ID yang sesuai
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('auth/login');
        }

        // Muat model yang diperlukan
        $this->load->model('Model_invoice');
    }
    
    /**
     * index
     * Menampilkan halaman utama dengan daftar invoice.
     */
    public function index() {
        $data['invoice'] = $this->Model_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }
    
    /**
     * detail
     * Menampilkan detail dari suatu invoice berdasarkan ID.
     * 
     * @param int $id_invoice ID dari invoice yang ingin ditampilkan detailnya.
     */
    public function detail($id_invoice) {
        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);

        if (!$data['invoice']) {
            show_404();
        }

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }
	
	/**
	 * export_pdf
	 * Mengekspor detail invoice ke dalam format PDF.
	 * 
	 * @param int $id_invoice ID dari invoice yang akan diekspor.
	 */
	public function export_pdf($id_invoice) {
		// Mengambil data invoice dan pesanan berdasarkan id_invoice
		$data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
	
		// Memeriksa apakah invoice ditemukan
		if (!$data['invoice']) {
			show_404();
		}
	
		// Menggunakan mPDF
		ob_end_clean(); // Menghapus buffer output sebelumnya
		$mpdf = new \Mpdf\Mpdf();
	
		// Memuat tampilan untuk PDF dan mengonversinya menjadi HTML
		$html = $this->load->view('admin/invoice_pdf_view', $data, TRUE);
	
		// Menulis HTML ke mPDF dalam blok try-catch
		try {
			$mpdf->WriteHTML($html);
			$mpdf->Output('invoice_'.$id_invoice.'.pdf', 'D'); 
		} catch (\Mpdf\MpdfException $e) {
			log_message('error', $e->getMessage());
			show_error('Terjadi kesalahan saat memproses PDF: ' . $e->getMessage());
		}
	}
}
