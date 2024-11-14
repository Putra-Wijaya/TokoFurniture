<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        $this->output->enable_profiler(TRUE);
        // $this->load->view('templates_admin/sidebar');
    }
}
