<?php
class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_notifikasi');
        psrt_logged_in();
        cekpsrt();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $id_ps = $this->session->userdata('id_ps');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $data['tittle'] = 'Pemberitahuan';

        /** Mengambil data notifikasi */
        $data['notif'] = $this->m_notifikasi->get_not($id_ps);

        /** Jika notifikasi kosong */
        $data['notkosong'] = $this->m_notifikasi->not_kosong($id_ps);

        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/notifikasi/v_notifikasi", $data);
        $this->load->view("peserta/template/v_footer");
    }

    public function jml()
    {
        $id_ps = $this->session->userdata('id_ps');
        $notifikasi = $this->m_notifikasi->jml_not($id_ps);
        echo json_encode($notifikasi);
    }

    public function msg()
    {
        $id_ps = $this->session->userdata('id_ps');
        $msg = $this->m_notifikasi->msg_not(5, 0, $id_ps);
        echo json_encode($msg);
    }

    public function read_msg($nID)
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $data['tittle'] = 'Detail pemberitahuan';

        /** Mengambil data notifikasi */
        $data['detnot'] = $this->m_notifikasi->det_not($nID);

        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/notifikasi/v_detnotifikasi", $data);
        $this->load->view("peserta/template/v_footer");

        $data = [
            'IS_READ' => 1
        ];

        $this->m_notifikasi->read($nID, $data);
    }

    public function del_msg($nID)
    {
        $this->m_notifikasi->del($nID);
        $this->session->set_flashdata('message', 'hapus_msg');
        redirect('peserta/notifikasi');
    }
}
