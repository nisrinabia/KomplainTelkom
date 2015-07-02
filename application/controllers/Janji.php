<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Janji extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE)
        {
            redirect('auth');
        }
    }
    
    public function index()
    {
        $mode = "all";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListJanji($mode);
        //print_r($data);
        $this->header();
        $this->load->view('janji/home_janji',$data);
        $this->load->view('design/footer');
    }

    public function filterall()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $mode = "all";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListFilterJanji($mode, $bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        //print_r($data);
        $this->header();
        $this->load->view('janji/filter_janji',$data);
        $this->load->view('design/footer');
    }

    public function lihat()
    {
        //$this->load->model('janji_model');
        //$data['komplain'] = $this->janji_model->getInfoKomplain($id);
        //print_r($data);
        $this->header();
        $this->load->view('janji/view_janji');
        $this->load->view('design/footer');
    }


/*
    public function tambah()
    {
        $this->header();
        $this->load->view('media/add_media');
        $this->load->view('design/footer');
    }

    public function add()
    {
        $nama_media = $this->input->post('namamedia');
        //echo $nama_media;
        $this->load->model('media_model');
        
        if($this->media_model->addMedia($nama_media))
        {
              echo '<script language="javascript">';
              echo 'alert("Media berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('media') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan media. Media yang ditambahkan telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function edit($id)
    {
        $this->load->model('media_model');
        $data['result'] = $this->media_model->editMedia($id);
        $this->header();
        $this->load->view('media/edit_media', $data);
        $this->load->view('design/footer');
    }

    public function update($id)
    {
        $nama_media = $this->input->post('namamedia');
        $this->load->model('media_model');
        if($this->media_model->updateMedia($id, $nama_media))
        {
              echo '<script language="javascript">';
              echo 'alert("Media berhasil diupdate");';
              echo 'window.location.href = "' . site_url('media') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupdate media. Media telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function delete($id)
    {
        $this->load->model('media_model');
        $this->media_model->deleteMedia($id);
        echo '<script language="javascript">';
        echo 'alert("Media berhasil dihapus");';
        echo 'window.location.href = "' . site_url('media') . '";';
        echo '</script>';
    }*/
    
    function header()
    {
      $data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );
        $this->load->view('design/header', $data);
    }
}
