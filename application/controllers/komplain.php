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
        $this->load->view('komplain/add_komplain', $data);
        $this->load->view('design/footer');
    }

    public function addKomplain(){
        $nopots = $this->input->post('nopots');
        $noinet = $this->input->post('noinet');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pic = $this->input->post('pic');
        $namamedia = $this->input->post('namamedia');
        $namalayanan = $this->input->post('namalayanan');
        $jeniskomplain = $this->input->post('jeniskomplain');
        $tglclosed = $this->input->post('tglclosed');
          //  'TGL_CLOSE'         => $this->input->post(date('Y-m-d', strtotime('tglclosed'))),
        $keluhan = $this->input->post('keluhan');
        $solusi = $this->input->post('solusi');
        $statuskomplain = $this->input->post('statuskomplain');
        $ket = $this->input->post('ket');
        $deadline = $this->input->post('deadline');
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))
          //07/08/2015 12:57 PM          
        if(substr($deadline, -2) == 'PM'){
          $deadline = '07/08/2015 12:57 PM'; 
          $tanggal = substr($deadline, 0, 10);
          $menit = substr($deadline, -5, -2);
          $temp = substr($deadline, 11, 12);
          $result = $temp + 12;
          if($result == '24'){
            $result = '00';
          }
          $deadline = $tanggal .' '. $result . ':' . $menit;
          //echo $deadline;
        }
        
        $this->load->model('komplain_model');

        if($this->komplain_model->addKomplain($nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline))
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
              echo '</script>';
        }
    }

    public function showKomplainByPOTS($nopots){
        $this->load->model('komplain_model');
        $data['list'] = $this->komplain_model->showKomplainByPOTS($nopots);
        $data['judul'] = 'Histori Komplain';
        //print_r($data);
        $this->header();
        $this->load->view('komplain/show_komplain',$data);
        $this->load->view('design/footer');
    }

    public function uploadKomplain()
    {
        if ($_FILES['userFile']['type'] == 'application/vnd.ms-excel' && substr($_FILES['userFile']['name'], -3, 3) == 'xls')
        {
            $jumlah = 0;
            $target_Path = "files/";
            $target_Path = $target_Path.basename( $_FILES['userFile']['name'] );          
            move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );
            $file = getcwd() . '\files\\' . $_FILES['userFile']['name'];
            $this->load->library('excel');
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            $flag = 0;
            $count = 0;
            foreach ($cell_collection as $cell) {

                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                if (in_array($column,range('A','Q')) && $row!= 1 && $row != 2 && $row != $flag) 
                {
                  $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                  if ($column == 'A' && $data_value == null) {
                      //echo 'loncati ';
                      $flag = $row;
                  }
                  else
                  {
                    //echo 'simpan ' . $data_value . ' ';
                    $excel[$count] = $data_value;
                    if ($count < 17) 
                    {
                      $count = $count + 1;
                      if ($column == 'Q')
                      {
                        $tanggal = $excel[5] . ' ' . $excel[6] . ':00';
                        $janji= $excel[12] . ' ' . $excel[13]. ':00';

                        $datakomplain = array(
                            'NO_POTS'           => $excel[0],
                            'NO_INTERNET'       => $excel[1],
                            'NAMA_PELAPOR'      => $excel[2],
                            'PIC_PELAPOR'       => $excel[3],
                            'ALAMAT_PELAPOR'    => $excel[4],
                            'TGL_KOMPLAIN'      => $tanggal,
                            'NAMA_MEDIA'        => $excel[7],
                            'NAMA_LAYANAN'      => $excel[8],
                            'JENIS_KOMPLAIN'    => $excel[9],
                            'KELUHAN'           => $excel[10],
                            'SOLUSI'            => $excel[11],
                            'DEADLINE'          => $janji,
                            'STATUS_KOMPLAIN'   => ($excel[14] == 'closed' ? 1 : 0),
                            'TGL_CLOSE'         => $excel[15],
                            'KETERANGAN'        => $excel[16]
                        );
                        $this->load->model('komplain_model');
                        if($this->komplain_model->addKomplainByFile($excel[0],$excel[1],$excel[2],$excel[3],$excel[4],$tanggal,$excel[7],$excel[8],$excel[9],$excel[10],$excel[11],$janji,($excel[14] == 'closed' ? 1 : 0),$excel[15],$excel[16]))
                        {
                          $jumlah = $jumlah + 1;
                        }
                        $count = 0;
                      }
                    }
                  }
                }
              }
            //echo 'sukses menambahkan ' . $jumlah;
            unlink($file);
            echo '<script language="javascript">';
            echo 'alert("Berhasil menambahkan ' . $jumlah . ' data");';
            echo 'window.location.href = "' . site_url('komplain/showAllKomplain') . '";';
            echo '</script>';            
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Gagal upload file, pastikan anda telah mengupload file bertipe .xls");';
            echo 'window.location.href = "' . site_url('komplain/') . '";';
            echo '</script>';
        }
    }

    public function showAllKomplain(){
      $this->load->model('komplain_model');
      $data['list'] = $this->komplain_model->showAllKomplain();
      $data['judul'] = 'Data Komplain';
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
      $nopots = $this->input->post('nopots');
      $noinet = $this->input->post('noinet');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $pic = $this->input->post('pic');
      $namamedia = $this->input->post('namamedia');
      $namalayanan = $this->input->post('namalayanan');
      $jeniskomplain = $this->input->post('jeniskomplain');
      $tglclosed = $this->input->post('tglclosed');
        //  'TGL_CLOSE'         => $this->input->post(date('Y-m-d', strtotime('tglclosed'))),
      $keluhan = $this->input->post('keluhan');
      $solusi = $this->input->post('solusi');
      $statuskomplain = $this->input->post('statuskomplain');
      $ket = $this->input->post('ket');
      $deadline = $this->input->post('deadline');
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))
          //07/08/2015 12:57 PM          
      if(substr($deadline, -2) == 'PM'){
        $deadline = '07/08/2015 12:57 PM'; 
        $tanggal = substr($deadline, 0, 10);
        $menit = substr($deadline, -5, -2);
        $temp = substr($deadline, 11, 12);
        $result = $temp + 12;
        if($result == '24'){
          $result = '00';
        }
        $deadline = $tanggal .' '. $result . ':' . $menit;
          //echo $deadline;
      }
        
      $this->load->model('komplain_model');

      if($this->komplain_model->updateKomplain($id, $nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline))
      {
        echo '<script language="javascript">';
        echo 'alert("Data komplain berhasil diupdate");';
        echo 'window.location.href = "' . site_url('komplain/detailKomplain/'.$id) . '";';
        echo '</script>';
      }
      else
      {
        echo '<script language="javascript">';
        echo 'alert("Gagal mengupdate data komplain");';
        echo 'window.history.back();';
        echo '</script>';
      }
    }

    public function detailKomplain($id){
      $this->load->model('komplain_model');
      $data['list'] = $this->komplain_model->getDataKomplain($id);
      $this->header();
      $this->load->view('komplain/detail_komplain', $data);
      $this->load->view('design/footer');
    }

    public function deleteKomplain($id){
      $this->load->model('komplain_model');
      
      $this->komplain_model->deleteKomplain($id);

      echo '<script language="javascript">';
      echo 'alert("Data berhasil dihapus");';
      echo 'window.history.back();';
      echo '</script>';
    }

    function unggahDokumen($id)
    {
        $ref = $this->input->post('uri');
        $target_Path = NULL;
        if ($_FILES['userFile']['name'] != NULL)
        {
            $path_parts = pathinfo($_FILES["userFile"]["name"]);
            $extension = $path_parts['extension'];
            $extension = ".".$extension;
            $target_Path = "dokumen/";
            $target_Path = $target_Path.$id.$extension;
        }
        $data = array(
            'DOKUMEN' => $target_Path
        );
        $this->load->model('komplain_model');
        if($this->komplain_model->unggahDokumen($id, $data))
        {
            if ($target_Path != NULL)
            {
                move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );
            }
              echo '<script language="javascript">';
              echo 'alert("Dokumen berhasil diupload");';
              echo 'window.location.replace("'.$ref.'");';
              echo '</script>';
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Gagal mengupload dokumen");';
              echo 'window.location.replace("'.$ref.'");';
              echo '</script>';
        }
    }

    public function deleteDokumen($id){
      $data = $this->input->post($id);
      $directory_doc = $this->input->post('doc');
      $data = array(
        'DOKUMEN' => NULL
        );
      $this->load->model('komplain_model');

      if($this->komplain_model->unggahDokumen($id, $data))
        {
          if(unlink($directory_doc)){
            echo '<script language="javascript">';
            echo 'alert("Dokumen berhasil dihapus");';
              //echo 'window.location.href = "' . site_url('komplain/showKomplainByPOTS/'.$nopots) . '";';
            echo 'window.history.back();';
            echo '</script>';
          }
          else{
            echo '<script language="javascript">';
            echo 'alert("Gagal menghapus dokumen");';
            echo '</script>';
          }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Gagal menghapus dokumen");';
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
