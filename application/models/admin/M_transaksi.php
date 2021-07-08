<?php
class M_transaksi extends CI_Model
{
    public function trnpending()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('STATUS', 201);
        return $this->db->get()->result_array();
    }

    public function trnsuccess()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('STATUS', 200);
        return $this->db->get()->result_array();
    }

    public function trncancel()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('STATUS', 000);
        return $this->db->get()->result_array();
    }

    public function detpending($eID)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('eID', $eID);
        return $this->db->get()->row_array();
    }

    public function detsuccess($eID)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('eID', $eID);
        return $this->db->get()->row_array();
    }

    public function detcancel($eID)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('peserta', 'peserta.ID_PS=transaksi.ID_PS', 'left');
        $this->db->join('kelas', 'kelas.ID_KLS=transaksi.ID_KLS', 'left');
        $this->db->where('eID', $eID);
        return $this->db->get()->row_array();
    }

    public function jmltrn()
    {
        return $this->db->get_where('transaksi', [
            'STATUS' => 200
        ])->num_rows();
    }

    public function pendapatan()
    {
        return $this->db->query("SELECT SUM(AMOUNT) AS pendapatan FROM transaksi WHERE STATUS=200")->row_array();
    }
}
