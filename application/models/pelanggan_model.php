<?php

class Pelanggan_model extends CI_Model
{
    public function addPelanggan($datapelanggan)
	{		
		$this->db->set($datapelanggan); 
		$this->db->insert('pelanggan');
		return TRUE;
	}
}