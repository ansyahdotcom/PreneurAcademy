<?php 
class M_diskon extends CI_Model
{
    public function getdiskon()
    {
        $diskon = $this->db->get('diskon')->result_array();
        return $diskon;
    }

    public function deldis($id)
    {
        $this->db->where('ID_DISKON', $id);
        $this->db->delete('diskon');
        return $this->db;
    }

    public function nondis($id)
    {   
        $this->db->set('STATUS', 0);
        $this->db->where('ID_DISKON', $id);
        $this->db->update('diskon');
        return $this->db;
    }

    public function akdis($id)
    {   
        $this->db->set('STATUS', 1);
        $this->db->where('ID_DISKON', $id);
        $this->db->update('diskon');
        return $this->db;
    }
}
?>