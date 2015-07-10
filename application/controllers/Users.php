<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('login') != TRUE)
        {
          $this->load->helper('url');
          $current_uri = base_url(uri_string());
          $redirect_to = 'auth?ref='.$current_uri;
          redirect($redirect_to);
        }
        else if($this->session->userdata('jabatan') != "Admin")
        {
          redirect('dashboard');
        }
    }    
    
    public function index() {        
        $this->header();
        $this->load->view('manajemen_user/add_user');
        $this->load->view('design/footer');
    }

    public function add() {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $data = array(
            'NAMA_LENGKAP' => $this->input->post('nama'),
            'USERNAME' => $username,
            'PASSWORD' => md5($pass),
             'JABATAN' => $this->input->post('jabatan'));
        $this->load->model('akun');
        
        if($this->akun->tambahUser($username, $data))
        {
              echo '<script language="javascript">';
              echo 'alert("Akun berhasil ditambahkan");';
              echo 'window.location.href = "' . site_url('users/showlist') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal menambahkan akun. Username telah terpakai");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    public function showlist() {        
        $this->load->model('akun');
        $data['list'] = $this->akun->getListUser();
        $this->header();
        $this->load->view('manajemen_user/all_user', $data);
        $this->load->view('design/footer');
    }

    public function delete($id) {
        $this->load->model('akun');
        $this->akun->delete($id);
        echo '<script language="javascript">';
        echo 'alert("Akun berhasil dihapus");';
        echo 'window.location.href = "' . site_url('users/showlist') . '";';
        echo '</script>';
    }

    public function edit($id) {
        $this->load->model('akun');
        $data['result'] = $this->akun->edit($id);
        $this->header();
        $this->load->view('manajemen_user/edit_user', $data);
        $this->load->view('design/footer');
    }

    public function update($id) {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $passAwal = $this->input->post('passAwal');
        $data = array(
            'NAMA_LENGKAP' => $this->input->post('nama'),
            'USERNAME' => $username,
             'JABATAN' => $this->input->post('jabatan'));
        if($pass != $passAwal){
          $data['PASSWORD'] = md5($pass);
        }
        $this->load->model('akun');
        if($this->akun->update($id, $username, $data))
        {
              echo '<script language="javascript">';
              echo 'alert("Akun berhasil diupdate");';
              echo 'window.location.href = "' . site_url('users/showlist') . '";';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupdate akun. Username telah terpakai");';
              echo 'window.history.back();';
              echo '</script>';
        }
    }

    function header(){
      $data = array(
            'nama' => $this->session->userdata('nama_lengkap'),
            'username' => $this->session->userdata('username'),
            'jabatan' => $this->session->userdata('jabatan')
        );
        $this->load->view('design/header', $data);
    }

}
