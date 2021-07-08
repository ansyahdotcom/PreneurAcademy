<?php
class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_peserta');
        $this->load->library('form_validation');
        $this->load->library('upload');
        psrt_logged_in();
        cekpsrt();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['tittle'] = "Profil Saya";
        /** Ambil data peserta */
        $data['peserta'] = $this->m_peserta->peserta($email);

        $this->form_validation->set_rules('nmps', 'Nmps', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('hp', 'Hp', 'required|trim|numeric|min_length[11]|max_length[13]', [
            'required' => 'kolom o=ini harus diisi',
            'numeric' => 'kolom ini harus berisi an,gka',
            'min_length' => 'format yang di masukkan salah',
            'max_length' => 'format yang di masukkan salah'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
            'required' => 'kolom ini harus diisi'
        ]);

        // $this->form_validation->set_rules('kotaasal', 'Asal', 'required|trim', [
        //     'required' => 'kolom ini harus diisi'
        // ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("peserta/template/v_header", $data);
            $this->load->view("peserta/template/v_navbar", $data);
            $this->load->view("peserta/template/v_sidebar", $data);
            $this->load->view("peserta/profil/v_profil", $data);
            $this->load->view("peserta/template/v_footer");
        } else {
            $nama = htmlspecialchars($this->input->post('nmps'));
            $hp = htmlspecialchars($this->input->post('hp'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $jeniskelamin = htmlspecialchars($this->input->post('jk'));
            $pekerjaan = htmlspecialchars($this->input->post('pekerjaan'));
            $agama = htmlspecialchars($this->input->post('agama'));
            $HAPUS_FOTO = htmlspecialchars($this->input->post('HAPUS_FOTO'));
            $new_image = $HAPUS_FOTO;
            // $kota = htmlspecialchars($this->input->post('kotaasal'));

            /** Proses Edit Gambar */
            $upload_image = $_FILES['FTO_PS']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/peserta/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('FTO_PS')) {
                    $old_image = $HAPUS_FOTO;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/peserta/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('FTO_PS', $new_image);
                } else {
                    $this->session->set_flashdata('message', 'gagal_upload');
                    redirect('peserta/profil');
                }
            }

            $edit = [
                'NM_PS' => $nama,
                'HP_PS' => $hp,
                'ALMT_PS' => $alamat,
                'JK_PS' => $jeniskelamin,
                'PEKERJAAN' => $pekerjaan,
                'AGAMA_PS' => $agama,
                'FTO_PS' => $new_image
                // 'KOTA' => $kota,
            ];

            $id_ps = $data['peserta']['ID_PS'];
            $get = $this->db->get_where('peserta', ['ID_PS' => $id_ps])->row();
            unlink(FCPATH. 'assets/dist/img/peserta/' . $get->FILE_SUB);
            $this->db->set($edit);
            $this->db->where('EMAIL_PS', $email);
            $this->db->update('peserta');
            $this->session->set_flashdata('message', 'Ubah Profil');
            redirect('peserta/profil');
        }
    }

    public function editpsw()
    {
        $email = $this->session->userdata('email');
        $data['tittle'] = "Profil Saya";
        /** Ambil data admin */
        $data['peserta'] = $this->m_peserta->peserta($email);

        $this->form_validation->set_rules('pswlma', 'Lma', 'trim|required|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek'
        ]);

        $this->form_validation->set_rules('pswbru', 'bru', 'trim|required|matches[pswbru1]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('pswbru1', 'bru1', 'trim|required|matches[pswbru]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'password terlalu pendek',
            'matches' => 'konfirmasi password tidak sesuai'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("peserta/template/v_header", $data);
            $this->load->view("peserta/template/v_navbar", $data);
            $this->load->view("peserta/template/v_sidebar", $data);
            $this->load->view("peserta/profil/v_profil", $data);
            $this->load->view("peserta/template/v_footer");
        } else {
            $pswlma = $this->input->post(htmlspecialchars('pswlma'));
            $pswbru1 = $this->input->post(htmlspecialchars('pswbru1'));

            if (!password_verify($pswlma, $data['peserta']['PSW_PS'])) {
                $this->session->set_flashdata('message', 'Pswslh');
                redirect('peserta/profil');
            } else {
                if ($pswlma == $pswbru1) {
                    $this->session->set_flashdata('message', 'Pswbaru=Pswlama');
                    redirect('peserta/profil');
                } else {
                    $pswhash = password_hash($pswbru1, PASSWORD_DEFAULT);
                    $this->m_peserta->ubhpsw($pswhash, $email);
                    $this->session->set_flashdata('message', 'Password');
                    redirect('peserta/profil');
                }
            }
        }
    }
}
