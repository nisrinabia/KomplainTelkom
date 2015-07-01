<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komplain extends CI_Controller{
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
    		'nama'       => $this->session->userdata('nama_lengkap'),
			'username'   => $this->session->userdata('username'),
			'jabatan'    => $this->session->userdata('jabatan')
		);

        $this->load->model('jenis_komplain_model');
        $this->load->model('media_model');
        $this->load->model('layanan_model');

        $data['jenis_komplain'] = $this->jenis_komplain_model->getJeniskomp();
        $data['nama_media'] = $this->media_model->getJenisMedia();
        $data['nama_layanan'] = $this->layanan_model->getJenisLayanan();

        $this->load->view('design/header', $data);
        $this->load->view('komplain/add_komplain');
        $this->load->view('design/footer');
    }

    public function addKomplain(){
        $nopots = $this->input->post('nopots');

        $datakomplain = array(
            'NO_POTS'           => $this->input->post('nopots'),
            'NO_INTERNET'       => $this->input->post('noinet'),
            'NAMA_PELAPOR'      => $this->input->post('nama'),
            'ALAMAT_PELAPOR'    => $this->input->post('alamat'),
            'ID_MEDIA'          => $this->input->post('idmedia'),
            'ID_LAYANAN'        => $this->input->post('idlayanan'),
            'ID_JENIS_KOMPLAIN' => $this->input->post('idjeniskomplain'),
            'TGL_KOMPLAIN'      => $this->input->post('tglkomplain'),
            'TGL_CLOSE'         => $this->input->post('tglclosed'),
            'KELUHAN'           => $this->input->post('keluhan'),
            'SOLUSI'            => $this->input->post('solusi'),
            'STATUS_KOMPLAIN'   => $this->input->post('statuskomplain'),
            'KETERANGAN'        => $this->input->post('ket'),
            'DEADLINE'          => $this->input->post('tanggal')          
        );
        $this->load->model('komplain_model');

        if($this->komplain_model->addKomplain($datakomplain))
        {
              echo '<script language="javascript">';
              echo 'alert("Data berhasil dimasukkan");';
              //echo 'window.location.href = "' . site_url('users/showlist') . '";';
              //echo 'window.history.back();';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal memasukkan data");';
              //echo 'window.history.back();';
              echo '</script>';
        }

        $this->showKomplain($nopots);
    }

    public function showKomplain($nopots){
        $data = array(
            'nama'       => $this->session->userdata('nama_lengkap'),
            'username'   => $this->session->userdata('username'),
            'jabatan'    => $this->session->userdata('jabatan')
        );
        $this->load->model('komplain_model');
        $data['list'] = $this->komplain_model->showKomplain($nopots);
        //print_r($data);
        $this->load->view('design/header', $data);
        $this->load->view('komplain/show_komplain',$data);
        $this->load->view('design/footer');
    }   
}