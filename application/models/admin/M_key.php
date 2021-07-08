<?php

class M_key extends CI_Model{

    function get_key(){
		$query  = $this->db->get('key');
        return $query->result_array();
    }
    
    function insert($name,$key1,$key2,$status){
		$data = array(
			'NM_KEY' => $name,
			'KEY_1' => $key1, 
			'KEY_2' => $key2, 
			'STATUS' => $status, 
		);
		$this->db->insert('key',$data);
	}

	function update_key($id,$name,$key1,$key2,$status){
		$this->db->set('NM_KEY',$name);
		$this->db->set('KEY_1',$key1);
		$this->db->set('KEY_2',$key2);
		$this->db->set('STATUS',$status);
		$this->db->where('ID_KEY',$id);
		$this->db->update('key');
	}

	function delete_key($id){
		$query = $this->db->delete('key', array('ID_KEY' => $id));
        return $query;
	}

}