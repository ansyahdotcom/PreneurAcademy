<?php

class M_list_tugas extends CI_Model{

    public function gettugas($id){
        $result = $this->db->query("SELECT * FROM detail_materi, kelas, materi
        WHERE detail_materi.ID_MT = materi.ID_MT AND kelas.ID_KLS AND kelas.ID_KLS = $id");
        return $result;
    }

}
