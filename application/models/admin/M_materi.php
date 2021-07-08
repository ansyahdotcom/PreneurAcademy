<?php

class M_materi extends CI_Model{
	
	// GET DATA MATERI
	function get_materi($id){
		$result = $this->db->query("SELECT * FROM detail_materi, kelas, materi WHERE
        detail_materi.ID_MT = materi.ID_MT AND kelas.ID_KLS = detail_materi.ID_KLS AND kelas.ID_KLS = '$id'");
		return $result->result_array();
	}

	function get_tugas(){
		$result = $this->db->query("SELECT * FROM tugas");
		return $result->result_array();
	}

	// GET DATA SUB
	// function get_sub($id){
	// 	$this->db->select('*');
	// 	$this->db->from('materi_sub');
	// 	$this->db->join('materi', 'materi_sub.ID_MT = materi.ID_MT', 'left');
	// 	$this->db->where('materi.ID_MT', $id);
	// 	return $this->db->get()->result_array();
	// }

	// CREATE

	function selectMaxID_TUGAS()
    {
        $query = $this->db->query("SELECT MAX(ID_TG) AS ID_TG FROM tugas");
        $hasil = $query->row();
        return $hasil->ID_TG;
	}
	
	function create($data, $table){
		$this->db->insert($table, $data);
	}

	function create_($materi,$detail,$id_kelas){
		$this->db->trans_start();
			//INSERT KE MATERI
			$data  = array(
				'NM_MT' => $materi,
				'DETAIL_MT' => $detail
			);
			$this->db->insert('materi', $data);
			//GET ID MATERI
			$materi_id = $this->db->insert_id();
			$result = array();
				    $result[] = array(
				    	'ID_MT'  	=> $materi_id,
				    	'ID_KLS'  => $_POST['id_kelas']
				    );      
			//INSERT KE DETAIL TABLE
			$this->db->insert_batch('detail_materi', $result);
		$this->db->trans_complete();
	}
	
	// INSERT
	function upload_($data, $table)
    {
        // $this->db->where($where);
        $this->db->insert($table, $data);
    }
	// UPDATE
	function update_($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	// DELETE
	function delete_($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
?>