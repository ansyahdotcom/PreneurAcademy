<?php

class Navigasi extends CI_Controller
{

    function __construct(){
		parent::__construct();
        $this->load->model('admin/m_navbar','navbar_model');
        $this->load->library('form_validation');
        // $this->load->helper('text');
        adm_logged_in();
        cekadm();
	}

	function index(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Navigasi Menu Web Profile";
		$data['data'] = $this->navbar_model->get_navbar();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/setting/v_navigasi", $data);
        $this->load->view("admin/template_adm/v_footer");   
        
	}

	function insert(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        if($this->form_validation->run() == false){
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/setting/v_navigasi", $data);
            $this->load->view("admin/template_adm/v_footer"); 
        }else{
            $name = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		    $slug = htmlspecialchars(trim($this->input->post('link',TRUE)),ENT_QUOTES);
            $this->navbar_model->insert_navbar($name,$slug);
            $this->session->set_flashdata('message', 'navSuccess');
            redirect('admin/navigasi');
        }
	}

	function update(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        if($this->form_validation->run() == false){
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/setting/v_navigasi", $data);
            $this->load->view("admin/template_adm/v_footer"); 
        }else{
            $id = htmlspecialchars($this->input->post('id_navbar'));
            $name = htmlspecialchars($this->input->post('nama'));
            $slug = htmlspecialchars($this->input->post('link'));
            $this->navbar_model->update_navbar($id,$name,$slug);
            $this->session->set_flashdata('message', 'navUpdate');
            redirect('admin/navigasi');
        }
	}

	function delete(){
		$id = $this->input->post('id_delete',TRUE);
		$this->navbar_model->delete_navbar($id);
        $this->session->set_flashdata('message', 'navDelete');
        redirect('admin/navigasi');
	}

	function insert_submenu(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        if($this->form_validation->run() == false){
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/setting/v_navigasi", $data);
            $this->load->view("admin/template_adm/v_footer");  
        }else{
            $id = $this->input->post('id_submenu',TRUE);
            $name = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		    $slug = htmlspecialchars(trim($this->input->post('link',TRUE)),ENT_QUOTES);
            $this->navbar_model->insert_subnavbar($name,$slug,$id);
            $this->session->set_flashdata('message', 'navSub');
            redirect('admin/navigasi');
        }
	}
}
?>