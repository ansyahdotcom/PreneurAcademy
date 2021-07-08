<?php
    class M_kelas extends CI_Model
    {
        public function getkelas()
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $this->db->order_by('kelas.ID_KLS', 'DESC');
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function detilkls($id)
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $this->db->where('kelas.ID_KLS', $id);
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function tambahkls($kelas)
        {   
            return $this->db->insert('kelas', $kelas);
        }

        public function cek_oldimg($id)
        {
            $this->db->select('GBR_KLS');
            $this->db->from('kelas');
            $this->db->where('ID_KLS', $id);
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function editkls($edit, $id)
        {
            $this->db->set($edit);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
            return $this->db;
        }

        public function link()
        {
            $this->db->select('PERMALINK');
            $this->db->from('kelas');
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function getktg()
        {
            $ktg = $this->db->get('ktg_kelas')->result_array();
            return $ktg;
        }

        public function getdiskon()
        {
            $diskon = $this->db->get_where('diskon', [
                'STATUS' => 1
            ])->result_array();
            return $diskon;
        }

        public function savekls($data)
        {
            $save = $this->db->insert_batch('kelas', $data);
            return $save;
        }

        public function deldtkls($id)
        {
            $this->db->where('ID_KLS', $id);
            $this->db->delete('detail_kelas');
            return $this->db;
        }

        public function delkls($id)
        {
            $this->db->where('ID_KLS', $id);
            $this->db->delete('kelas');
            return $this->db;
        }

        public function drftkls($id)
        {
            $this->db->set('STAT', 0);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
            return $this->db;
        }

        public function pubkls($id)
        {
            $this->db->set('STAT', 1);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
            return $this->db;
        }

        public function jmlkls()
        {
            return $this->db->get_where('kelas')->num_rows();
        }

        public function listpeserta($id)
        {
            $this->db->select('*');
            $this->db->from('detail_kelas');
            $this->db->join('kelas', 'kelas.ID_KLS=detail_kelas.ID_KLS', 'left');
            $this->db->join('peserta', 'peserta.ID_PS=detail_kelas.ID_PS', 'left');
            $this->db->join('transaksi', 'transaksi.ID_TRN=detail_kelas.ID_TRN', 'left');
            $this->db->where('transaksi.ID_KLS', $id);
            return $this->db->get()->result_array();
        }

        public function jmltugas($id)
        {
            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->join('materi', 'materi.ID_MT=tugas.ID_MT', 'left');
            $this->db->join('detail_materi', 'detail_materi.ID_MT=tugas.ID_MT', 'left');
            $this->db->where('detail_materi.ID_KLS', $id);
            return $this->db->get()->num_rows();
        }

        public function submit($id)
        {
            $this->db->select('*');
            $this->db->from('detil_tugas');
            $this->db->join('detail_materi', 'detail_materi.ID_MT=detil_tugas.ID_MT', 'left');
            $this->db->where('detil_tugas.STATUS', "Sudah Mengumpulkan");
            $this->db->where('detail_materi.ID_KLS', $id);
            return $this->db->get()->num_rows();
        }

        public function nmkelas($id)
        {
            return $this->db->get_where('kelas', [
                'ID_KLS' => $id
            ])->row_array();
        }

        public function sertif($data)
        {
            $this->db->insert('sertifikat', $data);
        }

        public function filesertif($id, $idps)
        {
            $this->db->get_where('sertifikat', [
                'ID_PS' => $idps,
                'ID_KLS' => $id
            ])->row_array();
        }

        public function idkls()
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->order_by('ID_KLS', 'DESC');
            $this->db->limit(1);
            return $this->db->get();
        }
    }
