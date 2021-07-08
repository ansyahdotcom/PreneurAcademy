<?php

class M_dashboarduser extends CI_Model{

    public function getAll(){

        $data = $this->db->get('peserta');

		return $data->num_rows();
    }
    
}