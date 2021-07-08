<?php

class M_blog extends CI_Model
{

    function tampil_blog()
    {
        $data = $this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                post.FOTO_POST, post.ST_POST, GROUP_CONCAT(tags.NM_TAGS) AS NM_TAGS, category.NM_CT
                                FROM post, category, detail_tags, tags
                                WHERE post.ID_CT = category.ID_CT AND post.ID_POST = detail_tags.ID_POST 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST DESC");
        return $data;
    }

    // tampil kategori di select
    function tampil_kategori()
    {
        $data = $this->db->query("SELECT ID_CT, NM_CT FROM category ORDER BY ID_CT DESC");
        return $data;
    }

    // tampil tags di select
    function tampil_tags()
    {
        $data = $this->db->query("SELECT ID_TAGS, NM_TAGS FROM tags ORDER BY ID_TAGS DESC");
        return $data;
    }

    
    // nyari data id post terakhir
    function selectMaxID_POST()
    {
        $query = $this->db->query("SELECT MAX(ID_POST) AS ID_POST FROM post");
        $hasil = $query->row();
        return $hasil->ID_POST;
    }
    
    // nyari data id kategori terakhir
    function selectMaxID_CT()
    {
        $query = $this->db->query("SELECT MAX(ID_CT) AS ID_CT FROM category");
        $hasil = $query->row();
        return $hasil->ID_CT;
    }
    
    // nyari data id tag terakhir
    function selectMaxID_TAGS()
    {
        $query = $this->db->query("SELECT MAX(ID_TAGS) AS ID_TAGS FROM tags");
        $hasil = $query->row();
        return $hasil->ID_TAGS;
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
    
    function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    
    // nampilin tag yg mau diedit
    function tampil_edit_tag($JUDUL)
    {
        $query = $this->db->query("SELECT detail_tags.ID_POST, detail_tags.ID_TAGS FROM detail_tags, post 
                                    WHERE post.JUDUL_POST = '$JUDUL' AND detail_tags.ID_POST = post.ID_POST");
        return $query;
    }
    
    // pratinjau
    function tampil_dt_blog($JUDUL_POST)
    {
        $data=$this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, 
                                post.TGL_POST, post.FOTO_POST, post.UPDT_TRAKHIR, post.ST_POST, category.NM_CT 
                                FROM post, category
                                WHERE post.ID_CT = category.ID_CT
                                AND post.JUDUL_POST =  '$JUDUL_POST'");
        return $data;
    }
    
    // tampil tags yg bawahnya judul
    function tampil_dt_tags($JUDUL_POST)
    {
        $data = $this->db->query("SELECT detail_tags.ID_POST, detail_tags.ID_TAGS, tags.NM_TAGS 
                                FROM detail_tags, tags, post 
                                WHERE detail_tags.ID_TAGS = tags.ID_TAGS
                                AND detail_tags.ID_POST = post.ID_POST
                                AND post.JUDUL_POST = '$JUDUL_POST'");
        return $data;
    }
    

}