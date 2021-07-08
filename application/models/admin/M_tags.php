<?php

class M_tags extends CI_Model
{
    public function tampil_tags()
    {
        $data = $this->db->query("SELECT ID_TAGS, NM_TAGS FROM tags ORDER BY ID_TAGS ASC");
        return $data;
    }

    //hapus tags
    public function hapus_tags($ID_TAGS)
    {
        $hasil = $this->db->query("DELETE FROM tags WHERE ID_TAGS='$ID_TAGS'");
        return $hasil;
    }

    // nyari data id tags terakhir
    public function selectMaxID_TAGS()
    {
        $query = $this->db->query("SELECT MAX(ID_TAGS) AS ID_TAGS FROM tags");
        $hasil = $query->row();
        return $hasil->ID_TAGS;
    }

    // tambah tags
    function tmbh_tags($ID_TAGS, $NM_TAGS)
    {
        $this->db->query("INSERT INTO tags ( ID_TAGS, NM_TAGS ) VALUES('$ID_TAGS', '$NM_TAGS')");
    }

    //update tags
    function update_tags($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
