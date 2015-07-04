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
        $this->load->model('jenis_komplain_model');
        $this->load->model('media_model');
        $this->load->model('layanan_model');

        $data['jenis_komplain'] = $this->jenis_komplain_model->getListJeniskomp();
        $data['nama_media'] = $this->media_model->getListMedia();
        $data['nama_layanan'] = $this->layanan_model->getListLayanan();

        $this->header();
        $this->load->view('komplain/add_komplain');
        $this->load->view('design/footer');
    }

    public function addKomplain(){
        $nopots = $this->input->post('nopots');
        $tglclosed = date('yyyy-mm-dd', strtotime('tglclosed'));
        $deadline = date('yyyy-mm-dd, h:m', strtotime('deadline'));

        $datakomplain = array(
            'NO_POTS'           => $this->input->post('nopots'),
            'NO_INTERNET'       => $this->input->post('noinet'),
            'NAMA_PELAPOR'      => $this->input->post('nama'),
            'ALAMAT_PELAPOR'    => $this->input->post('alamat'),
            'PIC_PELAPOR'       => $this->input->post('pic'),
            'NAMA_MEDIA'        => $this->input->post('namamedia'),
            'NAMA_LAYANAN'      => $this->input->post('namalayanan'),
            'JENIS_KOMPLAIN'    => $this->input->post('jeniskomplain'),
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
              echo 'window.location.href = "' . site_url('komplain/showKomplainByPOTS/'.$nopots) . '";';
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

    public function showKomplainByPOTS($nopots){
        $this->load->model('komplain_model');
        $data['list'] = $this->komplain_model->showKomplainByPOTS($nopots);
        //print_r($data);
        $this->header();
        $this->load->view('komplain/show_komplain',$data);
        $this->load->view('design/footer');
    }

    public function uploadKomplain()
    {
        if($_FILES['file']['name'] != NULL){
            echo $filename=$_FILES["file"]["tmp_name"];
            if($_FILES["file"]["size"] > 0){
                $file = fopen($filename, "r");
                $count = 1;
                 while (($emapData = fgetcsv($file, 1000000, ",")) !== FALSE){
                  if($count != 1){
                    //It wiil insert a row to our subject table from our csv file`
                       //moved to model
                     //we are using mysql_query function. it returns a resource on true else False on error
                       //moved to model
                        if(! $result )
                        {
                            echo '<script language="javascript">';
                            echo 'alert("Gagal menambahkan komplain");';
                            echo 'window.location.href = "' . site_url('komplain') . '";';
                            echo '</script>';
                        }   
                  }
                  $count = $count + 1;
                 }
                 fclose($file);
                 //throws a message if data successfully imported to mysql database from excel file
                 echo '<script language="javascript">';
                 echo 'alert("Berhasil menambahkan komplain");';
                 echo 'window.location.href = "' . site_url('komplain') . '";';
                 echo '</script>';
                //close of connection
                //mysql_close($conn); 
            }
        }    
    }

    public function showAllKomplain(){
      $this->load->model('komplain_model');
      $data['list'] = $this->komplain_model->showAllKomplain();
      //print_r($data);
      $this->header();
      $this->load->view('komplain/show_komplain', $data);
      $this->load->view('design/footer');
    }

    public function editKomplain(){
      
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
