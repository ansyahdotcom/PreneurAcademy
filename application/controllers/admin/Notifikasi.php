<?php
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_notifikasi');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Pemberitahuan';

        /** Mengambil data notifikasi */
        $data['notif'] = $this->m_notifikasi->get_not();

        /** Jika notifikasi kosong */
        $data['notkosong'] = $this->m_notifikasi->not_kosong();

        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/notifikasi/v_notifikasi", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function jml()
    {
        $notifikasi = $this->m_notifikasi->jml_not();
        echo json_encode($notifikasi);
    }

    public function msg()
    {
        $msg = $this->m_notifikasi->msg_not(5, 0);
        echo json_encode($msg);
    }

    public function read_msg($nID)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Detail pemberitahuan';

        /** Mengambil data notifikasi */
        $data['detnot'] = $this->m_notifikasi->det_not($nID);

        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/notifikasi/v_detnotifikasi", $data);
        $this->load->view("admin/template_adm/v_footer");

        $data = [
            'IS_READ' => 1
        ];

        $this->m_notifikasi->read($nID, $data);
    }

    public function del_msg($nID)
    {
        $this->m_notifikasi->del($nID);
        $this->session->set_flashdata('message', 'hapus_msg');
        redirect('admin/notifikasi');
    }
}
