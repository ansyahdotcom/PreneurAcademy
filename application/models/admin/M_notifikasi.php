<?php
    class M_notifikasi extends CI_Model
    {
        public function get_not()
        {
            $this->db->select('*');
            $this->db->from('notif');
            $this->db->where('ST_NOT', 0);
            $this->db->order_by('ID_NOT', 'DESC');
            return $this->db->get()->result_array();
        }

        public function det_not($nID)
        {
            $this->db->select('*');
            $this->db->from('notif');
            $this->db->join('peserta', 'peserta.ID_PS=notif.GLOBAL_ID', 'left');
            $this->db->join('transaksi', 'transaksi.eID=notif.GLOBAL_ID', 'left');
            $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
            $this->db->where('ID_NOT', $nID);
            return $this->db->get()->row_array();
        }

        public function not_kosong()
        {
            return $this->db->get_where('notif', [
                'ID_US' => 'ADM'
            ])->num_rows();
        }

        public function jml_not()
        {
            $this->db->select('*');
            $this->db->from('notif');
            $this->db->where('IS_READ', 0);
            $this->db->where('ST_NOT', 0);
            $this->db->order_by('ID_NOT', 'DESC');
            return $this->db->get()->result_array();
        }

        public function msg_not($limit, $start)
        {
            $this->db->select('*');
            $this->db->from('notif');
            $this->db->where('IS_READ', 0);
            $this->db->where('ST_NOT', 0);
            $this->db->order_by('ID_NOT', 'DESC');
            $this->db->limit($limit, $start);
            return $this->db->get()->result_array();
        }

        public function read($nID, $data)
        {
            $this->db->set($data);
            $this->db->where('ID_NOT', $nID);
            $this->db->update('notif');
        }

        public function del($nID)
        {
            $this->db->where('ID_NOT', $nID);
            $this->db->delete('notif');
        }
    }
?>