<?php
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_blog');
        $this->load->model('admin/m_medsos');
        $this->load->model('admin/m_navbar');
        $this->load->model('m_landingpage');
        $this->load->model('admin/m_kebijakan');
        $this->load->library('upload');
        // $this->load->library('form_validation');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Blog";

        date_default_timezone_set('Asia/Jakarta');

        /** Ambil data blog */
        $data['blog'] = $this->m_blog->tampil_blog()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    // buat id kategori
    public function buat_id_ct()
    {
        $ID_K = $this->m_blog->selectMaxID_CT();
        if ($ID_K == NULL) {
            $kode = 'CT0001';
        } else {
            $noK = substr($ID_K, 2, 4);
            $IDK = $noK + 1;
            $kode = 'CT' . sprintf("%04s", $IDK);
        }
        return $kode;
    }
    // buat id tags
    public function buat_id_tags()
    {
        $ID_T = $this->m_blog->selectMaxID_TAGS();
        if ($ID_T == NULL) {
            $kode = 'TG0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $kode = 'TG' . sprintf("%04s", $IDT);
        }
        return $kode;
    }

    public function tulis_artikel()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Tulis Artikel";
        // nyari id_adm yg login
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT ID_ADM FROM admin WHERE EMAIL_ADM = '$email'");
        foreach ($query->result() as $que) {
            $ID_ADM = $que->ID_ADM;
        }
        $data['ID_ADM'] = $ID_ADM;
        // id ct n id tags
        $ID_CT = $this->buat_id_ct();
        $data['ID_CT'] = $ID_CT;
        $ID_TAGS = $this->buat_id_tags();
        $data['ID_TAGS'] = $ID_TAGS;
        // buat id blog
        $ID_P = $this->m_blog->selectMaxID_POST();
        if ($ID_P == NULL) {
            $data['ID_POST'] = 'PS00001';
        } else {
            $noP = substr($ID_P, 2, 5);
            $IDP = $noP + 1;
            $data['ID_POST'] = 'PS' . sprintf("%05s", $IDP);
        }
        // form validation
        $this->form_validation->set_rules('JUDUL_POST', 'judul', 'required|trim', [
            'required' => 'Kolom judul harus diisi!'
        ]);
        $this->form_validation->set_rules('KONTEN_POST', 'Konten', 'required|trim', [
            'required' => 'Kolom konten harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['tags'] = $this->m_blog->tampil_tags()->result();
            $data['category'] = $this->m_blog->tampil_kategori()->result();
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/blog/v_tulis_blog", $data);
            $this->load->view("admin/template_adm/v_footer");
        } else {
            $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
            $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
            $JUDUL_POST = htmlspecialchars($this->input->post('JUDUL_POST'));
            $FOTO_POST = htmlspecialchars($this->input->post('FOTO_POST'));
            $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
            $ID_TAGS = $this->input->post('ID_TAGS');
            $KONTEN_POST = $this->input->post('KONTEN_POST');
            $TGL_POST = date('Y-m-d');
            $UPDT_TRAKHIR = date('Y-m-d');
            // untuk upload foto blog
            $upload_image = $_FILES['FOTO_POST']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = '0';
                $config['upload_path']  = './assets/fotoblog/';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('FOTO_POST')) {
                    $this->session->set_flashdata('message', 'gagal_upload');
                    redirect("admin/blog");
                } else {
                    $upload_data = $this->upload->data();
                    //Compress Image buat foto web
                    $config['image_library'] = 'gd2';
                    $config['width'] = 1600;
                    $config['height'] = 900;
                    $config['source_image'] = './assets/fotoblog/' . $upload_data['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    // $config['quality'] = '100%';
                    // $config['width'] = 600;
                    // $config['height'] = 400;
                    // $config['new_image'] = './assets/fotoblog/fotowebi/' . $upload_data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $upload_image = $this->upload->data('file_name');
                }
            }

            $data = array(
                'ID_POST' => $ID_POST,
                'ID_ADM' => $ID_ADM,
                'JUDUL_POST' => str_replace(' ', '-', $JUDUL_POST),
                'ID_CT' => $ID_CT,
                'FOTO_POST' => $upload_image,
                'KONTEN_POST' => $KONTEN_POST,
                'TGL_POST' => $TGL_POST,
                'UPDT_TRAKHIR' => $UPDT_TRAKHIR
            );

            $this->m_blog->insert($data, 'post');

            for ($i = 0; $i < count($ID_TAGS); $i++) {
                $dt_tags = array(
                    'ID_POST' => $ID_POST,
                    'ID_TAGS' => $ID_TAGS[$i]
                );
                $this->m_blog->insert($dt_tags, 'detail_tags');
            }

            $this->session->set_flashdata('message', 'save');
            redirect('admin/blog');
        }
    }

    //tambah kategori di tulis blog
    public function pr_tmbh_kategori()
    {
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
        $data = array(
            'ID_CT' => $ID_CT,
            'NM_CT' => $NM_CT
        );
        $this->m_blog->insert($data, 'category');
        redirect('admin/blog/tulis_blog');
    }

    //tambah tags di tulis blog
    public function pr_tmbh_tags()
    {
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));
        $data = array(
            'ID_TAGS' => $ID_TAGS,
            'NM_TAGS' => $NM_TAGS
        );
        $this->m_blog->insert($data, 'tags');
        redirect('admin/blog/tulis_blog');
    }

    // proses posting artikel
    public function pr_posting()
    {
        $ST_POST = htmlspecialchars($this->input->post('ST_POST'));
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $where = array(
            'ID_POST' => $ID_POST
        );

        if ($ST_POST == 0) {
            $ST_POST++;
            $data = array(
                'ST_POST' => $ST_POST
            );
            $this->m_blog->update($where, $data, 'post');
            $this->session->set_flashdata('message', 'posting');
            redirect('admin/blog');
        } else {
            $ST_POST--;
            $data = array(
                'ST_POST' => $ST_POST
            );
            $this->m_blog->update($where, $data, 'post');
            $this->session->set_flashdata('message', 'draf');
            redirect('admin/blog');
        }
    }

    public function hapus_artikel()
    {
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $where = array(
            'ID_POST' => $ID_POST
        );
        $sql = $this->db->query("SELECT FOTO_POST FROM post WHERE ID_POST = '$ID_POST'");
        foreach ($sql->result() as $row) {
            $FOTO_POST = $row->FOTO_POST;
        }
        unlink(FCPATH . 'assets/fotoblog/' . $FOTO_POST);
        unlink(FCPATH . 'assets/fotoblog/fotoweb/' . $FOTO_POST);
        $this->m_blog->delete($where, 'detail_tags');
        $this->m_blog->delete($where, 'post');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/blog');
    }

    public function edit_artikel($JUDUL_POST)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Edit Artikel";
        $where = array('JUDUL_POST' => $JUDUL_POST);

        $ID_CT = $this->buat_id_ct();
        $data['ID_CT'] = $ID_CT;
        $ID_TAGS = $this->buat_id_tags();
        $data['ID_TAGS'] = $ID_TAGS;

        $data['post'] = $this->m_blog->tampil_edit($where, 'post')->result();
        $data['dttags'] = $this->m_blog->tampil_edit_tag($JUDUL_POST, 'detail_tags')->result();
        $data['category'] = $this->m_blog->tampil_kategori()->result();
        $data['tags'] = $this->m_blog->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_edit_artikel", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function update_artikel()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_POST = htmlspecialchars($this->input->post('JUDUL_POST'));
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $ID_TAGS = $this->input->post('ID_TAGS');
        $FOTO_POST = htmlspecialchars($this->input->post('FOTO_POST'));
        $HAPUS_FOTO = $this->input->post('HAPUS_FOTO');
        $KONTEN_POST = $this->input->post('KONTEN_POST');
        $ST_POST = 0;
        $TGL_POST = date('Y-m-d');
        $UPDT_TRAKHIR = date('Y-m-d');
        // untuk upload foto blog
        $upload_image = $_FILES['FOTO_POST']['name'];

        $upload_image = $_FILES['FOTO_POST']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path']  = './assets/fotoblog/';
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('FOTO_POST')) {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/blog");
            } else {
                $upload_data = $this->upload->data();

                //Compress Image buat foto web
                $config['image_library'] = 'gd2';
                $config['width'] = 1600;
                $config['height'] = 900;
                $config['source_image'] = './assets/fotoblog/' . $upload_data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './assets/fotoblog/fotoweb/' . $upload_data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $get = $this->db->get_where('post', ['ID_POST' => $ID_POST])->row();
                unlink(FCPATH . 'assets/fotoblog/' . $get->FOTO_POST);

                $upload_image = $this->upload->data('file_name');
            }
        } else {
            $upload_image = $HAPUS_FOTO;
        }

        $where = array('ID_POST' => $ID_POST);

        $data = array(
            'JUDUL_POST' => str_replace(' ', '-', $JUDUL_POST),
            'ID_ADM' => $ID_ADM,
            'ID_CT' => $ID_CT,
            'FOTO_POST' => $upload_image,
            'KONTEN_POST' => $KONTEN_POST,
            // 'TGL_POST' => $TGL_POST,
            'UPDT_TRAKHIR' => $UPDT_TRAKHIR,
            'ST_POST' => $ST_POST
        );

        $this->m_blog->update($where, $data, 'post');
        $this->m_blog->delete($where, 'detail_tags');

        for ($i = 0; $i < count($ID_TAGS); $i++) {
            $dt_tags = array(
                'ID_POST' => $ID_POST,
                'ID_TAGS' => $ID_TAGS[$i]
            );
            $this->m_blog->insert($dt_tags, 'detail_tags');
        }

        $this->session->set_flashdata('message', 'edit');
        redirect('admin/blog');
    }

    // pratinjau / lihat post / lihat artikel
    public function pratinjau($JUDUL_POST)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Preneur Academy Blog";
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['list'] = $this->m_landingpage->list();
        $data['blog'] = $this->m_blog->tampil_dt_blog($JUDUL_POST, 'post')->result();
        $data['detail_tags'] = $this->m_blog->tampil_dt_tags($JUDUL_POST, 'detail_tags')->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view('admin/blog/detail_blog', $data);
        $this->load->view("landingpage/template/footer", $data);
    }
}