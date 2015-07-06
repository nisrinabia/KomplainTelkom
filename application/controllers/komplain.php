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

        //print_r($data);

        $this->header();
        $this->load->view('komplain/add_komplain', $data);
        $this->load->view('design/footer');
    }

    public function addKomplain(){
        $nopots = $this->input->post('nopots');
        //$tglclosed = DateTime::createFromFormat($tglclosed, 'Y-m-d')->format('Y-m-d');
        //$deadline = DateTime::createFromFormat($deadline, 'dd/mm/yyyy g:i a')->format('Y-m-d H:i:s');

/*        $tglclosed = 'tglclosed';
        $date = strtotime($tglclosed);
        $new_tglclosed = date('Y-m-d', $date);

        $deadline = 'deadline';
        $timestamp = strtotime($deadline);
        $new_deadline = date('Y-m-d h:i:s', $timestamp);
*/

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
          //  'TGL_CLOSE'         => $this->input->post(date('Y-m-d', strtotime('tglclosed'))),
            'KELUHAN'           => $this->input->post('keluhan'),
            'SOLUSI'            => $this->input->post('solusi'),
            'STATUS_KOMPLAIN'   => $this->input->post('statuskomplain'),
            'KETERANGAN'        => $this->input->post('ket'),
            'DEADLINE'          => $this->input->post('deadline')
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))          
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

    public function editKomplain($id){
      $this->load->model('jenis_komplain_model');
      $this->load->model('media_model');
      $this->load->model('layanan_model');

      $data['jenis_komplain'] = $this->jenis_komplain_model->getListJeniskomp();
      $data['nama_media'] = $this->media_model->getListMedia();
      $data['nama_layanan'] = $this->layanan_model->getListLayanan();

      $this->load->model('komplain_model');
      $data['makan'] = $this->komplain_model->editKomplain($id);

      $this->header();
      $this->load->view('komplain/edit_komplain', $data);
      $this->load->view('design/footer');
    }

    public function updateKomplain(){
      //$nama_layanan = $this->input->post('namalayanan');
      $id=$this->input->post('id');
      $datakomplain = array(
        //'ID_KOMPLAIN'       => $this->input->post('id'),
        'NO_POTS'           => $this->input->post('nopots'),
        'NO_INTERNET'       => $this->input->post('noinet'),
        'NAMA_PELAPOR'      => $this->input->post('nama'),
        'ALAMAT_PELAPOR'    => $this->input->post('alamat'),
        'PIC_PELAPOR'       => $this->input->post('pic'),
        'NAMA_MEDIA'        => $this->input->post('namamedia'),
        'NAMA_LAYANAN'      => $this->input->post('namalayanan'),
        'JENIS_KOMPLAIN'    => $this->input->post('jeniskomplain'),
        'TGL_CLOSE'         => $this->input->post('tglclosed'),
        //  'TGL_CLOSE'         => $this->input->post(date('Y-m-d', strtotime('tglclosed'))),
        'KELUHAN'           => $this->input->post('keluhan'),
        'SOLUSI'            => $this->input->post('solusi'),
        'STATUS_KOMPLAIN'   => $this->input->post('statuskomplain'),
        'KETERANGAN'        => $this->input->post('ket'),
        'DEADLINE'          => $this->input->post('deadline')
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))          
        );
      
      $this->load->model('komplain_model');
      
      if($this->komplain_model->updateKomplain($id, $datakomplain))
      {
        echo '<script language="javascript">';
        echo 'alert("Layanan berhasil diupdate");';
      //  echo 'window.location.href = "' . site_url('layanan') . '";';
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

    public function unggahDokumen($idkomplain){
      //$target_Path = NULL;
      if ($_FILES['dokumen']['name'] != NULL)
      {
        $target_Path = "Dokumen/";
        $target_Path = $target_Path.basename( $_FILES['dokumen']['name'] );
      }
      $data = array(
        'ID_KOMPLAIN' => $idkomplain,
        'DOKUMEN' => $target_Path
      );

      $this->load->model('komplain');

      if($this->komplain->unggahDokumen($data))
      {
        if ($target_Path != NULL) {
          move_uploaded_file( $_FILES['dokumen']['tmp_name'], $target_Path );
        }
          echo '<script language="javascript">';
          echo 'alert("Foto berhasil ditambahkan");';
          //echo 'window.location.replace("'. base_url() . 'admin/album'.'");';
          echo '</script>';
      }
      else
      {
          echo '<script language="javascript">';
          echo 'alert("Gagal menyimpan foto");';
          //echo 'window.location.replace("'. base_url() . 'admin/album'.'");';
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