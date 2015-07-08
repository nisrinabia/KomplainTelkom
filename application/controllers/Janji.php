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
        $this->load->library('excel');
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

    public function excel($mode)
    {
        $this->excel->setActiveSheetIndex(0);

        //name the worksheet
        if($mode == "all")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Semua Janji');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Semua Janji');
        }
        else if($mode == "past")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Melewati Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Melewati Deadline');
        }
        else if($mode == "oneday")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Mendekati Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Melewati Deadline');
        }
        else if($mode == "before")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Sebelum Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Sebelum Deadline');
        }

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
        $this->excel->getActiveSheet()->setCellValue('I4', 'TGL KOMPLAIN');
        $this->excel->getActiveSheet()->setCellValue('J4', 'TGL CLOSE');
        $this->excel->getActiveSheet()->setCellValue('K4', 'DEADLINE JANJI');
        $this->excel->getActiveSheet()->setCellValue('L4', 'KELUHAN');
        $this->excel->getActiveSheet()->setCellValue('M4', 'SOLUSI');
        $this->excel->getActiveSheet()->setCellValue('N4', 'KETERANGAN');
        $this->excel->getActiveSheet()->setCellValue('O4', 'STATUS JANJI');
        $this->excel->getActiveSheet()->setCellValue('P4', 'BEDA WAKTU');
        $this->excel->getActiveSheet()->setCellValue('Q4', 'KETERANGAN JANJI');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:Q1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#000');

        $this->excel->getActiveSheet()->getStyle('A4:Q4')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB('6EF6ED');


        //Set autofilter tiap kolom hehe
        $this->excel->getActiveSheet()->setAutoFilter('A4:Q4');

        for($col = ord('A'); $col <= ord('Q'); $col++)
        {
            //set column dimension
            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
             //change the font size
            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(11);
             
            //$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }

        $exceldata="";
        if($mode == "all")
        {
            //deadline, nopots, internet, pelapor, layanan, jenis komplain, tgl komplain, tgl close, status
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "past")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "oneday")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "before")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }

        //Fill data 
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

        //Set keterangan janji
        $column = 'P';
        $columnar = 'Q';
        $lastRow = $this->excel->getActiveSheet()->getHighestRow();
        for ($row = 5; $row <= $lastRow; $row++)
        {
            $this->excel->getActiveSheet()->setCellValue($columnar.$row, '=IF('.$column.$row.'>24,"Sebelum Deadline", IF('.$column.$row.'>0,"Mendekati Deadline","Melewati Deadline"))');
        }
         
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
        $this->excel->getActiveSheet()->getStyle('P4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $filename='Janji.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');     
    }

    public function excelFilter($mode, $bulan, $tahun)
    {
        $this->excel->setActiveSheetIndex(0);

        //name the worksheet
        if($mode == "all")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Semua Janji');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Semua Janji');

            $this->excel->getActiveSheet()->setCellValue('A2', 'Daftar semua janji yang belum ditangani pada bulan '.$bulan.' tahun '.$tahun.'');
            $this->excel->getActiveSheet()->mergeCells('A2:H2');
        }
        else if($mode == "past")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Melewati Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Melewati Deadline');

            $this->excel->getActiveSheet()->setCellValue('A2', 'Daftar janji yang belum ditangani dan melewati deadline pada bulan '.$bulan.' tahun '.$tahun.'');
            $this->excel->getActiveSheet()->mergeCells('A2:H2');
        }
        else if($mode == "oneday")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Mendekati Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Melewati Deadline');

            $this->excel->getActiveSheet()->setCellValue('A2', 'Daftar janji yang belum ditangani dan mendekati deadline (sehari) pada bulan '.$bulan.' tahun '.$tahun.'');
            $this->excel->getActiveSheet()->mergeCells('A2:H2');
        }
        else if($mode == "before")
        {
            $this->excel->getActiveSheet()->setTitle('Daftar Janji Sebelum Deadline');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Janji Sebelum Deadline');

            $this->excel->getActiveSheet()->setCellValue('A2', 'Daftar janji yang belum ditangani dan sebelum deadline pada bulan '.$bulan.' tahun '.$tahun.'');
            $this->excel->getActiveSheet()->mergeCells('A2:H2');
        }

        $this->excel->getActiveSheet()->setCellValue('A3', 'Keterangan: STATUS JANJI = 0 => Janji yang belum ditangani');
        $this->excel->getActiveSheet()->mergeCells('A3:H3');
        
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A5', 'NO POTS');
        $this->excel->getActiveSheet()->setCellValue('B5', 'NO INTERNET');
        $this->excel->getActiveSheet()->setCellValue('C5', 'NAMA PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('D5', 'ALAMAT PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('E5', 'PIC PELAPOR');
        $this->excel->getActiveSheet()->setCellValue('F5', 'MEDIA');
        $this->excel->getActiveSheet()->setCellValue('G5', 'LAYANAN');
        $this->excel->getActiveSheet()->setCellValue('H5', 'JENIS KOMPLAIN');
        $this->excel->getActiveSheet()->setCellValue('I5', 'TGL KOMPLAIN');
        $this->excel->getActiveSheet()->setCellValue('J5', 'TGL CLOSE');
        $this->excel->getActiveSheet()->setCellValue('K5', 'DEADLINE JANJI');
        $this->excel->getActiveSheet()->setCellValue('L5', 'KELUHAN');
        $this->excel->getActiveSheet()->setCellValue('M5', 'SOLUSI');
        $this->excel->getActiveSheet()->setCellValue('N5', 'KETERANGAN');
        $this->excel->getActiveSheet()->setCellValue('O5', 'STATUS JANJI');
        $this->excel->getActiveSheet()->setCellValue('P5', 'BEDA WAKTU');
        $this->excel->getActiveSheet()->setCellValue('Q5', 'KETERANGAN JANJI');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:Q1');
        //set aligment to center for that merged cell (A1 to P1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#000');

        $this->excel->getActiveSheet()->getStyle('A5:Q5')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB('6EF6ED');


        //Set autofilter tiap kolom hehe
        $this->excel->getActiveSheet()->setAutoFilter('A5:Q5');

        for($col = ord('A'); $col <= ord('Q'); $col++)
        {
            //set column dimension
            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
             //change the font size
            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(11);
             
            //$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }

        $exceldata="";
        if($mode == "all")
        {
            //deadline, nopots, internet, pelapor, layanan, jenis komplain, tgl komplain, tgl close, status
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "past")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "oneday")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }
        else if($mode == "before")
        {
            $this->db->select("k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, k.PIC_PELAPOR, k.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS, (CASE WHEN k.TGL_KOMPLAIN = '0000-00-00 00:00:00' THEN '-' ELSE k.TGL_KOMPLAIN END) AS WAKTU_KOMPLAIN, (CASE WHEN k.TGL_CLOSE = '0000-00-00' THEN '-' ELSE k.TGL_CLOSE END) AS TGL_CLOSE, (CASE WHEN k.DEADLINE = '0000-00-00 00:00:00' THEN '-' ELSE k.DEADLINE END) AS DEADLINE, k.KELUHAN, k.SOLUSI, k.KETERANGAN, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();
            foreach ($query->result_array() as $row) 
            {
                $exceldata[] = $row;
            }
        }

        //Fill data 
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A6');

        //Set keterangan janji
        $column = 'P';
        $columnar = 'Q';
        $lastRow = $this->excel->getActiveSheet()->getHighestRow();
        for ($row = 6; $row <= $lastRow; $row++)
        {
            $this->excel->getActiveSheet()->setCellValue($columnar.$row, '=IF('.$column.$row.'>24,"Sebelum Deadline", IF('.$column.$row.'>0,"Mendekati Deadline","Melewati Deadline"))');
        }
         
        $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('H5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('K5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('L5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('M5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('N5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('O5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('P5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $filename='JanjiFiltered.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');     
    }

    function uploadDokumen($id)
    {
        $ref = $this->input->post('uri');

        /*$this->load->model('janji_model');
        $count = $this->janji_model->countDoc();*/

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
        $this->load->model('janji_model');
        if($this->janji_model->tambahDokumen($id, $data))
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

    function ubahStatus($id)
    {
        $ref = $this->input->post('uri');

        $data = array(
            'STATUS_JANJI' => 1
        );
        $this->load->model('janji_model');
        if($this->janji_model->ubahStatusJanji($id, $data))
        {
            echo '<script language="javascript">';
            echo 'alert("Status Janji berhasil diubah. Janji telah ditangani");';
            echo 'window.location.replace("'.base_url().'janji");';
            echo '</script>';
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Status Janji gagal diubah.");';
            echo 'window.location.replace("'.$ref.'");';
            echo '</script>';
        }
    }

    function hapusDokumen($id)
    {
        $ref = $this->input->post('uri');
        $directory_doc = $this->input->post('doc');

        $data = array(
            'DOKUMEN' => NULL
        );

        $redo = array(
            'DOKUMEN' => $directory_doc
        );
        $this->load->model('janji_model');


        if($this->janji_model->deleteDokumen($id, $data))
        {
            if(unlink($directory_doc))
            {
                echo '<script language="javascript">';
                echo 'alert("Dokumen berhasil dihapus");';
                echo 'window.location.replace("'.$ref.'");';
                echo '</script>';
            }
            else
            {
                $this->janji_model->tambahDokumen($id, $redo);
                echo '<script language="javascript">';
                echo 'alert("Dokumen gagal dihapus. Segera hubungi admin");';
                echo 'window.location.replace("'.$ref.'");';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Dokumen gagal dihapus. Segera hubungi admin");';
            echo 'window.location.replace("'.$ref.'");';
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
