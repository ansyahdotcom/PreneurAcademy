<?php
class M_landingpage extends CI_Model
{

    function tampil_blog_web()
    {
        $data = $this->db->query("SELECT admin.ID_ADM, admin.NM_ADM, admin.FTO_ADM, post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST,
                                post.FOTO_POST, GROUP_CONCAT(tags.NM_TAGS) AS NM_TAGS, post.ST_POST, category.NM_CT
                                FROM admin, post, category, detail_tags, tags
                                WHERE post.ID_CT = category.ID_CT AND post.ID_POST = detail_tags.ID_POST
                                AND post.ID_ADM = admin.ID_ADM 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS AND post.ST_POST = 1
                                GROUP BY post.ID_POST
                                ORDER BY post.ID_POST ASC");
        return $data;
    }

    function get_blog_list($limit, $start)
    {
        $query = $this->db->get('post', $limit, $start);
        return $query;
    }

    function kebijakan()
    {
        $data = $this->db->get('kebijakan');
        return $data->result();
    }

    // pratinjau
    function tampil_dt_blog($JUDUL_POST)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.ID_CT, post.JUDUL_POST, post.KONTEN_POST, 
                                post.TGL_POST, post.FOTO_POST, post.UPDT_TRAKHIR, post.ST_POST, category.NM_CT 
                                FROM post, category
                                WHERE post.ID_CT = category.ID_CT
                                AND post.JUDUL_POST =  '$JUDUL_POST'");
        return $data;
    }

    function legal($LINK_KB)
    {
        $data = $this->db->query("SELECT * FROM kebijakan WHERE kebijakan.LINK_KB = '$LINK_KB'");
        return $data;
    }

    function list()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->limit(3);
        $this->db->where('post.ST_POST', 1);
        $this->db->order_by('ID_POST', 'DESC');
        return $this->db->get()->result();
    }

    // tampil tags yg bawahnya judul
    function tampil_dt_tags($JUDUL_POST)
    {
        $data = $this->db->query("SELECT detail_tags.ID_POST, detail_tags.ID_TAGS, tags.NM_TAGS 
                                FROM detail_tags, tags, post, admin
                                WHERE detail_tags.ID_TAGS = tags.ID_TAGS
                                AND detail_tags.ID_POST = post.ID_POST
                                AND post.JUDUL_POST = '$JUDUL_POST'");
        return $data;
    }

    // tampil artikel yg kategori sama
    function category($NM_CT)
    {
        $data = $this->db->query("SELECT post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                    post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                    FROM post, category
                                    WHERE post.ID_CT = category.ID_CT
                                    AND category.NM_CT = '$NM_CT'");
        return $data;
    }

    // tampil artikel yg tag sama
    function tag($NM_TAGS)
    {
        $data = $this->db->query("SELECT admin.ID_ADM, admin.FTO_ADM, admin.NM_ADM, post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                FROM post, detail_tags, tags, category, admin
                                WHERE post.ID_POST = detail_tags.ID_POST 
                                AND detail_tags.ID_TAGS = tags.ID_TAGS
                                AND post.ID_CT = category.ID_CT
                                AND admin.ID_ADM = post.ID_ADM
                                AND tags.NM_TAGS = '$NM_TAGS'");
        return $data;
    }

    function kelas()
    {
        $data = $this->db->query("SELECT * FROM kelas, ktg_kelas, admin WHERE kelas.ID_ADM = admin.ID_ADM AND kelas.ID_KTGKLS = ktg_kelas.ID_KTGKLS AND kelas.STAT = 1");
        return $data;
    }

    function dt_kls($PERMALINK)
    {
        $data = $this->db->query("SELECT * FROM kelas, ktg_kelas,admin WHERE kelas.ID_KTGKLS = ktg_kelas.ID_KTGKLS AND admin.ID_ADM = kelas.ID_ADM AND kelas.PERMALINK = '$PERMALINK'");
        return $data;
    }

    function materi($ID_KLS)
    {
        $data = $this->db->query("SELECT * FROM materi, materi_sub, kelas WHERE materi.ID_MT = materi_sub.ID_MT AND ID_KLS = '$ID_KLS' ORDER BY materi.ID_MT DESC ");
        return $data;
    }

    function webinar()
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM AND webinar.ST_POSTWEB = 1 ORDER BY webinar.TGL_WEB ASC");
        return $data;
    }

    function dt_webinar($JUDUL_WEBINAR)
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM AND webinar.JUDUL_WEBINAR = '$JUDUL_WEBINAR'");
        return $data;
    }
}