<?php

class Komplain_model extends CI_Model
{
    public function addKomplain($datakomplain)
	{
		//$this->db->set($datakomplain); 
		$this->db->insert('komplain', $datakomplain);
		return TRUE;
	}

	public function uploadKomplain()
	{
		$sql = "INSERT into subject (`SUBJ_ID`,`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
                            values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
        $result = mysql_query( $sql, $conn );
    }

	public function showKomplainByPOTS($nopots)
    {
        //Select all
        
        //$query = $this->db->get('komplain');
        $q = "SELECT ID_KOMPLAIN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, KOMPLAIN.NAMA_LAYANAN, KOMPLAIN.JENIS_KOMPLAIN, TGL_KOMPLAIN, TGL_CLOSE, STATUS_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS_KOMPLAIN = KOMPLAIN.JENIS_KOMPLAIN and KOMPLAIN.NO_POTS = '$nopots'";
		$query = $this->db->query($q);

		//echo $query;
        /*$this->db->select('*');
        $this->db->from('komplain');
        $this->db->where('NO_POTS', $nopots);
        $this->db->join('media', 'media.ID_MEDIA = komplain.ID_MEDIA');
        $this->db->join('layanan', 'layanan.ID_LAYANAN = komplain.ID_LAYANAN');
        $this->db->join('jenis_komplain', 'media.ID_JENIS_KOMPLAIN = komplain.ID');

        $query = $this->db->get();*/

        if ($query -> num_rows() > 0)
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

    public function showAllKomplain(){
        $q = "SELECT ID_KOMPLAIN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, KOMPLAIN.NAMA_LAYANAN, KOMPLAIN.JENIS_KOMPLAIN, TGL_KOMPLAIN, TGL_CLOSE, STATUS_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS_KOMPLAIN = KOMPLAIN.JENIS_KOMPLAIN";
        $query = $this->db->query($q);

        if ($query -> num_rows() > 0)
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

    public function editKomplain($id){
        $query = $this->db->get_where('komplain', array('ID_KOMPLAIN' => $id));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }

    public function updateKomplain($id, $datakomplain){        
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $datakomplain);
        return TRUE;
    }

    public function unggahDokumen($data) {
        return $this->db->insert('komplain', $data); 
    }

    public function deleteKomplain(){
        
    }
}