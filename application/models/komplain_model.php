<?php

class Komplain_model extends CI_Model
{
    public function addKomplain($datakomplain)
	{
		$this->db->set($datakomplain); 
		$this->db->insert('komplain');
		return TRUE;
	}
}