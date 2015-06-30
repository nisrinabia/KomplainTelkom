<?php

class Pots_model extends CI_Model
{
    public function addPots($datapots)
	{		
		$this->db->set($datapots); 
		$this->db->insert('pots');
		return TRUE;
	}
}