<?php

use PHPUnit\Framework\TestCase;

class DataBarangTest extends TestCase
{
    private $CI;

    public function setUp(): void
    {
        // Dapatkan instance CodeIgniter
        $this->CI = &get_instance();

        // Load model, library, helper, dan controller yang akan diuji
        $this->CI->load->model('model_barang');
        $this->CI->load->library('session');
        $this->CI->load->helper('url');

        require_once(APPPATH . 'controllers/Data_barang.php');
        $this->CI->data_barang = new Data_barang();
    }

}
