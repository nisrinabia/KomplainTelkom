<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coba extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }    
    
    public function index() {        
        $data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );
        $this->load->view('design/header', $data);
        $this->load->view('tanggal');
        $this->load->view('design/footer');
    }
    function printku() {        
        echo $this->input->post('tanggal');
    }
}
