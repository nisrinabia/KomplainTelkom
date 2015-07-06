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
        //print_r($data['list']);
        $this->header();
        $this->load->view('janji/home_janji',$data);
        $this->load->view('design/footer');
    }

    public function lihat($id)
    {
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getDataJanji($id);
        $this->header();
        $this->load->view('janji/lihat_janji', $data);
        $this->load->view('design/footer');
    }

    public function filterall()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $mode = "all";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListFilterJanji($mode, $bulan, $tahun);
        $data['select'] = $this->janji_model->getListMenuTahun();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        //print_r($data);
        $this->header();
        $this->load->view('janji/filter_janji',$data);
        $this->load->view('design/footer');
    }

    public function lewat_deadline()
    {
        $mode = "past";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListJanji($mode);
        //print_r($data);
        $this->header();
        $this->load->view('janji/lewat_deadline',$data);
        $this->load->view('design/footer');
    }

    public function filterpast()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $mode = "past";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListFilterJanji($mode, $bulan, $tahun);
        $data['select'] = $this->janji_model->getListMenuTahun();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        //print_r($data);
        $this->header();
        $this->load->view('janji/filter_lewat_deadline',$data);
        $this->load->view('design/footer');
    }

    public function sehari_deadline()
    {
        $mode = "oneday";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListJanji($mode);
        //print_r($data);
        $this->header();
        $this->load->view('janji/sehari_deadline',$data);
        $this->load->view('design/footer');
    }

    public function filteroneday()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $mode = "oneday";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListFilterJanji($mode, $bulan, $tahun);
        $data['select'] = $this->janji_model->getListMenuTahun();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        //print_r($data);
        $this->header();
        $this->load->view('janji/filter_sehari_deadline',$data);
        $this->load->view('design/footer');
    }
    
    public function sebelum_deadline()
    {
        $mode = "before";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListJanji($mode);
        //print_r($data);
        $this->header();
        $this->load->view('janji/sebelum_deadline',$data);
        $this->load->view('design/footer');
    }

    public function filterbefore()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $mode = "before";
        $this->load->model('janji_model');
        $data['list'] = $this->janji_model->getListFilterJanji($mode, $bulan, $tahun);
        $data['select'] = $this->janji_model->getListMenuTahun();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        //print_r($data);
        $this->header();
        $this->load->view('janji/filter_sebelum_deadline',$data);
        $this->load->view('design/footer');
    }

    public function delete($id)
    {
        $this->load->model('janji_model');
        $this->janji_model->deleteKomplain($id);

        $mode = $this->input->get('mode');
        if($mode == "all")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji') . '";';
            echo '</script>';  
        }
        else if($mode == "past")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/lewat_deadline') . '";';
            echo '</script>';  
        }
        else if($mode == "oneday")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/sehari_deadline') . '";';
            echo '</script>';  
        }
        else if($mode == "before")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/sebelum_deadline') . '";';
            echo '</script>';  
        }
    }

    public function deleteWhenFilter($id)
    {
        $this->load->model('janji_model');
        $this->janji_model->deleteKomplain($id);

        $mode = $this->input->get('mode');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        if($mode == "all")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/filterall?bulan='.$bulan.'&tahun='.$tahun) . '";';
            echo '</script>';  
        }
        else if($mode == "past")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/filterpast?bulan='.$bulan.'&tahun='.$tahun) . '";';
            echo '</script>';  
        }
        else if($mode == "oneday")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/filteroneday?bulan='.$bulan.'&tahun='.$tahun) . '";';
            echo '</script>';  
        }
        else if($mode == "before")
        {
            echo '<script language="javascript">';
            echo 'alert("Komplain berhasil dihapus");';
            echo 'window.location.href = "' . site_url('janji/filterbefore?bulan='.$bulan.'&tahun='.$tahun) . '";';
            echo '</script>';  
        }
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
