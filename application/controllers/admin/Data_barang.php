<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Data_barang
 * Controller untuk mengelola data barang, termasuk menampilkan, menambah, mengedit, memperbarui, dan menghapus data barang.
 */
class Data_barang extends CI_Controller
{
    /**
     * Constructor
     * Memeriksa apakah pengguna sudah login sebagai admin (role_id = 1). 
     * Jika tidak, pengguna akan diarahkan ke halaman login dengan pesan error.
     */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('auth/login');
        }
    }

    /**
     * index
     * Menampilkan halaman utama data barang, termasuk semua data barang yang ada di database.
     */
    public function index()
    {
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    /**
     * tambah_aksi
     * Menambahkan data barang baru ke dalam database.
     * Data yang ditambahkan meliputi nama barang, keterangan, kategori, harga, stok, dan gambar.
     */
    public function tambah_aksi()
    {
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        
        if ($gambar != '') {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_barang' => $nama_barang,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        );

        $this->Model_barang->tambah_barang($data, 'barang');
        redirect('admin/data_barang/index');
    }

    /**
     * edit
     * Mengambil data barang yang akan diedit berdasarkan ID.
     * @param int $id ID barang yang akan diedit.
     */
    public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['barang'] = $this->Model_barang->edit_barang($where, 'barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    /**
     * update
     * Memperbarui data barang yang ada di database.
     * Data yang diperbarui meliputi nama barang, keterangan, kategori, harga, dan stok.
     */
    public function update()
    {
        $id = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_barang' => $nama_barang,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );

        $where = array('id_barang' => $id);
        $this->Model_barang->update_data($where, $data, 'barang');
        redirect('admin/data_barang/index');
    }

    /**
     * hapus
     * Menghapus data barang berdasarkan ID.
     * Termasuk menghapus data terkait dari tabel riwayat_stok.
     * @param int $id ID barang yang akan dihapus.
     */
    public function hapus($id)
    {
        if (!is_numeric($id)) {
            show_error('ID tidak valid');
        }

        // Hapus data terkait dari tabel riwayat_stok berdasarkan id_barang
        $this->db->where('id_barang', $id);
        $this->db->delete('riwayat_stok');

        $where = array('id_barang' => $id);

        if ($this->Model_barang->hapus_data($where, 'barang')) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data.');
        }

        redirect('admin/data_barang/index');
    }
}
