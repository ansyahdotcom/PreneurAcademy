<?php

class Kebijakan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_kebijakan', 'kebijakan_model');
        $this->load->library('image_lib');
        adm_logged_in();
        cekadm();
    }

    function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['tittle'] = 'Data Kebijakan';
        $data['data'] = $this->kebijakan_model->get_data();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/setting/v_kebijakan", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    function insert()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/kebijakan');
        } else {
            $name = htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES);
            $link = htmlspecialchars(trim($this->input->post('link', TRUE)), ENT_QUOTES);
            $isi = $this->input->post('isi');
            $upload = $_FILES['image']['name'];
            if ($upload) {
                $config['upload_path'] = './assets/dist/img/kebijakan/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|svg';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['kebijakan']['IMG_KB'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/dist/img/kebijakan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('IMG_KB', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->kebijakan_model->insert($name, $link, $isi);
            $this->session->set_flashdata('message', 'kbSuccess');
            redirect('admin/kebijakan');
        }
    }

    function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == false) {
            redirect('admin/kebijakan');
        } else {
            $upload = $_FILES['image']['name'];
            if ($upload) {
                $config['upload_path'] = './assets/dist/img/kebijakan/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['kebijakan']['IMG_KB'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/kebijakan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('IMG_KB', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = htmlspecialchars($this->input->post('id_kb'));
            $name = htmlspecialchars($this->input->post('nama'));
            $link = htmlspecialchars($this->input->post('link'));
            $isi = $this->input->post('isi');
            $this->kebijakan_model->update($id, $name, $link, $isi);
            $this->session->set_flashdata('message', 'kbUpdate');
            redirect('admin/kebijakan');
        }
    }

    function delete()
    {
        $id = $this->input->post('id_delete', TRUE);
        $this->kebijakan_model->delete($id);
        $this->session->set_flashdata('message', 'kbDelete');
        redirect('admin/kebijakan');
    }
}