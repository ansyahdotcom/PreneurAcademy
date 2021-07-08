<?php
class Diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_diskon');
        adm_logged_in();
        cekadm();
    }

    /** Menampilkan data diskon */
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Diskon';

        /** mengambil data diskon */
        $data['dis'] = $this->m_diskon->getdiskon();
        $this->load->view('admin/template_adm/v_header', $data);
        $this->load->view('admin/template_adm/v_navbar', $data);
        $this->load->view('admin/template_adm/v_sidebar', $data);
        $this->load->view('admin/diskon/v_diskon', $data);
        $this->load->view('admin/template_adm/v_footer');
    }

    /** Simpan semua data */
    public function saveall()
    {
        $this->form_validation->set_rules('diskon[]', 'Diskon', 'required|trim|numeric', [
            'required' => 'Kolom ini harus diisi',
            'numeric' => 'Harus berisi angka'
        ]);

        $this->form_validation->set_rules('nama[]', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'formempty');
            redirect('admin/diskon');
        } else {
            /** Proses insert ke database */
            $diskon = $this->input->post('diskon');
            $result = array();
            foreach ($diskon as $key => $val) {
                $result[] = array(
                    'DISKON' => ($_POST['diskon'][$key] / 100),
                    'NM_DISKON' => $_POST['nama'][$key],
                    'STATUS' => 0,
                    'DATE_DIS' => time(),
                    'UPDATE_DIS' => 0
                );
            }

            $this->db->insert_batch('diskon', $result);
            $this->session->set_flashdata('message', 'save');
            redirect('admin/diskon');
        }
    }

    public function editdis()
    {
        $this->form_validation->set_rules('diskon[]', 'Diskon', 'required|trim|numeric', [
            'required' => 'Kolom ini harus diisi',
            'numeric' => 'Harus berisi angka'
        ]);

        $this->form_validation->set_rules('nama[]', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $data['dis'] = $this->m_diskon->getdiskon();
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/diskon/v_diskon', $data);
            $this->load->view('admin/template_adm/v_footer');
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $diskon = htmlspecialchars($this->input->post('diskon'));

            $edit = [
                'DISKON' => ($diskon/100),
                'NM_DISKON' => $nama,
                'UPDATE_DIS' => time(),
            ];

            $this->db->set($edit);
            $this->db->where('ID_DISKON', $id);
            $this->db->update('diskon');
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/diskon');
        }
    }

    public function nonaktif()
    {
        $id = $this->input->post('id');
        $this->m_diskon->nondis($id);
        $this->session->set_flashdata('message', 'nonaktif');
        redirect('admin/diskon');
    }

    public function aktif()
    {
        $id = $this->input->post('id');
        $this->m_diskon->akdis($id);
        $this->session->set_flashdata('message', 'aktif');
        redirect('admin/diskon');
    }

    public function hapusdis()
    {
        $id = $this->input->post('id');
        $this->m_diskon->deldis($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/diskon');
    }
}
