<?php

/**
 * Model_kategori
 */
class Model_kategori extends CI_Model{    
    /**
     * data_pedas
     *
     * @return void
     */
    public function data_pedas(){
        return $this->db->get_where('barang', array('kategori' => 'Snack Pedas'));
    }
        
    /**
     * data_manis
     *
     * @return void
     */
    public function data_manis(){
        return $this->db->get_where('barang', array('kategori' => 'Snack Manis'));
    }
    
    /**
     * FurnitureRuangMakan
     *
     * @return void
     */
    public function FurnitureRuangMakan(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Ruang Makan'));
    }
    
    /**
     * FurnitureRuangTamu
     *
     * @return void
     */
    public function FurnitureRuangTamu(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Ruang Tamu'));
    }
    
    /**
     * FurnitureKamarTidur
     *
     * @return void
     */
    public function FurnitureKamarTidur(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Kamar Tidur'));
    }
    
    /**
     * FurnitureKantor
     *
     * @return void
     */
    public function FurnitureKantor(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Kantor'));
    }
    
    /**
     * FurnitureDapurdanPantry
     *
     * @return void
     */
    public function FurnitureDapurdanPantry(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Dapur dan Pantry'));
    }
	
	/**
	 * AksesorisdanDekorasi
	 *
	 * @return void
	 */
	public function AksesorisdanDekorasi(){
        return $this->db->get_where('barang', array('kategori' => 'Aksesoris dan Dekorasi'));
    }
	
	/**
	 * FurnitureMultifungsi
	 *
	 * @return void
	 */
	public function FurnitureMultifungsi(){
        return $this->db->get_where('barang', array('kategori' => 'Furniture Multifungsi'));
    }
}
