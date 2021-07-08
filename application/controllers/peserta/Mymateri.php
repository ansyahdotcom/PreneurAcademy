<?php
class Mymateri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_kelas');
        psrt_logged_in();
        cekpsrt();
    }

    public function materi($id)
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $link = $this->uri->segment(5);
        /** Kelas yang dipilih peserta */
        // $data['cek'] = $this->m_kelas->getmateri($id)->result_array();
        $data['cek'] = $this->m_kelas->getsub($id)->result_array();

        $data['tittle'] = "Modul Kelas";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/myclass/v_mymateri", $data);
        $this->load->view("peserta/template/v_footer");
    }
}
