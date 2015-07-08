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
}

/* End of file jenis_komplain_model.php */