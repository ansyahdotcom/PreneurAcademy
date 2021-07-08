<?php
class Ktgkelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_ktgkelas');
        adm_logged_in();
        cekadm();
    }

    /** Menampilkan data kategori kelas */
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Kategori Kelas';

        /** mengambil data ktgkelas */
        $data['ktgkelas'] = $this->m_ktgkelas->getktgkelas();
        $this->load->view('admin/template_adm/v_header', $data);
        $this->load->view('admin/template_adm/v_navbar', $data);
        $this->load->view('admin/template_adm/v_sidebar', $data);
        $this->load->view('admin/ktgkelas/v_ktgkelas', $data);
        $this->load->view('admin/template_adm/v_footer'); 
    }

    /** Simpan semua data */
    public function saveall()
    {
        $this->form_validation->set_rules('nama[]', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'formempty');
            redirect('admin/ktgkelas');
        } else {
            /** Proses insert ke database */
            $nama = $this->input->post('nama');
            $result = array();
            foreach ($nama as $key => $val) {
                $result[] = array(
                    'KTGKLS' => $_POST['nama'][$key],
                    'DATE_KTGKLS' => time(),
                    'UPDATE_KTGKLS' => 0
                );
            }

            $this->db->insert_batch('ktg_kelas', $result);
            $this->session->set_flashdata('message', 'save');
            redirect('admin/ktgkelas');
        }
    }

    /** edit kategori kelas */
    public function editktg()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['ktgkelas'] = $this->m_ktgkelas->getktgkelas();
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/ktgkelas/v_ktgkelas', $data);
            $this->load->view('admin/template_adm/v_footer'); 
        } else {
            $id = htmlspecialchars($this->input->post('id'));
            $nama = htmlspecialchars($this->input->post('nama'));

            $edit = [
                'KTGKLS' => $nama,
                'UPDATE_KTGKLS' => time(),
            ];

            $this->db->set($edit);
            $this->db->where('ID_KTGKLS', $id);
            $this->db->update('ktg_kelas');
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/ktgkelas');
        }
    }

    /** hapus kategori kelas */
    public function hapusktg()
    {
        $id = $this->input->post('id');
        $this->m_ktgkelas->delktg($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/ktgkelas');
    }
}
?>