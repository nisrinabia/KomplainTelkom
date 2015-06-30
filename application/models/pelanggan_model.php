<?php

class Pelanggan_model extends CI_Model
{
    public function addPelanggan($datakomplain)
	{		
		$this->db->insert('pelanggan', $datakomplain); 
		return TRUE;
	}
}