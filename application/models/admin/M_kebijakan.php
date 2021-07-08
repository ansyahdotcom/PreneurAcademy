<?php
class M_kebijakan extends CI_Model{

    function get_data(){
        $query = $this->db->get('kebijakan');
        return $query->result_array();
    }

    function insert($name,$link,$isi){
		$data = array(
			'NM_KB' => $name,
			'LINK_KB' => $link, 
			'ISI_KB' => $isi,  
		);
		$this->db->insert('kebijakan',$data);
	}

	function update($id,$name,$link,$isi){
		$this->db->set('NM_KB',$name);
		$this->db->set('LINK_KB',$link);
		$this->db->set('ISI_KB',$isi);
		$this->db->where('ID_KB',$id);
		$this->db->update('kebijakan');
	}

	function delete($id){
		$query = $this->db->delete('kebijakan', array('ID_KB' => $id));
        return $query;
	}

}
?>