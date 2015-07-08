<?php

class Media_model extends CI_Model
{
	public function getListMedia()
 	{
 		//List semua media yang berstatus 1 (aktif)
 		$query = $this->db->get_where('media', array('STATUS' => 1));;

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
		//Select apakah data yang diinputkan ke database sudah pernah terdaftar
    	$query = $this->db->get_where('media', array('NAMA_MEDIA' => $nama_media));

    	//Cek. Jika telah terdaftar, huh.. 
    	if ($query->num_rows() > 0)
		{
			//Cek apakah data yang diinputkan ke database telah terdaftar dan berstatus 1 (aktif)
			$cek_if_active = $this->db->get_where('media', array('NAMA_MEDIA' => $nama_media, 'STATUS' => 1));

			//Jika ada, TOLAK! Kita gamau ada duplikasi data, kan?
			if ($cek_if_active->num_rows() > 0)
			{
				return FALSE;
			}
			//Jika tidak, maka ubah status record yang telah terdaftar tadi ($nama_media) menjadi 1
			else
			{
				$this->db->where('NAMA_MEDIA', $nama_media);
				$this->db->update('media', array('STATUS' => 1));
				return TRUE;
			}
		}
		//Jika tidak ada, insert saja yang baru
		else
		{	
			$this->db->insert('media',array(
											'NAMA_MEDIA' => $nama_media, 
											'STATUS' => 1
											));
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
		//Kalau yang diinputkan sama, nakalan pasti ini. Langsung tolak dan munculkan pesan error
		//Walaupun beda satu huruf gede kecilnya atau alay sekalipun
    	$cek_input = strtolower($nama_media);
    	$cek_id = strtolower($id);
		if($cek_input == $cek_id)
		{
			return FALSE;
		}

    	//Select apakah data yang diinputkan ke database sudah pernah terdaftar
    	$query = $this->db->get_where('media', array('NAMA_MEDIA' => $nama_media));

    	//Cek. Jika telah terdaftar, huh.. 
    	if ($query->num_rows() > 0)
		{
			//Maka ubah status record yang diganti ($id) menjadi 0
			//Dan ubah status record yang diinputkan dan telah terdaftar ($nama_media) menjadi 1
			$this->db->where('NAMA_MEDIA', $nama_media);
			$this->db->update('media', array('STATUS' => 1));

			$this->db->where('NAMA_MEDIA', $id);
			$this->db->update('media', array('STATUS' => 0));
			return TRUE;
		}
		//Jika tidak ada, yey. Tinggal ganti status record yang diganti ($id) menjadi 0
		//Kemudian insert ke database inputan baru dari pengguna
		//Status record yang diinsertkan menjadi 1
		else
		{
			$this->db->where('NAMA_MEDIA', $id);
			$this->db->update('media', array('STATUS' => 0));
			
			$this->db->insert('media',array(
											'NAMA_MEDIA' => $nama_media, 
											'STATUS' => 1
											));
			return TRUE;
		}
	}

	public function deleteMedia($nama_media)
	{
		//Simple and straightforward. Cukup ubah statusnya menjadi 0
		$this->db->where('NAMA_MEDIA', $nama_media);
		$this->db->update('media', array('STATUS' => 0));
	}
}

/* End of file media_model.php */