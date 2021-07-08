<?php
class M_restore extends CI_Model
{
    function droptable()
    {
        $check = $this->db->query("SHOW TABLES");

        // Contoh drop satu tabel
        if ($check->num_rows() > 0) {
            $query = $this->db->query("DROP TABLE
            detail_kelas");
            return $query;
        } else {
            return true;
        }
    }
}