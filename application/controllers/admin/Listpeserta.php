<?php

class Listpeserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_listpeserta');
        adm_logged_in();
        cekadm();
    }

    public function index($ID_KLS)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "List Peserta";

        $data['listpeserta'] = $this->m_listpeserta->tampil($ID_KLS)->result();
        $data['peserta'] = $this->m_listpeserta->tampil_ps()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listpeserta", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function tambah_peserta()
    {
        $ID_KLS = htmlspecialchars($this->input->post('ID_KLS'));
        $ID_PS = htmlspecialchars($this->input->post('ID_PS'));
        $data = array(
            'ID_KLS' => $ID_KLS,
            'ID_PS' => $ID_PS
        );

        $this->m_listpeserta->insert($data, 'detail_kelas');
        $this->session->set_flashdata('message', 'save');
        redirect('admin/listpeserta/index/'. $ID_KLS);
    }
    
    //hapus peserta dari list
    public function hapus()
    {
        $ID_KLS = htmlspecialchars($this->input->post('ID_KLS'));
        $ID_PS = $this->input->post('ID_PS');
        $where = array(
            'ID_PS' => $ID_PS
        );
        $this->m_listpeserta->delete($where, 'detail_kelas');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/listpeserta/index/'. $ID_KLS);
    }
}
