<?php
    class Profile extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/m_admin');
            $this->load->library('form_validation');
            $this->load->library('upload');
            adm_logged_in();
            cekadm();
        }

        public function index()
        {
            $email = $this->session->userdata('email');
            $data['tittle'] = "Profil Saya";
            /** Ambil data admin */
            $data['admin'] = $this->m_admin->admin($email);

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
                'required' => 'kolom ini harus diisi',
            ]);

            $this->form_validation->set_rules('hp', 'Hp', 'trim|numeric|min_length[11]|max_length[13]', [
                'numeric' => 'kolom ini harus berisi angka',
                'min_length' => 'format yang di masukkan salah',
                'max_length' => 'format yang di masukkan salah'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'trim');

            if ($this->form_validation->run() == false) {
                $this->load->view("admin/template_adm/v_header", $data);
                $this->load->view("admin/template_adm/v_navbar", $data);
                $this->load->view("admin/template_adm/v_sidebar", $data);
                $this->load->view("admin/profile/v_profile", $data);
                $this->load->view("admin/template_adm/v_footer");
            } else {
                $nama = htmlspecialchars($this->input->post('nama'));
                $hp = htmlspecialchars($this->input->post('hp'));
                $alamat = htmlspecialchars($this->input->post('alamat'));

                /** Proses Edit Gambar */
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|jpeg|png';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './assets/dist/img/admin/';

                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('image')) {
                            $old_image = $data['admin']['FTO_ADM'];
                            if ($old_image != 'default.jpg') {
                                unlink(FCPATH . 'assets/dist/img/admin/' . $old_image);
                            }
                            $new_image = $this->upload->data('file_name');
                            $this->db->set('FTO_ADM', $new_image);
                        } else {
                            $this->session->set_flashdata('message', 'gagal_upload');
                            redirect('admin/profile');
                        }
                }        

                $edit = [
                    'NM_ADM' => $nama,
                    'HP_ADM' => $hp,
                    'ALMT_ADM' => $alamat,
                    'UPDATE_ADM' => time(),
                ];
                $get = $this->db->get_where('admin', ['EMAIL_ADM' => $email])->row();
                unlink(FCPATH. 'assets/dist/img/admin' .$get->FTO_ADM);
                $this->db->set($edit);
                $this->db->where('EMAIL_ADM', $email);
                $this->db->update('admin');
                $this->session->set_flashdata('message', 'Ubah Profil');
                redirect('admin/profile');
            }
        }

        public function editpsw()
        {
            $email = $this->session->userdata('email');
            $data['tittle'] = "Profil Saya";
            /** Ambil data admin */
            $data['admin'] = $this->m_admin->admin($email);
            
            $this->form_validation->set_rules('pswlma', 'Lma', 'trim|required|min_length[8]', [
                'required' => 'kolom ini harus diisi',
                'min_length' => 'Password minimal berjumlah 8 karakter'
            ]);

            $this->form_validation->set_rules('pswbru', 'bru', 'trim|required|matches[pswbru1]|min_length[8]', [
                'required' => 'kolom ini harus diisi',
                'min_length' => 'Password minimal berjumlah 8 karakter',
                'matches' => ''
            ]);

            $this->form_validation->set_rules('pswbru1', 'bru1', 'trim|required|matches[pswbru]|min_length[8]', [
                'required' => 'kolom ini harus diisi',
                'min_length' => 'Password minimal berjumlah 8 karakter',
                'matches' => 'konfirmasi password tidak sesuai'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view("admin/template_adm/v_header", $data);
                $this->load->view("admin/template_adm/v_navbar", $data);
                $this->load->view("admin/template_adm/v_sidebar", $data);
                $this->load->view("admin/profile/v_profile", $data);
                $this->load->view("admin/template_adm/v_footer");
            } else {
                $pswlma = $this->input->post(htmlspecialchars('pswlma'));
                $pswbru1 = $this->input->post(htmlspecialchars('pswbru1'));

                if (!password_verify($pswlma, $data['admin']['PSW_ADM'])) { 
                    $this->session->set_flashdata('message', 'Pswslh');
                    redirect('admin/profile');
                } else {
                    if ($pswlma == $pswbru1){
                        $this->session->set_flashdata('message', 'Pswbaru=Pswlama');
                        redirect('admin/profile');
                    } else {
                        $pswhash = password_hash($pswbru1, PASSWORD_DEFAULT);
                        $this->m_admin->ubhpsw($pswhash, $email);
                        $this->session->set_flashdata('message', 'Password');
                        redirect('admin/profile');
                    }
                }
            }
        }
    }