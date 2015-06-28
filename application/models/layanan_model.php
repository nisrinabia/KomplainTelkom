<?php

class Layanan_model extends CI_Model
{
	public function getListLayanan()
 	{
 		$query = $this->db->get('layanan');

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

	public function addLayanan($nama_layanan)
	{
		$result = $this->db->get_where('layanan',
			array
			(
				'NAMA_LAYANAN' => $nama_layanan
			)
		);

		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->insert('layanan',
				array
				(
					'NAMA_LAYANAN' => $nama_layanan
				)
			); 
			return TRUE;
		}
	}

	public function editLayanan($id)
	{
    	$query = $this->db->get_where('layanan', array('ID_LAYANAN' => $id));
    	if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
        }
    }

    public function updateLayanan($id, $nama_layanan)
    {
    	$q = $this->db->get_where('layanan', array('ID_LAYANAN' => $id));
    	$layanan =  $q->row()->NAMA_layanan;
		$result = $this->db->get_where('layanan', array('NAMA_LAYANAN' => $nama_layanan));

		if ($result->num_rows() > 0)
		{
			//echo "apakah disini?";
			if ($nama_layanan != $layanan)
			{
				return FALSE;
			}
		}
		$this->db->where('ID_LAYANAN', $id);
		$this->db->update('layanan', array('NAMA_LAYANAN' => $nama_layanan));
		return TRUE;
	}

	public function deleteLayanan($id)
	{
		$this->db->delete('layanan', array('ID_LAYANAN' => $id));
	}
}

/* End of file layanan_model.php */