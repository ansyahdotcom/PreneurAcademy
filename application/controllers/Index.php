<?php

class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landingpage');
        $this->load->model('admin/m_medsos');
        $this->load->model('admin/m_navbar');
        $this->load->model('admin/m_kebijakan');
        $this->load->model('admin/m_blog');
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $data['blog'] = $this->m_landingpage->tampil_blog_web()->result();
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/index");
        $this->load->view("landingpage/template/footer", $data);
    }

    public function post()
    {
        $data['blog'] = $this->m_landingpage->tampil_blog_web()->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['footer'] = $this->m_medsos->get_data();
        $data['judul'] = 'Preneur Academy | Blog';
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view("landingpage/post", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function lihat_post($JUDUL_POST)
    {
        $data['blog'] = $this->m_blog->tampil_dt_blog($JUDUL_POST, 'post')->result();
        $data['detail_tags'] = $this->m_blog->tampil_dt_tags($JUDUL_POST, 'detail_tags')->result();
        $data['list'] = $this->m_landingpage->list();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['footer'] = $this->m_medsos->get_data();
        $data['judul'] = 'Preneur Academy | Blog';
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view("landingpage/lihat_post", $data);
        $this->load->view("landingpage/template/footer", $data);
    }


    // lihat artikel yg kategori sama
    public function kategori($NM_CT)
    {
        $data['judul'] = $NM_CT;
        $data['nm_ct'] = $NM_CT;
        // $data['kategori'] = $this->m_landingpage->category($NM_CT)->result();
        $query = $this->db->query("SELECT admin.ID_ADM, admin.FTO_ADM, admin.NM_ADM, post.ID_POST, post.JUDUL_POST, post.KONTEN_POST, post.TGL_POST, 
                                    post.FOTO_POST, post.ST_POST, post.ID_CT, category.NM_CT
                                    FROM post, category, admin
                                    WHERE post.ID_CT = category.ID_CT AND admin.ID_ADM = post.ID_ADM
                                    AND category.NM_CT = '$NM_CT'");
        $data['POST'] = $query->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['footer'] = $this->m_medsos->get_data();
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view('landingpage/v_post_ktg', $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    // lihat artikel yg tag sama
    public function tag($NM_TAGS)
    {
        $data['judul'] = $NM_TAGS;
        $data['nm_tags'] = $NM_TAGS;
        $data['tag'] = $this->m_landingpage->tag($NM_TAGS)->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['footer'] = $this->m_medsos->get_data();
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view('landingpage/v_post_tag', $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function kelas()
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Kelas';
        $data['kelas'] = $this->m_landingpage->kelas()->result();
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/kls", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function dt_kls($PERMALINK)
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Kelas';
        $data['kelas'] = $this->m_landingpage->dt_kls($PERMALINK)->result();
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/dt_kls", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function webinar()
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Webinar';
        $data['webinar'] = $this->m_landingpage->webinar()->result();
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/wbnr", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function dt_webinar($JUDUL_WEBINAR)
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Webinar';
        $data['webinar'] = $this->m_landingpage->dt_webinar($JUDUL_WEBINAR)->result();
        $data['materi'] = $this->m_landingpage->materi($JUDUL_WEBINAR)->result();
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/dt_wbnr", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function about()
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Tentang Kami';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/about", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function comm()
    {
        $data['footer'] = $this->m_medsos->get_data();
        $data['header'] = $this->m_navbar->get_navbar();
        $data['kebijakan'] = $this->m_kebijakan->get_data();
        $data['judul'] = 'Preneur Academy | Tentang Kami';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/comm", $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    public function block()
    {
        $data['title'] = '403 Forbidden Page';
        $this->load->view('forbidden', $data);
    }

    public function notfound()
    {
        $data['title'] = '404 Page Not Found';
        $this->load->view('notfound', $data);
    }
}