<?php
class Webinar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_webinar');
        $this->load->model('admin/m_medsos');
        $this->load->model('admin/m_navbar');
        $this->load->model('admin/m_kebijakan');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Webinar";
        date_default_timezone_set('Asia/Jakarta');

        /** Ambil data webinar */
        $data['webinar'] = $this->m_webinar->tampil_webinar()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_webinar", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function tambah_webinar()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Tambah Webinar";
        // nyari id_adm yg login
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT ID_ADM FROM admin WHERE EMAIL_ADM = '$email'");
        foreach ($query->result() as $que) {
            $ID_ADM = $que->ID_ADM;
        }
        $data['ID_ADM'] = $ID_ADM;

        // buat id webinar
        $ID_W = $this->m_webinar->selectMaxID_WEBINAR();
        if ($ID_W == NULL) {
            $data['ID_WEBINAR'] = 'WB00001';
        } else {
            $noP = substr($ID_W, 2, 5);
            $IDW = $noP + 1;
            $data['ID_WEBINAR'] = 'WB' . sprintf("%05s", $IDW);
        }

        $data['platform'] = $this->m_webinar->platform()->result();

        // form validation
        $this->form_validation->set_rules('JUDUL_WEBINAR', 'Judul', 'required|trim', [
            'required' => 'Kolom judul harus diisi!'
        ]);
        $this->form_validation->set_rules('HARGA', 'Harga', 'required|trim', [
            'required' => 'Kolom harga harus diisi!'
        ]);
        $this->form_validation->set_rules('PLATFORM', 'Platform', 'required|trim', [
            'required' => 'Kolom platform harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/webinar/v_tambah_webinar", $data);
            $this->load->view("admin/template_adm/v_footer");
        } else {
            $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
            $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
            $JUDUL_WEBINAR = htmlspecialchars($this->input->post('JUDUL_WEBINAR'));
            $KONTEN_WEB = $this->input->post('KONTEN_WEB');
            $HARGA = htmlspecialchars($this->input->post('HARGA'));
            $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
            $KUOTA_WEB = htmlspecialchars($this->input->post('KUOTA_WEB'));
            $LINK_ZOOM = $this->input->post('LINK_ZOOM');
            // $TGL_BUKA = htmlspecialchars($this->input->post('TGL_BUKA'));
            // $TGL_TUTUP = htmlspecialchars($this->input->post('TGL_TUTUP'));
            $TGL_WEB = htmlspecialchars($this->input->post('TGL_WEB'));
            $TGL_POSTWEB = date('Y-m-d');
            /** Proses Edit Gambar */
            $upload_image = $_FILES['FOTO_WEBINAR']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['upload_path'] = './assets/fotowebinar/';
                $config['encrypt_name']; TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('FOTO_WEBINAR')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('FOTO_WEBINAR', $new_image);
                } else {
                    $this->session->set_flashdata('message', 'gagal_upload');
                    redirect('admin/webinar');
                }
            }
                
            $data = array(
                'ID_WEBINAR' => $ID_WEBINAR,
                'ID_ADM' => $ID_ADM,
                'JUDUL_WEBINAR' => str_replace(' ', '-', $JUDUL_WEBINAR),
                'KONTEN_WEB' => $KONTEN_WEB,
                'FOTO_WEBINAR' => $new_image,
                'HARGA' => $HARGA,
                'PLATFORM' => $PLATFORM,
                'KUOTA_WEB' => $KUOTA_WEB,
                'LINK_ZOOM' => $LINK_ZOOM,
                // 'TGL_BUKA' => date('Y-m-d H:i', strtotime($TGL_BUKA)),
                // 'TGL_TUTUP' => date('Y-m-d H:i', strtotime($TGL_TUTUP)),
                'TGL_WEB' => date('Y-m-d H:i', strtotime($TGL_WEB)),
                'TGL_POSTWEB' => $TGL_POSTWEB
            );

            $this->m_webinar->insert($data, 'webinar');
            $this->session->set_flashdata('message', 'save');
            redirect('admin/webinar');
        }
    }

    // proses posting webinar
    public function pr_posting()
    {
        $ST_POSTWEB = htmlspecialchars($this->input->post('ST_POSTWEB'));
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );

        if ($ST_POSTWEB == 0) {
            $ST_POSTWEB++;
            $data = array(
                'ST_POSTWEB' => $ST_POSTWEB
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'w_posting');
            redirect('admin/webinar');
        } else {
            $ST_POSTWEB--;
            $data = array(
                'ST_POSTWEB' => $ST_POSTWEB
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'w_draf');
            redirect('admin/webinar');
        }
    }

    // proses posting link
    public function posting_link()
    {
        $ST_LINK = htmlspecialchars($this->input->post('ST_LINK'));
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );

        if ($ST_LINK == 0) {
            $ST_LINK++;
            $data = array(
                'ST_LINK' => $ST_LINK
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'link_posting');
            redirect('admin/webinar');
        } else {
            $ST_LINK--;
            $data = array(
                'ST_LINK' => $ST_LINK
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'link_draf');
            redirect('admin/webinar');
        }
    }

    // proses posting link
    public function posting_srt()
    {
        $ST_SRT = htmlspecialchars($this->input->post('ST_SRT'));
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );

        if ($ST_SRT == 0) {
            $ST_SRT++;
            $data = array(
                'ST_SRT' => $ST_SRT
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'srt_posting');
            redirect('admin/webinar');
        } else {
            $ST_SRT--;
            $data = array(
                'ST_SRT' => $ST_SRT
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'srt_draf');
            redirect('admin/webinar');
        }
    }

    public function file_srt()
    {
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $ST_SRT = 0;
        // $SRT_WEBINAR = htmlspecialchars($this->input->post('SRT_WEBINAR'));

        $upload = $_FILES['SRT_WEBINAR']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/fotowebinar/sertifikat/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2000;
            $config['encrypt_name'] = false;
            // $config['max_height'] = 1500;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('SRT_WEBINAR')) {
                $new = $this->upload->data('file_name');
                $this->db->set('SRT_WEBINAR', $new);
                $get = $this->db->get_where('webinar', ['ID_WEBINAR' => $ID_WEBINAR])->row();
                unlink(FCPATH . 'assets/fotowebinar/sertifikat/' . $get->SRT_WEBINAR);
            } else {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/webinar");
            }
        }

        $data = array(
            'SRT_WEBINAR' => $new
        );

        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR,
            'ST_SRT' => $ST_SRT
        );

        $this->m_webinar->update($where, $data, 'webinar');
        $this->session->set_flashdata('message', 'edit');
        redirect('admin/webinar');
    }

    //hapus webinar
    public function hapus()
    {
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );
        $query = $this->db->query("SELECT FOTO_WEBINAR FROM webinar WHERE ID_WEBINAR = '$ID_WEBINAR'");
        foreach ($query->result() as $row) {
            $FOTO = $row->FOTO_WEBINAR;
        }
        unlink(FCPATH . 'assets/fotowebinar/' . $FOTO);
        $this->m_webinar->delete($where, 'webinar');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/Webinar');
    }

    public function edit($JUDUL_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = 'Edit Webinar';
        date_default_timezone_set('Asia/Jakarta');
        $where = array('JUDUL_WEBINAR' => $JUDUL_WEBINAR);

        $data['webinar'] = $this->m_webinar->tampil_edit($where, 'webinar')->result();
        $data['platform'] = $this->m_webinar->platform()->result();
        // echo "askgfiu";
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_edit", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function update()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_WEBINAR = htmlspecialchars($this->input->post('JUDUL_WEBINAR'));
        $KONTEN_WEB = $this->input->post('KONTEN_WEB');
        // $FOTO_WEBINAR = htmlspecialchars($this->input->post('FOTO_WEBINAR'));
        $HAPUS_FOTO = $this->input->post('HAPUS_FOTO');
        $HARGA = htmlspecialchars($this->input->post('HARGA'));
        $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
        $LINK_ZOOM = $this->input->post('LINK_ZOOM');
        // $TGL_BUKA = htmlspecialchars($this->input->post('TGL_BUKA'));
        // $TGL_TUTUP = htmlspecialchars($this->input->post('TGL_TUTUP'));
        $TGL_WEB = htmlspecialchars($this->input->post('TGL_WEB'));
        $TGL_POSTWEB = date('Y-m-d');
        // untuk upload foto webinar

        $upload_image = $_FILES['FOTO_WEBINAR']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path']  = './assets/fotowebinar/';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('FOTO_WEBINAR')) {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/webinar");
            } else {
                $upload_data = $this->upload->data();

                //Compress Image buat foto web
                $config['image_library'] = 'gd2';
                $config['quality'] = '80%';
                $config['width'] = 500;
                $config['height'] = 500;
                $config['source_image'] = './assets/fotowebinar/' . $upload_data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $get = $this->db->get_where('webinar', ['ID_WEBINAR' => $ID_WEBINAR])->row();
                unlink(FCPATH . 'assets/fotowebinar/' . $get->FOTO_WEBINAR);

                $upload_image = $this->upload->data('file_name');
            }
        } else {
            $upload_image = $HAPUS_FOTO;
        }

        $where = array('ID_WEBINAR' => $ID_WEBINAR);

        $data = array(
            'JUDUL_WEBINAR' => str_replace(' ', '-', $JUDUL_WEBINAR),
            'ID_ADM' => $ID_ADM,
            'KONTEN_WEB' => $KONTEN_WEB,
            'FOTO_WEBINAR' => $upload_image,
            'HARGA' => $HARGA,
            'PLATFORM' => $PLATFORM,
            'LINK_ZOOM' => $LINK_ZOOM,
            'TGL_WEB' => date('Y-m-d H:i', strtotime($TGL_WEB)),
            // 'TGL_BUKA' => date('Y-m-d H:i', strtotime($TGL_BUKA)),
            // 'TGL_TUTUP' => date('Y-m-d H:i', strtotime($TGL_TUTUP)),
            'TGL_POSTWEB' => $TGL_POSTWEB
        );

        // var_dump($data);die;
        $this->m_webinar->update($where, $data, 'webinar');

        $this->session->set_flashdata('message', 'edit');
        redirect('admin/webinar');
    }

    // pratinjau / lihat post / lihat postingan webinar
    public function pratinjau($JUDUL_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        date_default_timezone_set('Asia/Jakarta');

        $data['judul'] = "Preneur Academy | Webinar";
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['webinar'] = $this->m_webinar->tampil_dt_webinar($JUDUL_WEBINAR, 'webinar')->result();
        $this->load->view("landingpage/template/header", $data);
        $this->load->view('admin/webinar/detail_webinar', $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function listpeserta($JUDUL_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "List Peserta Webinar";
        date_default_timezone_set('Asia/Jakarta');

        $data['judul'] = "List Peserta";
        $data['list_ps'] = $this->m_webinar->list_ps($JUDUL_WEBINAR)->result();
        $data['list_ps2'] = $this->m_webinar->list_ps2($JUDUL_WEBINAR)->result();
        $data['JUDUL_WEBINAR'] = $JUDUL_WEBINAR;
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_list_ps", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function hapus_peserta()
    {
        $ID_PS = htmlspecialchars($this->input->post('ID_PS'));
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $JUDUL_WEBINAR = htmlspecialchars($this->input->post('JUDUL_WEBINAR'));
        
        $this->m_webinar->delete_ps($ID_PS, $ID_WEBINAR);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/Webinar/listpeserta/'. $JUDUL_WEBINAR);
    }
}
