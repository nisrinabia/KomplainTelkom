<?php

class Media_model extends CI_Model
{
	public function getListMedia()
 	{
 		$query = $this->db->get('media');

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

	public function addMedia($nama_media)
	{
		$result = $this->db->get_where('media',
			array
			(
				'NAMA_MEDIA' => $nama_media
			)
		);

		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->insert('media',
				array
				(
					'NAMA_MEDIA' => $nama_media
				)
			); 
			return TRUE;
		}
	}

	public function editMedia($id)
	{
    	$query = $this->db->get_where('media', array('NAMA_MEDIA' => $id));
    	if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
        }
    }

    public function updateMedia($id, $nama_media)
    {
    	$q = $this->db->get_where('media', array('NAMA_MEDIA' => $id));
    	$media =  $q->row()->NAMA_MEDIA;
		$result = $this->db->get_where('media', array('NAMA_MEDIA' => $nama_media));

		if ($result->num_rows() > 0)
		{
			//echo "apakah disini?";
			if ($nama_media != $media)
			{
				return FALSE;
			}
		}
		$this->db->where('NAMA_MEDIA', $id);
		$this->db->update('media', array('NAMA_MEDIA' => $nama_media));
		return TRUE;
	}

	public function deleteMedia($id)
	{
		$this->db->delete('media', array('NAMA_MEDIA' => $id));
	}
}

/* End of file media_model.php */