<?php

class Dashboard_model extends CI_Model
{
	public function getStatsHardKomplain()
 	{
 		$q = "SELECT COUNT(ID_KOMPLAIN) as JML_HARD_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN AND KOMPLAIN.NAMA_MEDIA != 'Plasa' AND KOMPLAIN.STATUS_KOMPLAIN = 'In Progress'";
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

 	public function getStatsGangguan()
 	{
 		$q = "SELECT COUNT(ID_KOMPLAIN) as JML_GANGGUAN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN AND KOMPLAIN.NAMA_MEDIA = 'Plasa' AND KOMPLAIN.JENIS_KOMPLAIN != 'PSB' AND KOMPLAIN.STATUS_KOMPLAIN = 'In Progress'";
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

    public function getStatsPSB()
    {
        $q = "SELECT COUNT(ID_KOMPLAIN) as JML_PSB FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN AND KOMPLAIN.NAMA_MEDIA = 'Plasa' AND KOMPLAIN.JENIS_KOMPLAIN = 'PSB' AND KOMPLAIN.STATUS_KOMPLAIN = 'In Progress' ";
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
}

/* End of file jenis_komplain_model.php */