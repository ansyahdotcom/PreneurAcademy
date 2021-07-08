<?php
    class M_peserta extends CI_Model
    {
        function peserta($email)
        {
            $this->db->select('*');
            $this->db->from('peserta');
            $this->db->join('role', 'role.ID_ROLE=peserta.ID_ROLE');
            $this->db->where('EMAIL_PS', $email);
            $query = $this->db->get()->row_array();
            return $query;
        }

        function edit($edit, $gbr, $email)
        {
            $gbr;
            $this->db->set($edit);
            $this->db->where('EMAIL_PS', $email);
            $this->db->update('peserta');
            return $this->db;
        }

        function ubhpsw($pswhash, $email)
        {
            $this->db->set('PSW_PS', $pswhash);
            $this->db->where('EMAIL_PS', $email);
            $this->db->update('peserta');
            return $this->db;
        }
    }
?>
