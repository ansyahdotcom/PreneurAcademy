<?php

class M_listpeserta extends CI_Model
{
    function tampil($ID_KLS)
    {
        $data = $this->db->query("SELECT detail_kelas.ID_PS, detail_kelas.ID_KLS, peserta.NM_PS, peserta.KOTA,
                                    peserta.PEKERJAAN, peserta.UNIVERSITAS, peserta.HP_PS, peserta.ALMT_PS
                                    FROM kelas, detail_kelas, peserta
                                    WHERE detail_kelas.ID_KLS = kelas.ID_KLS 
                                    AND detail_kelas.ID_PS = peserta.ID_PS
                                    AND kelas.ID_KLS = $ID_KLS
                                    ORDER BY detail_kelas.ID_PS ASC");
                                    
        return $data;
    }

    function tampil_ps()
    {
        $data = $this->db->query("SELECT * FROM peserta ORDER BY ID_PS DESC");
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
    
    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

}
