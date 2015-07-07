<?php

class Janji_model extends CI_Model
{
    public function getDataJanji($id)
    {
        $query = $this->db->get_where('komplain',
            array
            (
                'ID_KOMPLAIN' => $id
            )
        );

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

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
            $this->db->select("k.ID_KOMPLAIN, k.DEADLINE, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, l.NAMA_LAYANAN, j.JENIS, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.STATUS_JANJI, TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') as HOUR"); 
            $this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
            $this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_JANJI = 0 AND k.DEADLINE IS NOT NULL AND substr(k.TGL_KOMPLAIN,6,2)='$bulan' and substr(k.TGL_KOMPLAIN,1,4)='$tahun'");

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

	public function getListPastDeadline()
 	{
 		//Melewati Deadline namun berstatus 0
 		$this->db->select('k.ID_KOMPLAIN, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, m.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS_KOMPLAIN, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.KELUHAN, k.SOLUSI, k.STATUS_KOMPLAIN, k.KETERANGAN, k.DOKUMEN, k.DEADLINE');
 		$this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
 		$this->db->where("k.NAMA_MEDIA = m.NAMA_MEDIA AND k.NAMA_LAYANAN = l.NAMA_LAYANAN AND k.JENIS_KOMPLAIN = j.JENIS_KOMPLAIN AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 0 AND k.STATUS_KOMPLAIN = 0 AND k.DEADLINE IS NOT NULL");

 		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
            foreach ($query->result() as $row) 
            {
                $pastdead[] = $row;
            }
            return $pastdead;
        }
        else
        {
        	return false;	
        }
 	}

 	public function getListOneDayDeadline()
 	{
 		//Deadline kurang dari satu hari
 		$this->db->select('k.ID_KOMPLAIN, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, m.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS_KOMPLAIN, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.KELUHAN, k.SOLUSI, k.STATUS_KOMPLAIN, k.KETERANGAN, k.DOKUMEN, k.DEADLINE');
 		$this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
 		$this->db->where("k.ID_MEDIA = m.ID_MEDIA AND k.ID_LAYANAN = l.ID_LAYANAN AND k.ID_JENIS_KOMPLAIN = j.ID_JENIS_KOMPLAIN AND (TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 0) AND k.STATUS_KOMPLAIN = 0 AND k.DEADLINE IS NOT NULL");

 		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
            foreach ($query->result() as $row) 
            {
                $oneday[] = $row;
            }
            return $oneday;
        }
        else
        {
        	return false;	
        }
 	}

 	public function getListBeforeDeadline()
 	{
 		//Deadline lebih dari satu hari... Yeeeeeey!
 		$this->db->select('k.ID_KOMPLAIN, k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, m.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS_KOMPLAIN, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.KELUHAN, k.SOLUSI, k.STATUS_KOMPLAIN, k.KETERANGAN, k.DOKUMEN, k.DEADLINE');
 		$this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
 		$this->db->where("k.ID_MEDIA = m.ID_MEDIA AND k.ID_LAYANAN = l.ID_LAYANAN AND k.ID_JENIS_KOMPLAIN = j.ID_JENIS_KOMPLAIN AND TIME_FORMAT(TIMEDIFF((k.DEADLINE),NOW()), '%H') > 24 AND k.STATUS_KOMPLAIN = 0 AND k.DEADLINE IS NOT NULL");

 		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
            foreach ($query->result() as $row) 
            {
                $beforeoneday[] = $row;
            }
            return $beforeoneday;
        }
        else
        {
        	return false;	
        }
 	}

    public function tambahDokumen($id, $data)
    {
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $data); 
        return true;
    }
}

/* End of file media_model.php */