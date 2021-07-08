<?php
    class M_admin extends CI_Model
    {
        function admin($email)
        {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->join('role', 'role.ID_ROLE=admin.ID_ROLE');
            $this->db->where('EMAIL_ADM', $email);
            $query = $this->db->get()->row_array();
            return $query;
        }

        function edit($edit, $gbr, $email)
        {
            $gbr;
            $this->db->set($edit);
            $this->db->where('EMAIL_ADM', $email);
            $this->db->update('admin');
            return $this->db;
        }

        function ubhpsw($pswhash, $email)
        {
            $this->db->set('PSW_ADM', $pswhash);
            $this->db->set('UPDATE_PSWADM', time());
            $this->db->where('EMAIL_ADM', $email);
            $this->db->update('admin');
            return $this->db;
        }
    }
?>
