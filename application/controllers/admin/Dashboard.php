<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_peserta');
        $this->load->model('admin/m_kelas');
        $this->load->model('admin/m_transaksi');
        adm_logged_in();
        cekadm();
    }


    /** Menampilkan Dashboard Admin */
    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        /** Menghitung jumlah peserta */
        $data['jmlps'] = $this->m_peserta->jmlps();
        
        /** Menghitung jumlah kelas */
        $data['jmlkls'] = $this->m_kelas->jmlkls();

        /** Menghitung jumlah transaksi */
        $data['jmltrn'] = $this->m_transaksi->jmltrn();

        /** Menghitung jumlah pendapatan */
        $data['pendapatan'] = $this->m_transaksi->pendapatan();

        $data['tittle'] = "Dashboard";
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/index");
        $this->load->view("admin/template_adm/v_footer");
    }
}
