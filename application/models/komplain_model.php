<?php

class Komplain_model extends CI_Model
{
    public function addKomplain($datakomplain)
	{
		$this->db->set($datakomplain); 
		$this->db->insert('komplain');
		return TRUE;
	}

	public function uploadKomplain()
	{
		$sql = "INSERT into subject (`SUBJ_ID`,`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
                            values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
        $result = mysql_query( $sql, $conn );
    }
}