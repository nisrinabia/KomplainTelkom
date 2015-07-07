<?php

class Jenis_komplain_model extends CI_Model
{
	public function getListJeniskomp()
 	{
 		$query = $this->db->get('jenis_komplain');

		if ($query->num_rows() > 0)
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

	public function addJeniskomp($jenis_komplain)
	{
		$result = $this->db->get_where('jenis_komplain',
			array
			(
				'JENIS' => $jenis_komplain
			)
		);

		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->insert('jenis_komplain',
				array
				(
					'JENIS' => $jenis_komplain
				)
			); 
			return TRUE;
		}
	}

	public function editJeniskomp($id)
	{
    	$query = $this->db->get_where('jenis_komplain', array('JENIS' => $id));
    	if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
        }
    }

    public function updateJeniskomp($id, $jenis_komplain)
    {
    	$q = $this->db->get_where('jenis_komplain', array('JENIS' => $id));
    	$cek_jenis_komplain =  $q->row()->JENIS_KOMPLAIN;
		$result = $this->db->get_where('jenis_komplain', array('JENIS' => $jenis_komplain));

		if ($result->num_rows() > 0)
		{
			//echo "apakah disini?";
			if ($cek_jenis_komplain != $jenis_komplain)
			{
				return FALSE;
			}
		}
		$this->db->where('JENIS', $id);
		$this->db->update('jenis_komplain', array('JENIS_KOMPLAIN' => $jenis_komplain));
		return TRUE;
	}

	public function deleteJeniskomp($id)
	{
		$this->db->delete('jenis_komplain', array('JENIS_KOMPLAIN' => $id));
	}
}

/* End of file jenis_komplain_model.php */