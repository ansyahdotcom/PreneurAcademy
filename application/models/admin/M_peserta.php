<?php
    Class M_peserta extends CI_Model
    {
        public function peserta()
        {
            $this->db->select('*');
            $this->db->from('peserta');
            $this->db->order_by('ID_PS', 'DESC');
            return $this->db->get()->result_array();
        }

        public function delps($id)
        {
            $this->db->where('ID_PS', $id);
            $this->db->delete('peserta');
            return $this->db;
        }

        public function blokps($id)
        {
            $this->db->set('ACTIVE', 2);
            $this->db->where('ID_PS', $id);
            $this->db->update('peserta');
            return $this->db;
        }

        public function unblokps($id)
        {
            $this->db->set('ACTIVE', 1);
            $this->db->where('ID_PS', $id);
            $this->db->update('peserta');
            return $this->db;
        }

        public function jmlps()
        {
            $jml = $this->db->get_where('peserta', [
                'ACTIVE' => 1
            ])->num_rows();
            return $jml;
        }
    }
?>