<?php

class Komplain_model extends CI_Model
{
/*  
    public function addKomplain($datakomplain)
	{
		$this->db->insert('komplain', $datakomplain);
		return TRUE;
	}
*/
    public function addKomplain($nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline)
    {

        $sql = "INSERT INTO KOMPLAIN (NAMA_MEDIA, NAMA_LAYANAN, JENIS_KOMPLAIN, TGL_CLOSE, KELUHAN, SOLUSI, STATUS_KOMPLAIN, KETERANGAN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, PIC_PELAPOR, DEADLINE) VALUES ('$namamedia', '$namalayanan', '$jeniskomplain', STR_TO_DATE('$tglclosed','%m-%d-%Y'), '$keluhan', '$solusi', '$statuskomplain', '$ket', '$nopots', '$noinet', '$nama', '$alamat', '$pic', STR_TO_DATE('$deadline','%m/%d/%Y %T'))";
        return $this->db->query($sql);

    }

    public function addKomplainByFile($NO_POTS,$NO_INTERNET,$NAMA_PELAPOR,$PIC_PELAPOR,$ALAMAT_PELAPOR,$TGL_KOMPLAIN,$NAMA_MEDIA,$NAMA_LAYANAN,$JENIS_KOMPLAIN,$KELUHAN,$SOLUSI,$DEADLINE,$STATUS_KOMPLAIN,$TGL_CLOSE, $KETERANGAN)
    {
        $sql = "INSERT INTO KOMPLAIN (NAMA_MEDIA, NAMA_LAYANAN, JENIS_KOMPLAIN, TGL_KOMPLAIN, TGL_CLOSE, KELUHAN, SOLUSI, STATUS_KOMPLAIN, KETERANGAN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, PIC_PELAPOR, DEADLINE) VALUES ('$NAMA_MEDIA', '$NAMA_LAYANAN', '$JENIS_KOMPLAIN', STR_TO_DATE('$TGL_KOMPLAIN','%Y/%m/%d %T'), STR_TO_DATE('$TGL_CLOSE','%Y/%m/%d'), '$KELUHAN', '$SOLUSI', '$STATUS_KOMPLAIN', '$KETERANGAN', '$NO_POTS', '$NO_INTERNET', '$NAMA_PELAPOR', '$ALAMAT_PELAPOR', '$PIC_PELAPOR', STR_TO_DATE('$DEADLINE','%Y/%m/%d %T'))";
        return $this->db->query($sql);

    }

	public function uploadKomplain()
	{
		$sql = "INSERT into subject (`SUBJ_ID`,`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
                            values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
        $result = mysql_query( $sql, $conn );
    }

	public function showKomplainByPOTS($nopots)
    {
        //Select all
        
        //$query = $this->db->get('komplain');
        $q = "SELECT ID_KOMPLAIN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, KOMPLAIN.NAMA_LAYANAN, KOMPLAIN.JENIS_KOMPLAIN, TGL_KOMPLAIN, TGL_CLOSE, STATUS_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN and KOMPLAIN.NO_POTS = '$nopots'";
		$query = $this->db->query($q);

		//echo $query;
        /*$this->db->select('*');
        $this->db->from('komplain');
        $this->db->where('NO_POTS', $nopots);
        $this->db->join('media', 'media.ID_MEDIA = komplain.ID_MEDIA');
        $this->db->join('layanan', 'layanan.ID_LAYANAN = komplain.ID_LAYANAN');
        $this->db->join('jenis_komplain', 'media.ID_JENIS_KOMPLAIN = komplain.ID');

        $query = $this->db->get();*/

        if ($query -> num_rows() > 0)
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

    public function showAllKomplain(){
        $q = "SELECT ID_KOMPLAIN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, KOMPLAIN.NAMA_LAYANAN, KOMPLAIN.JENIS_KOMPLAIN, TGL_KOMPLAIN, TGL_CLOSE, STATUS_KOMPLAIN FROM KOMPLAIN, MEDIA, LAYANAN, JENIS_KOMPLAIN WHERE MEDIA.NAMA_MEDIA = KOMPLAIN.NAMA_MEDIA and LAYANAN.NAMA_LAYANAN = KOMPLAIN.NAMA_LAYANAN and JENIS_KOMPLAIN.JENIS = KOMPLAIN.JENIS_KOMPLAIN";
        $query = $this->db->query($q);

        if ($query -> num_rows() > 0)
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

    public function editKomplain($id){
        $query = $this->db->get_where('komplain', array('ID_KOMPLAIN' => $id));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }

    public function updateKomplain($id, $nopots, $noinet, $nama, $alamat, $pic, $namamedia, $namalayanan, $jeniskomplain, $tglclosed, $keluhan, $solusi, $statuskomplain, $ket, $deadline){        
        //$this->db->where('ID_KOMPLAIN', $id);
        //$this->db->update('komplain', $datakomplain);
        //return TRUE;
        $sql ="UPDATE KOMPLAIN SET NO_POTS='$nopots', NO_INTERNET='$noinet', NAMA_PELAPOR='$nama', ALAMAT_PELAPOR='$alamat', PIC_PELAPOR='$pic', NAMA_MEDIA='$namamedia', NAMA_LAYANAN='$namalayanan', JENIS_KOMPLAIN='$jeniskomplain', TGL_CLOSE='STR_TO_DATE('$tglclosed','%m-%d-%Y')', KELUHAN='$keluhan', SOLUSI='$solusi', STATUS_KOMPLAIN='$statuskomplain', KETERANGAN='$ket', DEADLINE='STR_TO_DATE('$deadline','%m/%d/%Y %T')' WHERE ID_KOMPLAIN='$id'";
        //$sql = "INSERT INTO KOMPLAIN (NAMA_MEDIA, NAMA_LAYANAN, JENIS_KOMPLAIN, TGL_CLOSE, KELUHAN, SOLUSI, STATUS_KOMPLAIN, KETERANGAN, NO_POTS, NO_INTERNET, NAMA_PELAPOR, ALAMAT_PELAPOR, PIC_PELAPOR, DEADLINE) VALUES ('$namamedia', '$namalayanan', '$jeniskomplain', STR_TO_DATE('$tglclosed','%m-%d-%Y'), '$keluhan', '$solusi', '$statuskomplain', '$ket', '$nopots', '$noinet', '$nama', '$alamat', '$pic', STR_TO_DATE('$deadline','%m/%d/%Y %T'))";
        return $this->db->query($sql);
    }

    public function getDataKomplain($id){
        $query = $this->db->get_where('komplain',
            array
            (
                'ID_KOMPLAIN' => $id
            )
        );

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

    public function unggahDokumen($id, $data)
    {
        $this->db->where('ID_KOMPLAIN', $id);
        $this->db->update('komplain', $data); 
        return true;
    }

    public function deleteKomplain($id){
        $this->db->delete('komplain', array('ID_KOMPLAIN' => $id));
    }
}