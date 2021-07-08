<?php

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('peserta/m_kelas');
        $this->load->model('peserta/m_transaksi');
        psrt_logged_in();
        cekpsrt();
    }

    public function index(){
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        $idps = $data['peserta']['ID_PS'];

        /** Kelas yang dipilih peserta */
        $data['myclass'] = $this->m_kelas->myclass($email);

        /** cek sudah punya kelas atau belum */
        $data['cekmyclass'] = $this->m_kelas->cekmyclass($email);

        /** Jumlah kelas */
        $data['countmyclass'] = $this->m_kelas->countmyclass($idps);

        /** Jumlah transaksi */
        $data['countmytrn'] = $this->m_transaksi->countmytrn($idps);

        /** Jumlah sertifikat */
        $data['countmysertif'] = $this->m_kelas->countmysertif($idps);

        $data['tittle'] = "Beranda";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/index");
        $this->load->view("peserta/template/v_footer");
    }
}
?>