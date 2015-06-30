<?php

class Janji_model extends CI_Model
{
	public function getListJanji()
 	{
 		//Select all
 		$this->db->select('k.ID_KOMPLAIN,k.NO_POTS, k.NO_INTERNET, k.NAMA_PELAPOR, k.ALAMAT_PELAPOR, m.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS_KOMPLAIN, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.KELUHAN, k.SOLUSI, k.STATUS_KOMPLAIN, k.KETERANGAN, k.DOKUMEN, k.DEADLINE');
 		$this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j');
 		$this->db->where('k.ID_MEDIA = m.ID_MEDIA AND k.ID_LAYANAN = l.ID_LAYANAN AND k.ID_JENIS_KOMPLAIN = j.ID_JENIS_KOMPLAIN');

 		$query = $this->db->get();

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

 	public function getInfoKomplain($id)
 	{
 		//Select all
 		$this->db->select('k.ID_KOMPLAIN, p.NO_POTS, p.NO_INTERNET, pe.NAMA_PELANGGAN, pe.ALAMAT_PELANGGAN, m.NAMA_MEDIA, l.NAMA_LAYANAN, j.JENIS_KOMPLAIN, k.TGL_KOMPLAIN, k.TGL_CLOSE, k.KELUHAN, k.SOLUSI, k.STATUS_KOMPLAIN, k.KETERANGAN, k.DOKUMEN, k.DEADLINE');
 		$this->db->from('komplain as k, media as m, layanan as l, jenis_komplain as j, pelanggan as pe, pots as p, data_komplain as komp');
 		$this->db->where('pe.ID_PELANGGAN = p.ID_PELANGGAN AND p.ID_POTS = komp.ID_POTS AND komp.ID_KOMPLAIN = k.ID_KOMPLAIN AND k.ID_MEDIA = m.ID_MEDIA AND k.ID_LAYANAN = l.ID_LAYANAN AND k.ID_JENIS_KOMPLAIN = j.ID_JENIS_KOMPLAIN AND k.ID_KOMPLAIN = $id');

 		$query = $this->db->get();

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
    	$query = $this->db->get_where('media', array('ID_MEDIA' => $id));
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
    	$q = $this->db->get_where('media', array('ID_MEDIA' => $id));
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
		$this->db->where('ID_MEDIA', $id);
		$this->db->update('media', array('NAMA_MEDIA' => $nama_media));
		return TRUE;
	}

	public function deleteMedia($id)
	{
		$this->db->delete('media', array('ID_MEDIA' => $id));
	}
}

/* End of file media_model.php */