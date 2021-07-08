<?php

class M_navbar extends CI_Model{
	
	function get_navbar(){
		$query = $this->db->get('navbar');
		return $query->result_array();
	}

	function insert_navbar($name,$slug){
		$data = array(
			'NM_NV' => $name,
			'LINK_NV' => $slug 
		);
		$this->db->insert('navbar',$data);
	}

	function update_navbar($id,$name,$slug){
		$this->db->set('NM_NV',$name);
		$this->db->set('LINK_NV',$slug);
		$this->db->where('ID_NV',$id);
		$this->db->update('navbar');
	}

	function delete_navbar($id){
		$this->db->trans_start();
		$this->db->query("DELETE FROM navbar WHERE PR_ID ='$id'");
		$this->db->query("DELETE FROM navbar WHERE ID_NV ='$id'");
		$this->db->trans_complete();
	}

	function insert_subnavbar($name,$slug,$id){
		$data = array(
			'NM_NV' => $name,
			'LINK_NV' => $slug,
			'PR_ID' => $id 
		);
		$this->db->insert('navbar',$data);
	}
}