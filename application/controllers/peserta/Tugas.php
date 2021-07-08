<?php

class Tugas extends CI_Controller{

    public function __construct(){
        parent::__construct();
        psrt_logged_in();
        cekpsrt();
    }

    public function detail($id){
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', ['EMAIL_PS' => $email])->row_array();
        $data['tugas']  = $this->db->get_where('tugas', ['ID_TG' => $id])->row_array();
        $data ['tittle'] = "Tugas";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/tugas/v_tugas", $data);
        $this->load->view("peserta/template/v_footer");
    }

    public function submit($id){
        $email = $this->session->userdata('email');
        $data ['peserta'] = $this->db->get_where('peserta', ['EMAIL_PS' => $email])->row_array();
        $data['tugas']  = $this->db->get_where('tugas', ['ID_TG' => $id])->row_array();
        $data ['tittle'] = "Tugas";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/tugas/v_submit", $data);
        $this->load->view("peserta/template/v_footer");
    }

    public function submittugas()
    {
        $id_ps = htmlspecialchars($this->input->post('ID_PS'));
        $id = htmlspecialchars($this->input->post('ID_TG'));
        $time = date('Y-m-d H:i:s');
        $deadline = $this->db->get_where('tugas', ['ID_TG' => $id])->row()->DEADLINE; 
        $sekarang = new DateTime($time);
        $tenggang = new DateTime($deadline);
        $materi = $this->db->get_where('tugas', ['ID_TG' => $id])->row()->ID_MT;
        $upload = $_FILES['file']['name'];
            if ($upload) {
                $config['upload_path'] = './assets/dist/materi/';
                $config['allowed_types'] = 'pdf|zip|doc|docx|ppt|pptx';
                $config['max_size'] = 5000;
                $config['overwrite'] = TRUE;
                // $config['max_width'] = 1500;
                // $config['max_height'] = 1500;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $new = $this->upload->data('file_name');
                    $this->db->set('FILE_DT_TG', $new);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            if($sekarang > $tenggang){
                $status = "Telat Mengumpulkan";
            }else{
                $status = "Sudah Mengumpulkan";
            }
        $data = array(
            'ID_PS' => $id_ps,
            'ID_TG' => $id,
            'ID_MT' => $materi,
            'TIME_DT_TG' => $time,
            'STATUS' => $status,
        );
		$this->db->insert('detil_tugas', $data);
        $this->session->set_flashdata('message', 'dataSuccess');

        redirect("peserta/tugas/detail/$id");
    }
    

    public function list_tugas(){
        $email = $this->session->userdata('email');
        $data ['peserta'] = $this->db->get_where('peserta', ['EMAIL_PS' => $email])->row_array();
        $data ['tittle'] = "List Tugas";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/tugas/v_list_tugas", $data);
        $this->load->view("peserta/template/v_footer");

    }
}