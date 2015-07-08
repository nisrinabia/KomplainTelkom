<?php

class Janji_model extends CI_Model
{
    public function getDataJanji($id)
    {
        $this->db->select("ID_KOMPLAIN, NAMA_MEDIA, NAMA_LAYANAN, JENIS_KOMPLAIN, DATE_FORMAT(TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, KELUHAN, SOLUSI, STATUS_KOMPLAIN, KETERANGAN, DOKUMEN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, PIC_PELAPOR, DATE_FORMAT(DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, STATUS_JANJI");
        $this->db->from("komplain");
        $this->db->where("ID_KOMPLAIN = $id");

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return false;   
        }
    }

	public function getListJanji($mode)
 	{
        if($mode == "all")
        {
            //deadline, nopots, internet, pelapor, layanan, jenis komplain, tgl komplain, tgl close, status
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "past")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "oneday")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "before")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
 	}

    public function getListFilterJanji($mode, $bulan, $tahun)
    {
        if($mode == "all")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "past")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "oneday")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
        else if($mode == "before")
        {
            $this->db->select("k.ID_KOMPLAIN, DATE_FORMAT(k.DEADLINE, '%d-%m-%Y - %H:%i') AS DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, DATE_FORMAT(k.TGL_KOMPLAIN, '%d-%m-%Y - %H:%i') AS TGL_KOMPLAIN, DATE_FORMAT(k.TGL_CLOSE, '%d-%m-%Y') AS TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE != '0000-00-00 00:00:00' AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

            $query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row) 
                {
                    $list[] = $row;
                }
                return $list;
            }
            else
            {
                return false;
            }
        }
    }
     
    public function getListMenuTahun()
    {
        //Melewati Deadline namun berstatus 0
        $this->db->select('distinct substr(TGL_KOMPLAIN,1,4) as makan', FALSE);
        $this->db->from('komplain');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $menu[] = $row;
            }
            return $menu;
        }
        else
        {
            return false;   
        }
    }

    public function deleteKomplain($id)
    {
        $this->db->delete('komplain', array('ID_KOMPLAIN' => $id));
    }

    public function tambahDokumen($id, $data)
    {
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $data); 
        return true;
    }

    public function deleteDokumen($id, $data)
    {
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $data); 
        return true;
    }

    public function ubahStatusJanji($id, $data)
    {
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $data); 
        return true;
    }

    /*public function countDoc()
    {
        //SELECT COUNT(ID_KOMPLAIN) AS count FROM komplain WHERE DOKUMEN IS NOT NULL
        $this->db->select('COUNT(ID_KOMPLAIN) AS count');
        $this->db->from('komplain');
        $this->db->where('');

        $this->db->where('DOKUMEN', 'IS NOT NULL');
        //$this->db->update('komplain', $data); 
        return true;
    }*/
}

/* End of file media_model.php */