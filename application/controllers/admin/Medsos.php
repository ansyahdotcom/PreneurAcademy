<?php

class Medsos extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('admin/m_medsos','medsos_model');
        // $this->load->helper('text');
        adm_logged_in();
        cekadm();
    }

    function index(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['tittle'] = 'Data Media Sosial';
        $data['data'] = $this->medsos_model->get_data(); 
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/setting/v_medsos", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    function insert(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        if($this->form_validation->run() == false){
            redirect('admin/medsos');
        }else{
            $name = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		    $icon = htmlspecialchars(trim($this->input->post('icon',TRUE)),ENT_QUOTES);
		    $link = htmlspecialchars(trim($this->input->post('link',TRUE)),ENT_QUOTES);
            $this->medsos_model->insert($name,$icon,$link);
            $this->session->set_flashdata('message', 'socialSuccess');
            redirect('admin/medsos');
        }
	}

	function update(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if($this->form_validation->run() == false){
            redirect('admin/medsos');
        }else{
            $id = htmlspecialchars($this->input->post('id_ms'));
            $name = htmlspecialchars($this->input->post('nama'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $link = htmlspecialchars($this->input->post('link'));
            $this->medsos_model->update_ms($id,$name,$icon,$link);
            $this->session->set_flashdata('message', 'socialUpdate');
            redirect('admin/medsos');
        }
	}

	function delete(){
		$id = $this->input->post('id_delete',TRUE);
		$this->medsos_model->delete_ms($id);
        $this->session->set_flashdata('message', 'socialDelete');
        redirect('admin/medsos');
	}
}