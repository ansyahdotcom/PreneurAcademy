<?php
    class M_transaksi extends CI_Model
    {
        public function gettrn($email)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
            $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
            $this->db->where('EMAIL_PS', $email);
            return $this->db->get()->result_array();
        }

        public function dettrn($eID, $email)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
            $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
            $this->db->where('eID', $eID);
            $this->db->where('EMAIL_PS', $email);
            return $this->db->get()->row_array();
        }

        public function countmytrn($idps)
        {
            return $this->db->get_where('transaksi', [
                'ID_PS' => $idps
            ])->num_rows();
        }
    }
?>