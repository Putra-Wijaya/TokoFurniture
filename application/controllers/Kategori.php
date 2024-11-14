<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kategori
 */
class Kategori extends CI_Controller{
       
	public function __construct(){
		parent::__construct();

		// aktifkan saat membutuhkan profilinf
			// untuk pengecekan Profiling 
			// $this->output->enable_profiler(TRUE);

		// Memuat helper URL
		$this->load->helper('url');
	}
		/**
     * FurnitureRuangTamu
     *
     * @return void
     */
    public function FurnitureRuangTamu()
    {
        $data['FurnitureRuangTamu'] = $this->Model_kategori->FurnitureRuangTamu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureRuangTamu', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * FurnitureKamarTidur
     *
     * @return void
     */
    public function FurnitureKamarTidur()
    {
        $data['FurnitureKamarTidur'] = $this->Model_kategori->FurnitureKamarTidur()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureKamarTidur', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * FurnitureRuangMakan
     *
     * @return void
     */
    public function FurnitureRuangMakan()
    {
        $data['FurnitureRuangMakan'] = $this->Model_kategori->FurnitureRuangMakan()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureRuangMakan', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * FurnitureKantor
     *
     * @return void
     */
    public function FurnitureKantor()
    {
        $data['FurnitureKantor'] = $this->Model_kategori->FurnitureKantor()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureKantor', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * FurnitureDapurdanPantry
     *
     * @return void
     */
    public function FurnitureDapurdanPantry()
    {
        $data['FurnitureDapurdanPantry'] = $this->Model_kategori->FurnitureDapurdanPantry()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureDapurdanPantry', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * AksesorisdanDekorasi
     *
     * @return void
     */
    public function AksesorisdanDekorasi()
    {
        $data['AksesorisdanDekorasi'] = $this->Model_kategori->AksesorisdanDekorasi()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('AksesorisdanDekorasi', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * FurnitureMultifungsi
     *
     * @return void
     */
    public function FurnitureMultifungsi()
    {
        $data['FurnitureMultifungsi'] = $this->Model_kategori->FurnitureMultifungsi()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('FurnitureMultifungsi', $data);
        $this->load->view('templates/footer');
    }
}
