<?php

class M_coba extends CI_Model
{
    function tampil(){
    $query = $this->db->query("SELECT * FROM kelas, materi, tugas, detail_materi, detil_tugas 
                            WHERE kelas.ID_KLS = detail_materi.ID_KLS 
                            AND detail_materi.ID_MT = materi.ID_MT
                            AND tugas.ID_TG = detil_tugas.ID_TG
                            AND materi.ID_MT = detil_tugas.ID_MT");
    return $query;
    }
}