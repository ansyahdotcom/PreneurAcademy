<?php
    class M_kelas extends CI_Model
    {
        public function getkelas($limit, $start, $keyword = null)
        {
            if($keyword) {
                $this->db->like('TITTLE', $keyword);
            }

            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $this->db->limit($limit, $start);
            $this->db->where('STAT', 1);
            $this->db->order_by('ID_KLS', 'DESC');
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function kelas($id)
        {
            return $this->db->get_where('kelas', [
                'ID_KLS' => $id,
            ])->result_array();
        }

        public function transaksi($data)
        {
            $this->db->insert('transaksi', $data);
        }

        public function detilkls($data1)
        {
            $this->db->insert('detail_kelas', $data1);
        }

        public function countkls()
        {
            return $this->db->get('kelas')->num_rows();
        }

        public function myclass($email)
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('detail_kelas', 'detail_kelas.ID_KLS = kelas.ID_KLS', 'left');
            $this->db->join('peserta', 'peserta.ID_PS = detail_kelas.ID_PS', 'left');
            $this->db->where('EMAIL_PS', $email);
            $query = $this->db->get()->row_array();
            // $query = $this->db->query("SELECT * FROM kelas LEFT JOIN ktg_kelas ON kelas.ID_KTGKLS = ktg_kelas.ID_KTGKLS 
            // JOIN detail_kelas ON kelas.ID_KLS = detail_kelas.ID_KLS
            // JOIN peserta ON detail_kelas.ID_PS = peserta.ID_PS
            // WHERE peserta.EMAIL_PS = '$email'");
            return $query;
        }

        public function cekmyclass($email)
        {
            $this->db->select('*');
            $this->db->from('peserta');
            $this->db->where('EMAIL_PS', $email);
            return $this->db->get()->row_array();
            // $this->db->select('*');
            // $this->db->from('detail_kelas');
            // $this->db->join('peserta', 'peserta.ID_PS = detail_kelas.ID_PS', 'left');
            // $this->db->join('transaksi', 'transaksi.ID_TRN = detail_kelas.ID_TRN', 'left');
            // $this->db->where('STATUS', 200);
            // $this->db->where('EMAIL_PS', $email);
            // $query = $this->db->get()->row_array();
            // return $query;
        }

        public function statustrn($email)
        {
            $this->db->select('transaksi.STATUS');
            $this->db->from('transaksi');
            $this->db->join('peserta', 'peserta.ID_PS = transaksi.ID_PS', 'left');
            $this->db->where('EMAIL_PS', $email);
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function pending($id_ps, $data2)
        {
            $this->db->set($data2);
            $this->db->where('ID_PS', $id_ps);
            $this->db->update('peserta');
        }

        public function countmyclass($idps)
        {
            $this->db->select('*');
            $this->db->from('detail_kelas');
            $this->db->join('peserta', 'peserta.ID_PS = detail_kelas.ID_PS', 'left');
            $this->db->join('transaksi', 'transaksi.ID_TRN = detail_kelas.ID_TRN', 'left');
            $this->db->where('detail_kelas.ID_PS', $idps);
            $this->db->where('transaksi.STATUS', 200);
            $query = $this->db->get()->num_rows();
            return $query;
        }

        public function countmysertif($idps)
        {
            return $this->db->get_where('sertifikat', [
                'ID_PS' => $idps
            ])->num_rows();
        }

        // public function getmateri($id){
        //     $result = $this->db->query("SELECT * FROM detail_materi, kelas, materi
        //     WHERE detail_materi.ID_MT = materi.ID_MT AND kelas.ID_KLS = $id");
        //     return $result;
        // }

        public function getsub($id){
            $result = $this->db->query(
                "SELECT * FROM materi, kelas, detail_materi WHERE detail_materi.ID_MT = materi.ID_MT  
                AND detail_materi.ID_KLS = kelas.ID_KLS
                AND kelas.ID_KLS='$id'");
            return $result;
        }

        public function get_detclass($id)
        {
            return $this->db->get_where('kelas', [
                'ID_KLS' => $id
            ])->row_array();
        }
    }

?>