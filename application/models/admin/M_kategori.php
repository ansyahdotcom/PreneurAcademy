<?php

class M_kategori extends CI_Model
{
    public function tampil_kategori()
    {
        $data = $this->db->query("SELECT ID_CT, NM_CT FROM category ORDER BY ID_CT ASC");
        return $data;
    }

    //hapus kategori
    public function hapus_kategori($ID_CT)
    {
        $hasil = $this->db->query("DELETE FROM category WHERE ID_CT='$ID_CT'");
        return $hasil;
    }

    // nyari data id kategori terakhir
    public function selectMaxID_CT()
    {
        $query = $this->db->query("SELECT MAX(ID_CT) AS ID_CT FROM category");
        $hasil = $query->row();
        return $hasil->ID_CT;
    }

    // tambah kategori
    function tmbh_kategori($ID_CT, $NM_CT)
    {
        $this->db->query("INSERT INTO category ( ID_CT, NM_CT ) VALUES('$ID_CT', '$NM_CT')");
    }

    //update kategori
    function update_kategori($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
