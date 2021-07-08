<?php

class M_medsos extends CI_Model{

    function get_data(){
        $query = $this->db->get('medsos');
        return $query->result_array();
    }

    function insert($name,$icon,$link){
		$data = array(
			'NM_MS' => $name,
			'IC_MS' => $icon, 
			'LINK_MS' => $link, 
		);
		$this->db->insert('medsos',$data);
	}

	function update_ms($id,$name,$icon,$link){
		$this->db->set('NM_MS',$name);
		$this->db->set('IC_MS',$icon);
		$this->db->set('LINK_MS',$link);
		$this->db->where('ID_MS',$id);
		$this->db->update('medsos');
	}

	function delete_ms($id){
		$query = $this->db->delete('medsos', array('ID_MS' => $id));
        return $query;
	}

}