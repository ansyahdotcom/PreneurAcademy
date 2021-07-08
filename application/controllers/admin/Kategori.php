<?php

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_kategori');
        $this->load->library('upload');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Kategori";

        // buat id kategori
        $ID_K = $this->m_kategori->selectMaxID_CT();
        if ($ID_K == NULL) {
            $data['ID_CTT'] = 'CT0001';
        } else {
            $noK = substr($ID_K, 2, 4);
            $IDK = $noK + 1;
            $data['ID_CTT'] = 'CT' . sprintf("%04s", $IDK);
        }

        /** Ambil data kategori */
        $data['kategori'] = $this->m_kategori->tampil_kategori()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_kategori", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //tambah kategori di kategori
    public function tambah_kategori()
    {


        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
        $this->m_kategori->tmbh_kategori($ID_CT, $NM_CT);
        $this->session->set_flashdata('message', 'save');
        redirect('admin/kategori');
    }

    //hapus kategori
    public function hapus()
    {
        $ID_CT = $this->input->post('ID_CT');
        $this->m_kategori->hapus_kategori($ID_CT);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/kategori');
    }

    //update kategori
    public function update_kategori()
    {
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));

        $data = array(
            'NM_CT' => $NM_CT
        );

        $where = array('ID_CT' => $ID_CT);

        $this->m_kategori->update_kategori($where, $data, 'category');
        $this->session->set_flashdata('message', 'edit');
        redirect('admin/kategori');
    }
}
