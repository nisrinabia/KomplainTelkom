<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_komplain extends CI_Controller {
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
        $this->load->model('jenis_komplain_model');
        $data['list'] = $this->jenis_komplain_model->getListJeniskomp();
        //print_r($data);
        $this->header();
        $this->load->view('jenis_komplain/home_jenis_komplain',$data);
        $this->load->view('design/footer');
    }

    public function tambah()
    {
        $this->header();
        $this->load->view('jenis_komplain/add_jenis_komplain');
        $this->load->view('design/footer');
    }

    public function add()
    {
        $nama_jenis_komplain = $this->input->post('jeniskomplain');
        $this->load->model('jenis_komplain_model');
        
        if($this->jenis_komplain_model->addJeniskomp($nama_jenis_komplain))
        {
              echo '<script language="javascript">';
              echo 'alert("Isian jenis komplain berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('jenis_komplain') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan jenis komplain. Jenis komplain yang ditambahkan telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function edit($id)
    {
        $this->load->model('jenis_komplain_model');
        $data['result'] = $this->jenis_komplain_model->editJeniskomp($id);
        $this->header();
        $this->load->view('jenis_komplain/edit_jenis_komplain', $data);
        $this->load->view('design/footer');
    }

    public function update($id)
    {
        $nama_jenis_komplain = $this->input->post('jeniskomplain');
        $this->load->model('jenis_komplain_model');
        if($this->jenis_komplain_model->updateJeniskomp($id, $nama_jenis_komplain))
        {
              echo '<script language="javascript">';
              echo 'alert("Jenis komplain berhasil diupdate");';
              echo 'window.location.href = "' . site_url('jenis_komplain') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupdate inputan jenis komplain. Jenis komplain telah terdaftar");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function delete($id)
    {
        $this->load->model('jenis_komplain_model');
        $this->jenis_komplain_model->deleteJeniskomp($id);
        echo '<script language="javascript">';
        echo 'alert("Jenis komplain berhasil dihapus");';
        echo 'window.location.href = "' . site_url('jenis_komplain') . '";';
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
