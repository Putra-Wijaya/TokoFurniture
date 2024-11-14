<?php

/**
 * Model_barang
 */
class Model_barang extends CI_Model{
    
    /**
     * tampil_data
     *
     * @return void
     */
    public function tampil_data(){
        return $this->db->get('barang');
    }
    
    /**
     * tambah_barang
     *
     * @param  mixed $data
     * @param  mixed $table
     * @return void
     */
    public  function tambah_barang($data, $table){
        $this->db->insert($table, $data);
    }
    
    /**
     * edit_barang
     *
     * @param  mixed $where
     * @param  mixed $table
     * @return void
     */
    public function edit_barang($where, $table){
        return $this->db->get_where($table, $where);
    }
    
    /**
     * update_data
     *
     * @param  mixed $where
     * @param  mixed $data
     * @param  mixed $table
     * @return void
     */
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    /**
     * hapus_data
     *
     * @param  mixed $where
     * @param  mixed $table
     * @return void
     */
    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        $result = $this->db->where('id_barang', $id)
                           ->limit(1)
                           ->get('barang');
        if($result->num_rows() > 0){
            return $result->row();
        }else {
            return array();
        }
    }
    
    /**
     * detail_brg
     *
     * @param  mixed $id_barang
     * @return void
     */
    public function detail_brg($id_barang) 
	{
		$result = $this->db->where('id_barang', $id_barang)->get('barang');
		if ($result -> num_rows() > 0) {
			return $result -> result();
		} else {
			return false;
		}
	}
}
