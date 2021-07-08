<?php

class M_webinar extends CI_Model
{

    function tampil_webinar()
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM
                                ORDER BY webinar.TGL_WEB DESC");
        return $data;
    }

    // nyari data id webinar terakhir
    function selectMaxID_WEBINAR()
    {
        $query = $this->db->query("SELECT MAX(ID_WEBINAR) AS ID_WEBINAR FROM webinar");
        $hasil = $query->row();
        return $hasil->ID_WEBINAR;
    }

    function platform()
    {
        $data = $this->db->query("SELECT * FROM platform");
        return $data;
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

    function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    function delete_ps($ID_PS, $ID_WEBINAR)
    {
        $this->db->query("DELETE FROM peserta_wbnr WHERE peserta_wbnr.ID_WEBINAR = '$ID_WEBINAR' AND peserta_wbnr.ID_PS = '$ID_PS'");
    }

    // pratinjau
    function tampil_dt_webinar($JUDUL_WEBINAR)
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM AND
                                     webinar.JUDUL_WEBINAR =  '$JUDUL_WEBINAR'");
        return $data;
    }

    // tampil list peserta
    function list_ps($JUDUL_WEBINAR)
    {
        $data = $this->db->query("SELECT peserta_wbnr.ID_PS, peserta_wbnr.ID_WEBINAR, peserta.NM_PS, peserta.PEKERJAAN FROM peserta_wbnr, peserta, webinar 
                                    WHERE peserta_wbnr.ID_PS = peserta.ID_PS AND peserta_wbnr.ID_WEBINAR = webinar.ID_WEBINAR
                                    AND webinar.JUDUL_WEBINAR = '$JUDUL_WEBINAR'
                                    ORDER BY peserta_wbnr.DATE_PS_WBNR DESC");
        return $data;
    }

    function list_ps2($JUDUL_WEBINAR) 
    {
        $data = $this->db->query("SELECT * FROM webinar WHERE JUDUL_WEBINAR = '$JUDUL_WEBINAR'");
        return $data;
    }
}
