<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_transaksi');
        adm_logged_in();
        cekadm();
    }

    /** Menampilkan data transaksi */
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Histori Transaksi';

        /** Mengambil data kelas */
        $data['pending'] = $this->m_transaksi->trnpending();
        $data['success'] = $this->m_transaksi->trnsuccess();
        $data['cancel'] = $this->m_transaksi->trncancel();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/transaksi/v_transaksi", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    /** Menampilkan detail transaksi */
    public function detpending($eID)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Detail Transaksi';

        /** Mengambil data kelas */
        $data['dettrn'] = $this->m_transaksi->detpending($eID);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/transaksi/v_detpending", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    /** Menampilkan detail transaksi */
    public function detsuccess($eID)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Detail Transaksi';

        /** Mengambil data kelas */
        $data['dettrn'] = $this->m_transaksi->detsuccess($eID);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/transaksi/v_detsuccess", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    /** Menampilkan detail transaksi */
    public function detcancel($eID)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Detail Transaksi';

        /** Mengambil data kelas */
        $data['dettrn'] = $this->m_transaksi->detcancel($eID);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/transaksi/v_detcancel", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    /** Edit data kelas */
    public function editkls()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Kelas';

        /** Mengambil data kelas */
        $data['kelas'] = $this->m_kelas->getkelas();

        $this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Kolom ini harus diisi',
            'numeric' => 'Data harus berisi angka'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_kelas', $data);
            $this->load->view('admin/template_adm/v_footer');
        } else {
            $id = $this->input->post('id');
            $nama = htmlspecialchars($this->input->post('namakls'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $kategori = htmlspecialchars($this->input->post('ktg'));
            $oldimg = $this->input->post('old');

            /** Proses edit gambar */
            $upload_image = $_FILES['gbrkls']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/kelas/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gbrkls')) {
                    if ($oldimg != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/kelas/' . $oldimg);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $new_image = $oldimg;
            }

            $edit = [
                'TITTLE' => $nama,
                'PERMALINK' => $link,
                'GBR_KLS' => $new_image,
                'DESKRIPSI' => $deskripsi,
                'PRICE' => $harga,
                'ID_DISKON' => 0,
                'ID_KTGKLS' => $kategori,
                'UPDATE_KLS' => time(),
            ];

            $this->m_kelas->editkls($edit, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/kelas');
        }
    }

    public function hapuskls()
    {
        $id = $this->input->post('id');
        $this->m_kelas->delkls($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/kelas');
    }

    
}
