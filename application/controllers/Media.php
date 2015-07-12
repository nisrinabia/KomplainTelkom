<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {
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
    
    public function index()
    {
        $this->load->model('media_model');
        $data['list'] = $this->media_model->getListMedia();
        //print_r($data);
        $this->header();
        $this->load->view('media/home_media',$data);
        $this->load->view('design/footer');
    }

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
        $id = urldecode($id);
        //echo $id;
        $this->load->model('media_model');
        $data['result'] = $this->media_model->editMedia($id);
        $this->header();
        $this->load->view('media/edit_media', $data);
        $this->load->view('design/footer');
    }

    public function update($id)
    {
        $id = urldecode($id);
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
        $id = urldecode($id);
        $this->load->model('media_model');
        $this->media_model->deleteMedia($id);
        echo '<script language="javascript">';
        echo 'alert("Media berhasil dihapus");';
        echo 'window.location.href = "' . site_url('media') . '";';
        echo '</script>';
    }
    
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
