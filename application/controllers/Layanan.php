<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller {
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
        $this->load->model('layanan_model');
        $data['list'] = $this->layanan_model->getListLayanan();
        //print_r($data);
        $this->header();
        $this->load->view('layanan/home_layanan',$data);
        $this->load->view('design/footer');
    }

    public function tambah()
    {
        $this->header();
        $this->load->view('layanan/add_layanan');
        $this->load->view('design/footer');
    }

    public function add()
    {
        $nama_layanan = $this->input->post('namalayanan');
        $this->load->model('layanan_model');
        
        if($this->layanan_model->addLayanan($nama_layanan))
        {
              echo '<script language="javascript">';
              echo 'alert("Layanan berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('layanan') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan layanan. Layanan yang ditambahkan telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function edit($id)
    {
        $id = urldecode($id);
        $this->load->model('layanan_model');
        $data['result'] = $this->layanan_model->editLayanan($id);
        $this->header();
        $this->load->view('layanan/edit_layanan', $data);
        $this->load->view('design/footer');
    }

    public function update($id)
    {
        $id = urldecode($id);
        $nama_layanan = $this->input->post('namalayanan');
        $this->load->model('layanan_model');
        if($this->layanan_model->updateLayanan($id, $nama_layanan))
        {
              echo '<script language="javascript">';
              echo 'alert("Layanan berhasil diupdate");';
              echo 'window.location.href = "' . site_url('layanan') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupdate layanan. Layanan telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function delete($id)
    {
        $id = urldecode($id);
        $this->load->model('layanan_model');
        $this->layanan_model->deleteLayanan($id);
        echo '<script language="javascript">';
        echo 'alert("Layanan berhasil dihapus");';
        echo 'window.location.href = "' . site_url('layanan') . '";';
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
