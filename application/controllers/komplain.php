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
    		'nama' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'jabatan' => $this->session->userdata('jabatan')
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

        $datakomplain = array(
            'NO_POTS'           => $this->input->post('no_pots'),
            'NO_INTERNET'       => $this->input->post('no_internet'),
            'NAMA_PELANGGAN'    => $this->input->post('nama_pelapor'),
            'ALAMAT_PELANGGAN'  => $this->input->post('alamat_pelapor'),
            'ID_MEDIA'          => $this->input->post('idmedia'),
            'ID_LAYANAN'        => $this->input->post('idlayanan'),
            'ID_JENIS_KOMPLAIN' => $this->input->post('idjeniskomplain'),
            'TGL_KOMPLAIN'      => $this->input->post('tglkomplain'),
            'TGL_CLOSE'         => $this->input->post('tglclosed'),
            'KELUHAN'           => $this->input->post('keluhan'),
            'SOLUSI'            => $this->input->post('solusi'),
            'STATUS_KOMPLAIN'   => $this->input->post('statuskomplain'),
            'KETERANGAN'        => $this->input->post('ket'),
            'DEADLINE'          => $this->input->post('deadline')          
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
        }
/*
    public function addKomplain($data) {
        $datapots = array(
            'NO_POTS'           => $this->input->post('no_pots'),
            'NO_INTERNET'       => $this->input->post('no_internet')
            );
        $this->load->model('pots_model');

        $datapelanggan = array(
            'NAMA_PELANGGAN'    => $this->input->post('nama_pelapor'),
            'ALAMAT_PELANGGAN'  => $this->input->post('alamat_pelapor')
            )   ;
        $this->load->model('pelanggan_model');

        $datakomplain = array(
            'ID_MEDIA'          => $this->input->post('nama_media'),
            'ID_LAYANAN'        => $this->input->post('nama_layanan'),
            'ID_JENIS_KOMPLAIN' => $this->input->post('jenis_komplain'),
            'TGL_KOMPLAIN'      => $this->input->post('tgl_komplain'),
            'TGL_CLOSE'         => $this->input->post('tgl_close'),
            'KELUHAN'           => $this->input->post('keluhan'),
            'SOLUSI'            => $this->input->post('solusi'),
            'STATUS_KOMPLAIN'   => $this->input->post('status_komplain'),
            'KETERANGAN'        => $this->input->post('keterangan'),
            'DEADLINE'          => $this->input->post('deadline')
            );
        $this->load->model('komplain_model');

        
        if($this->pots_model->addPots($datapots) && $this->pelanggan_model->addPelanggan($datapelanggan) && $this->komplain_model->addKomplain($datakomplain))
        {
              echo '<script language="javascript">';
              echo 'alert("Data berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('users/showlist') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan data");';
              echo 'window.history.back();';
              echo '</script>';
        }
    } */
}
