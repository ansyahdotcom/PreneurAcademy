<?php

class Coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_coba');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['kyui'] = $this->m_coba->tampil()->result();
        // $this->load->view('admin/coba/coba', $data);
        var_dump($data['kyui']);
    }
}