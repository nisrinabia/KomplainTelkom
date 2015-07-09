<?php

class Dashboard_model extends CI_Model
{
	public function getStatsKomplain()
 	{
 		$q = "SELECT COUNT(ID_KOMPLAIN) as JML_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN";
        $query = $this->db->query($q);

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
 	}

 	public function getStatsLayanan()
 	{
 		$this->db->select('COUNT(NAMA_LAYANAN) as JML_LAYANAN');
 		$this->db->from('layanan');
 		$this->db->where('STATUS = 1');

 		$query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
 	}

    public function getStatsMedia()
    {
        $this->db->select('COUNT(NAMA_MEDIA) as JML_MEDIA');
        $this->db->from('media');
        $this->db->where('STATUS = 1');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function getStatsJenis()
    {
        $this->db->select('COUNT(JENIS) as JML_JENIS');
        $this->db->from('jenis_komplain');
        $this->db->where('STATUS = 1');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function getStatsJanjiAll()
    {
        $this->db->select('COUNT(ID_KOMPLAIN) as JML_JANJI_ALL');
        $this->db->from('komplain');
        $this->db->where("STATUS_JANJI = 0 AND DEADLINE != '0000-00-00 00:00:00' AND DEADLINE IS NOT NULL");

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function getStatsJanjiPast()
    {
        $this->db->select('COUNT(ID_KOMPLAIN) as JML_JANJI_PAST');
        $this->db->from('komplain');
        $this->db->where("STATUS_JANJI = 0 AND DEADLINE != '0000-00-00 00:00:00' AND DEADLINE IS NOT NULL AND TIME_FORMAT(TIMEDIFF((DEADLINE),NOW()), '%H') < 0");

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function getStatsJanjiOneDay()
    {
        $this->db->select('COUNT(ID_KOMPLAIN) as JML_JANJI_ONE_DAY');
        $this->db->from('komplain');
        $this->db->where("STATUS_JANJI = 0 AND DEADLINE != '0000-00-00 00:00:00' AND DEADLINE IS NOT NULL AND (TIME_FORMAT(TIMEDIFF((DEADLINE),NOW()), '%H') < 24 AND TIME_FORMAT(TIMEDIFF((DEADLINE),NOW()), '%H') > 0)");

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }

    public function getStatsJanjiBefore()
    {
        $this->db->select('COUNT(ID_KOMPLAIN) as JML_JANJI_BEFORE');
        $this->db->from('komplain');
        $this->db->where("STATUS_JANJI = 0 AND DEADLINE != '0000-00-00 00:00:00' AND DEADLINE IS NOT NULL AND TIME_FORMAT(TIMEDIFF((DEADLINE),NOW()), '%H') > 24");

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }
}

/* End of file jenis_komplain_model.php */