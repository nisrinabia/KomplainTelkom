<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE)
		{
            $this->load->helper('url');
            $current_uri = base_url(uri_string());
            $encoded_url = urlencode($current_uri);
            $redirect_to = 'auth?ref='.$encoded_url;
            redirect($redirect_to);
		}
    }    
    
    public function index() {        
    	$data = array(
    		'nama' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'jabatan' => $this->session->userdata('jabatan')
		);

        $this->load->model('dashboard_model');
        $data['komplain'] = $this->dashboard_model->getStatsHardKomplain();
        $data['gangguan'] = $this->dashboard_model->getStatsGangguan();
        $data['psb'] = $this->dashboard_model->getStatsPSB();
        
        $this->load->view('design/header', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('design/footer');
    }

    public function errorPage()
    {
        $data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );
        $this->load->view('design/header', $data);
        $this->load->view('errors/error');
        $this->load->view('design/footer');
    }
}
