<?php

class Akun extends CI_Model
{
	public function login($username, $password)
	{

		$result = $this->db->get_where('akun',
			array
			(
				'username' => $username,
				'password' => $password
			)
		);

		if ($result->num_rows() > 0)
		{
			$this->db->query("CALL checkClose()");
			return TRUE;
		}

		else
		{
			return FALSE;
		}

	}

	public function get_name($username){
		$q = $this->db->get_where('akun', array('username' => $username));
		return $q->row()->NAMA_LENGKAP;
	}

	public function get_jabatan($username){
		$q = $this->db->get_where('akun', array('username' => $username));
		return $q->row()->JABATAN;
	}
	
	public function tambahUser($username, $data){
		$result = $this->db->get_where('akun',
			array
			(
				'username' => $username
			)
		);

		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$this->db->insert('akun', $data); 
			return TRUE;
		}
	}

	public function getListUser()
 	{	
 		$query = $this->db->get('akun');

		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else{
        	return false;	
        }
 	}

 	/*public function record_count() {
        return $this->db->count_all('akun');
    }*/

    public function edit($id) {
    	$query = $this->db->get_where('akun', array('ID_AKUN' => $id));
    	if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else 
        {
            return FALSE;
        }
    }

    public function delete($id)
	{
		$this->db->delete('akun', array('ID_AKUN' => $id));
		//$this->db->query("delete from galeri where id_foto='$id'");
	}

    public function update($id, $username, $data){
    	$q = $this->db->get_where('akun', array('ID_AKUN' => $id));
		$user =  $q->row()->USERNAME;
		$result = $this->db->get_where('akun', array('username' => $username));

		if ($result->num_rows() > 0){
			if ($username != $user){
				return FALSE;
			}
		}
		$this->db->where('ID_AKUN', $id);
		$this->db->update('akun', $data); 
		return TRUE;
			
	}

	/*public function getListAkses($username){
		$q = $this->db->get_where('akun', array('username' => $username));
		return $q->row()->akses;
	}*/
}

/* End of file akun.php */