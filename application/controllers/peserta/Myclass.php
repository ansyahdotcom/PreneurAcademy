<?php
class Myclass extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_kelas');
        psrt_logged_in();
        cekpsrt();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        /** Kelas yang dipilih peserta */
        $data['myclass'] = $this->m_kelas->myclass($email);
        
        /** cek sudah punya kelas atau belum */
        $data['cekmyclass'] = $this->m_kelas->cekmyclass($email);
        
        /** cek sudah punya bayar transaksi kelas atau belum */
        $data['statustrn'] = $this->m_kelas->statustrn($email);

        $data['tittle'] = "Kelas Saya";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/myclass/v_myclass", $data);
        $this->load->view("peserta/template/v_footer");
    }
}
