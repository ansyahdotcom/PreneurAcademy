<?php
class M_ktgkelas extends CI_Model
{
    public function getktgkelas()
    {
        $ktgkelas = $this->db->get('ktg_kelas')->result_array();
        return $ktgkelas;
    }

    public function delktg($id)
    {
        $this->db->where('ID_KTGKLS', $id);
        $this->db->delete('ktg_kelas');
        return $this->db;
    }
}
?>