<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE)
		{
			redirect('auth');
		}
    }    
    
    public function index() {        
    	$data = array(
    		'nama' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'jabatan' => $this->session->userdata('jabatan')
		);

        $this->load->model('dashboard_model');
        $data['komplain'] = $this->dashboard_model->getStatsKomplain();
        $data['layanan'] = $this->dashboard_model->getStatsLayanan();
        $data['jenis'] = $this->dashboard_model->getStatsJenis();
        $data['media'] = $this->dashboard_model->getStatsMedia();
        $data['janjiall'] = $this->dashboard_model->getStatsJanjiAll();
        $data['janjipast'] = $this->dashboard_model->getStatsJanjiPast();
        $data['janjioneday'] = $this->dashboard_model->getStatsJanjiOneDay();
        $data['janjibefore'] = $this->dashboard_model->getStatsJanjiBefore();
        
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
