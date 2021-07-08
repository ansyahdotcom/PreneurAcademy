<?php

class Key extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('admin/m_key','key_model');
        adm_logged_in();
        cekadm();
    }

    function index(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['tittle'] = 'Data API Key';
        $data['data'] = $this->key_model->get_key(); 
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/setting/v_key", $data);
        $this->load->view("admin/template_adm/v_footer");

    }

    function insert(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('key1', 'Key1', 'required');
        $this->form_validation->set_rules('key2', 'Key2', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run() == false){
            redirect('admin/key');
        }else{
            $name = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		    $key1 = htmlspecialchars(trim($this->input->post('key1',TRUE)),ENT_QUOTES);
		    $key2 = htmlspecialchars(trim($this->input->post('key2',TRUE)),ENT_QUOTES);
		    $status = htmlspecialchars(trim($this->input->post('status',TRUE)),ENT_QUOTES);
            $this->key_model->insert($name,$key1,$key2,$status);
            $this->session->set_flashdata('message', 'keySuccess');
            redirect('admin/key');
        }
	}

	function update(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('key1', 'Key1', 'required');
        $this->form_validation->set_rules('key2', 'Key2', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if($this->form_validation->run() == false){
            redirect('admin/key');
        }else{
            $id = htmlspecialchars($this->input->post('id_key'));
            $name = htmlspecialchars($this->input->post('nama'));
            $key1 = htmlspecialchars($this->input->post('key1'));
            $key2 = htmlspecialchars($this->input->post('key2'));
            $status = htmlspecialchars($this->input->post('status'));
            $this->key_model->update_key($id,$name,$key1,$key2,$status);
            $this->session->set_flashdata('message', 'keyUpdate');
            redirect('admin/key');
        }
	}

	function delete(){
		$id = $this->input->post('id_delete',TRUE);
		$this->key_model->delete_key($id);
        $this->session->set_flashdata('message', 'keyDelete');
        redirect('admin/key');
	}
}