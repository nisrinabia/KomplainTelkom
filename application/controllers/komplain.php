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

        $datakomplain = array(
            'NO_POTS'           => $this->input->post('nopots'),
            'NO_INTERNET'       => $this->input->post('noinet'),
            'NAMA_PELAPOR'      => $this->input->post('nama'),
            'ALAMAT_PELAPOR'    => $this->input->post('alamat'),
            'PIC_PELAPOR'       => $this->input->post('pic'),
            'NAMA_MEDIA'        => $this->input->post('namamedia'),
            'NAMA_LAYANAN'      => $this->input->post('namalayanan'),
            'JENIS_KOMPLAIN'    => $this->input->post('jeniskomplain'),
          //  'TGL_CLOSE'         => $this->input->post('tglclosed'),
            'TGL_CLOSE'         => $this->input->post(date('Y-m-d', strtotime('tglclosed'))),
            'KELUHAN'           => $this->input->post('keluhan'),
            'SOLUSI'            => $this->input->post('solusi'),
            'STATUS_KOMPLAIN'   => $this->input->post('statuskomplain'),
            'KETERANGAN'        => $this->input->post('ket'),
          //  'DEADLINE'          => $this->input->post('deadline')
            'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))          
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
        'DEADLINE'          => $this->input->post('deadline'),
        'DOKUMEN'           => $this->input->post('dokumen')
          //  'DEADLINE'          => $this->input->post(date('Y-m-d h:i:s', strtotime('deadline')))          
        );
      
      $this->load->model('komplain_model');
      
      if($this->komplain_model->updateKomplain($id, $datakomplain))
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
      $data = array(
        'DOKUMEN' => NULL
        );
      $this->load->model('komplain_model');

      if($this->komplain_model->unggahDokumen($id, $data))
        {
              echo '<script language="javascript">';
              echo 'alert("Dokumen berhasil dihapus");';
              //echo 'window.location.href = "' . site_url('komplain/showKomplainByPOTS/'.$nopots) . '";';
              echo 'window.history.back();';
              echo '</script>';
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

        $this->excel->getActiveSheet()->setCellValue('A2', 'Keterangan: STATUS JANJI = 0 => Janji yang belum ditangani');
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

        $exceldata="";
        //deadline, nopots, internet, pelapor, layanan, jenis komplain, tgl komplain, tgl close, status
        $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI"); 
        $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
        $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL");

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
