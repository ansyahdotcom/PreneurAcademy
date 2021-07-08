<?php

class Tags extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_tags');
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
        $data['tittle'] = "Data Tags";

        // buat id tags
        $ID_T = $this->m_tags->selectMaxID_TAGS();
        if ($ID_T == NULL) {
            $data['ID_TAGSS'] = 'TG0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $data['ID_TAGSS'] = 'TG' . sprintf("%04s", $IDT);
        }

        /** Ambil data tags */
        $data['tags'] = $this->m_tags->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_tags", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //hapus tags
    public function hapus()
    {
        $ID_TAGS = $this->input->post('ID_TAGS');
        $this->m_tags->hapus_tags($ID_TAGS);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/tags');
    }

    //tambah tags di tags
    public function tambah_tags()
    {


        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));
        $this->m_tags->tmbh_tags($ID_TAGS, $NM_TAGS);
        $this->session->set_flashdata('message', 'save');
        redirect('admin/tags');
    }

    //update tags
    public function update_tags()
    {
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));

        $data = array(
            'NM_TAGS' => $NM_TAGS
        );

        $where = array('ID_TAGS' => $ID_TAGS);

        $this->m_tags->update_tags($where, $data, 'tags');
        $this->session->set_flashdata('message', 'edit');
        redirect('admin/tags');
    }
}
