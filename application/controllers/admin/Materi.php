<?php

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_materi');
        // $this->load->library('PrimsLib');
        adm_logged_in();
        cekadm();
    }

    public function materikelas($id)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Modul";
        $data['materi'] = $this->m_materi->get_materi($id);
        $data['tugas'] = $this->m_materi->get_tugas();
        // $data['sub'] = $this->m_materi->get_sub();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listmateri", $data);
        $this->load->view("admin/template_adm/v_footer");
    }
    // 
    public function meet()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_MT = htmlspecialchars($this->input->post('id_materi'));
        $NM_SUB = htmlspecialchars($this->input->post('nama'));
        $DETAIL_SUB = htmlspecialchars($this->input->post('detail'));
        $FILE_SUB = $this->input->post('link');
        $ICON_SUB = htmlspecialchars($this->input->post('icon'));

        $data = array(
            'NM_SUB' => $NM_SUB,
            'DETAIL_SUB' => $DETAIL_SUB,
            'FILE_SUB' => $FILE_SUB,
            'ICON_SUB' => $ICON_SUB,
            'ID_MT' => $ID_MT
        );
        $this->m_materi->create($data, 'materi_sub');
        $this->session->set_flashdata('message', 'dataSuccess');

        redirect("admin/materi/materikelas/$id");
    }

    public function meet_edit()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_SUB = htmlspecialchars($this->input->post('id_sub'));
        $ID_MT = htmlspecialchars($this->input->post('id_materi'));
        $NM_SUB = htmlspecialchars($this->input->post('nama'));
        $FILE_SUB = $this->input->post('link');
        $ICON_SUB = htmlspecialchars($this->input->post('icon'));

        $where = array(
            'ID_SUB' => $ID_SUB
        );

        $data = array(
            'NM_SUB' => $NM_SUB,
            'FILE_SUB' => $FILE_SUB,
            'ICON_SUB' => $ICON_SUB,
            'ID_MT' => $ID_MT
        );

        $this->m_materi->update_($where, $data, 'materi_sub');
        $this->session->set_flashdata('message', 'edit');

        redirect("admin/materi/materikelas/$id");
    }

    // CREATE FILE MATERI
    public function upload_file()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_MT = htmlspecialchars($this->input->post('id_materi'));
        $NM_SUB = htmlspecialchars($this->input->post('nama'));
        $ICON_SUB = htmlspecialchars($this->input->post('jenis'));
        $upload = $_FILES['file']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/dist/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
            $config['max_size'] = 5000;
            $config['overwrite'] = TRUE;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new = $this->upload->data('file_name');
                $this->db->set('FILE_SUB', $new);
            } else {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/materi/materikelas/$id");
            }
        }

        $data = array(
            'NM_SUB' => $NM_SUB,
            'ICON_SUB' => $ICON_SUB,
            // 'FILE_SUB' => $FILE_SUB, 
            'ID_MT' => $ID_MT
        );
        $this->m_materi->upload_($data, 'materi_sub');
        $this->session->set_flashdata('message', 'dataSuccess');

        redirect("admin/materi/materikelas/$id");
    }

    // UPDATE FILE MATERI
    public function update_file()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_SUB = htmlspecialchars($this->input->post('id_sub'));
        $NM_SUB = htmlspecialchars($this->input->post('nama'));
        $ICON_SUB = htmlspecialchars($this->input->post('jenis'));
        $upload = $_FILES['file']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/dist/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
            $config['max_size'] = 5000;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new = $this->upload->data('file_name');
                $this->db->set('FILE_SUB', $new);
                $get = $this->db->get_where('materi_sub', ['ID_SUB' => $ID_SUB])->row();
                unlink(FCPATH . 'assets/dist/materi/' . $get->FILE_SUB);
            } else {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/materi/materikelas/$id");
            }
        }

        $data = array(
            'NM_SUB' => $NM_SUB,
            'ICON_SUB' => $ICON_SUB,
            // 'FILE_SUB' => $FILE_SUB,  
        );

        $where = array(
            'ID_SUB' => $ID_SUB
        );
        $this->m_materi->update_($where, $data, 'materi_sub');
        $this->session->set_flashdata('message', 'dataSuccess');

        redirect("admin/materi/materikelas/$id");
    }

    public function upload_tugas()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_TG = $this->m_materi->selectMaxID_TUGAS();
        if ($ID_TG == NULL) {
            $ID_TG = 'TG00001';
        } else {
            $noTG = substr($ID_TG, 2, 5);
            $IDTG = $noTG + 1;
            $ID_TG = 'TG' . sprintf("%05s", $IDTG);
        }

        $ID_MT = htmlspecialchars($this->input->post('id_materi'));
        $NM_TG = htmlspecialchars($this->input->post('nama'));
        $ICON_TG = htmlspecialchars($this->input->post('jenis'));
        $DETAIL_TG = $this->input->post('deskripsi');
        $DEADLINE = htmlspecialchars($this->input->post('deadline'));
        $upload = $_FILES['file']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/dist/tugas/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
            $config['max_size'] = 5000;
            $config['overwrite'] = TRUE;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new = $this->upload->data('file_name');
                $this->db->set('FILE_TG', $new);
            } else {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/materi/materikelas/$id");
            }
        }

        $data = array(
            'ID_TG' => $ID_TG,
            'NM_TG' => $NM_TG,
            'DETAIL_TG' => $DETAIL_TG,
            'DEADLINE' => date('Y-m-d H:i', strtotime($DEADLINE)),
            'ICON_TG' => $ICON_TG,
            // 'FILE_TG' => $FILE_TG, 
            'ID_MT' => $ID_MT
        );
        $this->m_materi->upload_($data, 'tugas');
        $this->session->set_flashdata('message', 'dataSuccess');
        $id = $this->input->post('id_kelas');
        redirect("admin/materi/materikelas/$id");
    }

    public function update_tugas()
    {
        $id = htmlspecialchars($this->input->post('id_kelas'));
        $ID_TG = htmlspecialchars($this->input->post('id_tg'));
        $ID_MT = htmlspecialchars($this->input->post('id_mt'));
        $NM_TG = htmlspecialchars($this->input->post('nama'));
        $ICON_TG = htmlspecialchars($this->input->post('jenis'));
        $DETAIL_TG = $this->input->post('deskripsi');
        $DEADLINE = htmlspecialchars($this->input->post('deadline'));
        $upload = $_FILES['file']['name'];
        if ($upload) {
            $config['upload_path'] = './assets/dist/materi/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
            $config['max_size'] = 5000;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new = $this->upload->data('file_name');
                $this->db->set('FILE_TG', $new);
                $get = $this->db->get_where('tugas', ['ID_TG' => $ID_TG])->row();
                unlink(FCPATH . 'assets/dist/tugas/' . $get->FILE_TG);
            } else {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect("admin/materi/materikelas/$id");
            }
        }

        $data = array(
            'NM_TG' => $NM_TG,
            'DETAIL_TG' => $DETAIL_TG,
            'DEADLINE' => date('Y-m-d H:i', strtotime($DEADLINE)),
            'ICON_TG' => $ICON_TG,
            // 'FILE_TG' => $FILE_TG, 
            'ID_MT' => $ID_MT
        );

        $where = array(
            'ID_TG' => $ID_TG,
        );
        $this->m_materi->update_($where, $data, 'tugas');
        $this->session->set_flashdata('message', 'dataSuccess');
        $id = $this->input->post('id_kelas');
        redirect("admin/materi/materikelas/$id");
    }

    function delete_tugas()
    {
        $id = $this->input->post('id_kelas', TRUE);
        $id_tg = $this->input->post('delete_id', TRUE);
        $get = $this->db->get_where('tugas', ['ID_TG' => $id_tg])->row();
        unlink(FCPATH . 'assets/dist/tugas/' . $get->FILE_TG);
        $where = array(
            'ID_TG' => $id_tg
        );
        $this->m_materi->delete_($where, 'tugas');
        $this->session->set_flashdata('message', 'dataDelete');
        redirect("admin/materi/materikelas/$id");
    }

    // DELETE FILE MATERI
    function delete_file()
    {
        $id = $this->input->post('id_kelas', TRUE);
        $id_sub = $this->input->post('delete_id', TRUE);
        $get = $this->db->get_where('materi_sub', ['ID_SUB' => $id_sub])->row();
        unlink(FCPATH . 'assets/dist/materi/' . $get->FILE_SUB);
        $where = array(
            'ID_SUB' => $id_sub
        );
        $this->m_materi->delete_($where, 'materi_sub');
        $this->session->set_flashdata('message', 'dataDelete');
        redirect("admin/materi/materikelas/$id");
    }

    //CREATE
    function create()
    {
        $id = $this->input->post('id_kelas', TRUE);
        $materi = $this->input->post('nama', TRUE);
        $detail = $this->input->post('detail', TRUE);
        $id_kelas = $id;
        $this->m_materi->create_($materi, $detail, $id_kelas);
        $this->session->set_flashdata('message', 'dataSuccess');
        redirect("admin/materi/materikelas/$id");
    }

    //UPDATE
    function update()
    {
        $id = $this->input->post('id_kelas', TRUE);
        $id_mt = $this->input->post('id_edit', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $detail = $this->input->post('detail', TRUE);
        $data = array(
            'NM_MT' => $nama,
            'DETAIL_MT' => $detail
        );
        $where = array(
            'ID_MT' => $id_mt
        );
        $this->m_materi->update_($where, $data, 'materi');
        $this->session->set_flashdata('message', 'dataUpdate');
        redirect("admin/materi/materikelas/$id");
    }

    // DELETE
    function delete()
    {
        $id = $this->input->post('id_kelas', TRUE);
        $id_mt = $this->input->post('delete_id', TRUE);
        $where = array(
            'ID_MT' => $id_mt
        );
        $this->m_materi->delete_($where, 'materi');
        $this->session->set_flashdata('message', 'dataDelete');
        redirect("admin/materi/materikelas/$id");
    }
}