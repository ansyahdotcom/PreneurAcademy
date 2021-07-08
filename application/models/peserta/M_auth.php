<?php
class M_auth extends CI_Model
{
    function __construct()
    {
        $this->tableName = 'peserta';
        $this->primaryKey = 'ID_PS';
    }

    public function idps()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->order_by('ID_PS', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function regpeserta($register)
    {
        $insert = $this->db->insert('peserta', $register);
        return $insert;
    }

    public function emailverif($email)
    {
        $user = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        return $user;
    }

    public function activ($email)
    {
        $this->db->set('ACTIVE', 1);
        $this->db->where('EMAIL_PS', $email);
        $this->db->update('peserta');

        return $this->db;
    }

    public function del($email)
    {
        $this->db->delete('peserta', ['EMAIL_PS' => $email]);

        return $this->db;
    }

    public function activacount($email)
    {
        $user = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email,
            'ACTIVE' => 1
        ])->row_array();

        return $user;
    }

    public function ubahpsw($email, $password)
    {
        $this->db->set('PSW_PS', $password);
        $this->db->where('EMAIL_PS', $email);
        $this->db->update('peserta');

        return $this->db;
    }
}