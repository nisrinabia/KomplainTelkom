<?php

class Pots_model extends CI_Model
{
    public function addPots($datapots)
	{		
		$this->db->insert('pots', $datapots); 
		return TRUE;
	}
}