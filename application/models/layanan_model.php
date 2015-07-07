<?php

class Layanan_model extends CI_Model
{
	public function getListLayanan()
 	{
 		$query = $this->db->get_where('layanan', array('STATUS' => 1));

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
        	return FALSE;	
        }
 	}

	public function addLayanan($nama_layanan)
	{
		//Select apakah data yang diinputkan ke database sudah pernah terdaftar
    	$query = $this->db->get_where('layanan', array('NAMA_LAYANAN' => $nama_layanan));

    	//Cek. Jika telah terdaftar, huh.. 
    	if ($query->num_rows() > 0)
		{
			//Cek apakah data yang diinputkan ke database telah terdaftar dan berstatus 1 (aktif)
			$cek_if_active = $this->db->get_where('layanan', array('NAMA_LAYANAN' => $nama_layanan, 'STATUS' => 1));

			//Jika ada, TOLAK! Kita gamau ada duplikasi data, kan?
			if ($cek_if_active->num_rows() > 0)
			{
				return FALSE;
			}
			//Jika tidak, maka ubah status record yang telah terdaftar tadi ($nama_layanan) menjadi 1
			else
			{
				$this->db->where('NAMA_LAYANAN', $nama_layanan);
				$this->db->update('layanan', array('STATUS' => 1));
				return TRUE;
			}
		}
		//Jika tidak ada, insert saja yang baru
		else
		{	
			$this->db->insert('layanan',array(
											'NAMA_LAYANAN' => $nama_layanan, 
											'STATUS' => 1
											));
			return TRUE;
		}
	}

	public function editLayanan($id)
	{
    	$query = $this->db->get_where('layanan', array('NAMA_LAYANAN' => $id));
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
    	//Kalau yang diinputkan sama, nakalan pasti ini. Langsung tolak dan munculkan pesan error
		//Walaupun beda satu huruf gede kecilnya atau alay sekalipun
    	$cek_input = strtolower($nama_layanan);
    	$cek_id = strtolower($id);
		if($cek_input == $cek_id)
		{
			return FALSE;
		}

    	//Select apakah data yang diinputkan ke database sudah pernah terdaftar
    	$query = $this->db->get_where('layanan', array('NAMA_LAYANAN' => $nama_layanan));

    	//Cek. Jika telah terdaftar, huh.. 
    	if ($query->num_rows() > 0)
		{
			//Maka ubah status record yang diganti ($id) menjadi 0
			//Dan ubah status record yang diinputkan dan telah terdaftar ($nama_layanan) menjadi 1
			$this->db->where('NAMA_LAYANAN', $nama_layanan);
			$this->db->update('layanan', array('STATUS' => 1));

			$this->db->where('NAMA_LAYANAN', $id);
			$this->db->update('layanan', array('STATUS' => 0));
			return TRUE;
		}
		//Jika tidak ada, yey. Tinggal ganti status record yang diganti ($id) menjadi 0
		//Kemudian insert ke database inputan baru dari pengguna
		//Status record yang diinsertkan menjadi 1
		else
		{
			$this->db->where('NAMA_LAYANAN', $id);
			$this->db->update('layanan', array('STATUS' => 0));
			
			$this->db->insert('layanan',array(
											'NAMA_LAYANAN' => $nama_layanan, 
											'STATUS' => 1
											));
			return TRUE;
		}
	}

	public function deleteLayanan($nama_layanan)
	{
		//Simple and straightforward. Cukup ubah statusnya menjadi 0
		$this->db->where('NAMA_LAYANAN', $nama_layanan);
		$this->db->update('layanan', array('STATUS' => 0));
	}
}

/* End of file layanan_model.php */