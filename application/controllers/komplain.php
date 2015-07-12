<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komplain extends CI_Controller{
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

    public function komplain_plasa_psb()
    {        
        $this->load->model('jenis_komplain_model');
        $this->load->model('layanan_model');

        $data['jenis_komplain'] = $this->jenis_komplain_model->getListJeniskomp();
        $data['nama_layanan'] = $this->layanan_model->getListLayanan();

        $this->header();
        $this->load->view('komplain/add_komplain_plasa_psb', $data);
        $this->load->view('design/footer');
    }

    public function komplain_plasa_gangguan()
    {        
        $this->load->model('jenis_komplain_model');
        $this->load->model('layanan_model');

        $data['jenis_komplain'] = $this->jenis_komplain_model->getListJeniskomp();
        $data['nama_layanan'] = $this->layanan_model->getListLayanan();

        $this->header();
        $this->load->view('komplain/add_komplain_plasa_gangguan', $data);
        $this->load->view('design/footer');
    }

    public function addKomplain(){
        $status = $this->input->post('status');
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
        if ($status == 'janji')
        {
          $deadline = $this->input->post('deadline');
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))
          //07/08/2015 12:57 PM          
          $tanggal = substr($deadline, 0, 10);
          $menit = substr($deadline, -5, -3);
          $temp = substr($deadline, -8, -6);
          if(substr($deadline, -2) == 'PM'){
            $result = $temp + 12;
            if($result == '24'){
                  $result = '00';
            }
            $deadline = $tanggal .' '. $result . ':' . $menit;
            //echo $deadline;
          }
          else{

            $deadline = $tanggal .' '. $temp . ':' . $menit;
            //echo $deadline; 
          }
        }
        else
        {
          $deadline = '0000-00-00 00:00:00';
        }
        
        
        $this->load->model('komplain_model');
        $inserted_id = $this->komplain_model->addKomplain($nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline);
        if($inserted_id != NULL)
        {
              echo '<script language="javascript">';
              echo 'alert("Data berhasil dimasukkan");';
              echo 'window.location.href = "' . site_url('komplain/detailKomplain/'.$inserted_id) . '";';
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
        $ref = $this->input->get('uri');
        $this->load->model('komplain_model');
        $data['list'] = $this->komplain_model->showKomplainByPOTS($nopots);
        $data['subjudul'] = 'Historis komplain pelanggan';
        $data['uri'] = $ref;
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
                        if ($excel[14] == "" || $excel[14] == "In Progress")
                        {
                          $statuskomplain = 'In Progress';
                        }
                        elseif ($excel[14] == "Closed")
                        {
                          $statuskomplain = 'Closed';
                        }
                        elseif ($excel[14] == "Decline")
                        {
                          $statuskomplain = 'Decline';
                        }
                        
                        $this->load->model('komplain_model');
                        if($this->komplain_model->addKomplainByFile($excel[0],$excel[1],$excel[2],$excel[3],$excel[4],$tanggal,$excel[7],$excel[8],$excel[9],$excel[10],$excel[11],$janji,$statuskomplain,$excel[15],$excel[16]))
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

    public function showAllKomplain($status){
      $this->load->model('komplain_model');
      if($status == '1'){
        $data['list'] = $this->komplain_model->showUnclosedHardKomplain();
        $data['subjudul'] = 'Unclosed Hard Komplain';
      }
      else if($status == '2'){
        $data['list'] = $this->komplain_model->showUnclosedGangguan();
        $data['subjudul'] = 'Unclosed Gangguan';
      }
      else if($status == '3'){
        $data['list'] = $this->komplain_model->showUnclosedPSB();
        $data['subjudul'] = 'Unclosed PSB';
      }
      else{
        $data['list'] = $this->komplain_model->showAllKomplain();
        $data['subjudul'] = 'Data Komplain';
      }
      
      //print_r($data);
      $this->header();
      $this->load->view('komplain/show_komplain', $data);
      $this->load->view('design/footer');
    }

    public function editKomplain($id){
      $this->load->model('jenis_komplain_model');
      $this->load->model('media_model');
      $this->load->model('layanan_model');
      $this->load->model('komplain_model');

      $data['jenis_komplain'] = $this->jenis_komplain_model->getListJeniskomp();
      $data['close'] = $this->komplain_model->tgl_closed($id);
      $data['nama_media'] = $this->media_model->getListMedia();
      $data['nama_layanan'] = $this->layanan_model->getListLayanan();

      
      $data['makan'] = $this->komplain_model->editKomplain($id);

      $this->header();
      $this->load->view('komplain/edit_komplain', $data);
      $this->load->view('design/footer');
    }

    public function updateKomplain(){
      $id = $this->input->post('id');
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
      $deadlinelama = $this->input->post('deadlinelama');
      $deadlinebaru = $this->input->post('deadlinebaru');
      $status = $this->input->post('status');
      if ($status == 'lama')
      {
        $deadline = $deadlinelama;
      }
      else
      {
        $deadline = $deadlinebaru;
        $tanggal = substr($deadline, 0, 10);
        $menit = substr($deadline, -5, -3);
        $temp = substr($deadline, -8, -6);
        if(substr($deadline, -2) == 'PM'){
          $result = $temp + 12;
          if($result == '24'){
                $result = '00';
          }
          $deadline = $tanggal .' '. $result . ':' . $menit;
          //echo $deadline;
        }
        else{

          $deadline = $tanggal .' '. $temp . ':' . $menit;
          //echo $deadline; 
        }
      }
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))
          //07/08/2015 12:57 PM          
      
        
      $this->load->model('komplain_model');
      //echo $status . $deadline;
      if($this->komplain_model->updateKomplain($id, $nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline, $status))
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
            $data = array(
              'DOKUMEN' => $target_Path
            );
            $this->load->model('komplain_model');
            if($this->komplain_model->unggahDokumen($id, $data))
            {
              if ($target_Path != NULL)
              {
                  move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );
                  echo '<script language="javascript">';
                  echo 'alert("Dokumen berhasil diupload");';
                  echo 'window.location.replace("'.$ref.'");';
                  echo '</script>';
              } 
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Gagal mengupload dokumen");';
                echo 'window.location.replace("'.$ref.'");';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Gagal mengupload dokumen, pastikan anda telah memilih file!");';
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

    public function excel()
    {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);

        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Daftar Semua Komplain');
        $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Semua Komplain');

        $this->excel->getActiveSheet()->mergeCells('A2:F2');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A4', 'NO POTS');
        $this->excel->getActiveSheet()->setCellValue('B4', 'NO INTERNET');
        $this->excel->getActiveSheet()->setCellValue('C4', 'NAMA PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('D4', 'ALAMAT PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('E4', 'PIC PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('F4', 'MEDIA');
        $this->excel->getActiveSheet()->setCellValue('G4', 'LAYANAN');
        $this->excel->getActiveSheet()->setCellValue('H4', 'JENIS KOMPLAIN');
        $this->excel->getActiveSheet()->setCellValue('I4', 'WAKTU KOMPLAIN');
        $this->excel->getActiveSheet()->setCellValue('J4', 'TGL CLOSE');
        $this->excel->getActiveSheet()->setCellValue('K4', 'DEADLINE JANJI');
        $this->excel->getActiveSheet()->setCellValue('L4', 'KELUHAN');
        $this->excel->getActiveSheet()->setCellValue('M4', 'SOLUSI');
        $this->excel->getActiveSheet()->setCellValue('N4', 'KETERANGAN');
        $this->excel->getActiveSheet()->setCellValue('O4', 'STATUS JANJI');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:O1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#000');

        $this->excel->getActiveSheet()->getStyle('A4:O4')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB('6EF6ED');


        //Set autofilter tiap kolom hehe
        $this->excel->getActiveSheet()->setAutoFilter('A4:O4');

        for($col = ord('A'); $col <= ord('O'); $col++)
        {
            //set column dimension
            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
             //change the font size
            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(11);
             
            //$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
        $this->excel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

        $exceldata="";
        //deadline, nopots, internet, pelapor, layanan, jenis komplain, tgl komplain, tgl close, status
        $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI"); 
        $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
        $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.NAMA_MEDIA<>'Plasa'");

        $query = $this->db->get();
        foreach ($query->result_array() as $row) 
        {
            $exceldata[] = $row;
        }
        

        //Fill data 
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

         
        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('M4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('O4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
       
        $filename='Laporan Komplain.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');     
    }
}
