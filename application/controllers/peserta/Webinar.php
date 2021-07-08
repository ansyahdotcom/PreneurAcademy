<?php
header('Access-Control-Allow-Origin: *');
header('*Access-Control-Allow-Method: GET, OPTIONS*');

class Webinar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_webinar');
        $params = array('server_key' => 'SB-Mid-server-tNBThkCAIbSjBODU1WuDkHfU', 'production' => false);
        $this->load->library('midtrans');
        $this->load->library('upload');
        $this->load->helper('download');
        $this->midtrans->config($params);
        psrt_logged_in();
        cekpsrt();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        $data['tittle'] = "Daftar Event Webinar";
        $data['webinar'] = $this->m_webinar->tampil_webinar()->result();
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/webinar/v_webinar", $data);
        $this->load->view("peserta/template/v_footer");
    }

    public function daftar($JUDUL_WEBINAR)
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        $sql = $this->db->query("SELECT peserta_wbnr.ID_PS FROM peserta_wbnr, peserta, webinar 
                                    WHERE peserta_wbnr.ID_WEBINAR = webinar.ID_WEBINAR 
                                    AND peserta_wbnr.ID_PS = peserta.ID_PS
                                    AND webinar.JUDUL_WEBINAR = '$JUDUL_WEBINAR' 
                                    AND peserta.EMAIL_PS = '$email'");
        if ($sql->result() == NULL) {

            $this->form_validation->set_rules('NM_PS', 'nm_ps', 'trim|required', [
                'required' => 'Kolom ini arus diisi'
            ]);

            $this->form_validation->set_rules('HP_PS', 'hp_ps', 'trim|required|numeric|is_natural|min_length[11]|max_length[13]', [
                'required' => 'Kolom ini harus diisi',
                'min_length' => 'Format nomor hp salah',
                'max_length' => 'Format nomor hp salah',
                'numeric' => 'Kolom ini harus diisi angka',
                'is_natural' => 'Kolom ini harus diisi angka'
            ]);

            $this->form_validation->set_rules('ALMT_PS', 'almt_ps', 'trim|required|max_length[100]', [
                'required' => 'Kolom ini harus disi angka',
            ]);

            $this->form_validation->set_rules('JK_PS', 'jk_ps', 'required', [
                'required' => 'Pilih jenis kelamin anda'
            ]);

            $this->form_validation->set_rules('PEKERJAAN', 'pekerjaan', 'required', [
                'required' => 'Pilih pekerjaan anda'
            ]);

            $this->form_validation->set_rules('AGAMA_PS', 'agama_ps', 'required', [
                'required' => 'Pilih agama anda'
            ]);

            if ($this->form_validation->run() == false) {
                $data['tittle'] = "Form Daftar Webinar";
                $data['webinar'] = $this->m_webinar->tampil_daftar_wbnr($JUDUL_WEBINAR)->result();
                $this->load->view("peserta/template/v_header", $data);
                $this->load->view("peserta/template/v_navbar", $data);
                $this->load->view("peserta/template/v_sidebar", $data);
                $this->load->view("peserta/webinar/v_daftar_wbnr", $data);
                $this->load->view("peserta/template/v_footer");
            } else {
                $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
                $ID_PS = htmlspecialchars($this->input->post('ID_PS'));
                $FTO_PS = htmlspecialchars($this->input->post('FTO_PS'));
                $HAPUS_FOTO = $this->input->post('HAPUS_FOTO');
                $NM_PS = htmlspecialchars($this->input->post('NM_PS'));
                $HP_PS = htmlspecialchars($this->input->post('HP_PS'));
                $ALMT_PS = $this->input->post('ALMT_PS');
                $JK_PS = htmlspecialchars($this->input->post('JK_PS'));
                $PEKERJAAN = $this->input->post('PEKERJAAN');
                $AGAMA_PS = htmlspecialchars($this->input->post('AGAMA_PS'));
                $ALASAN = htmlspecialchars($this->input->post('ALASAN'));
                $DATE_PS_WBNR = date("Y-m-d H:i:s");
                $new_image = $HAPUS_FOTO;

                /** Proses Edit Gambar */
            $upload_image = $_FILES['FTO_PS']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/peserta/';
                $config['encrypt_name']; TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('FTO_PS')) {
                    $old_image = $HAPUS_FOTO;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/peserta/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('FTO_PS', $new_image);
                } else {
                    $this->session->set_flashdata('message', 'gagal_upload');
                    redirect('peserta/webinar/daftar/'. $JUDUL_WEBINAR);
                }
            }
                
            $where = array('ID_PS' => $ID_PS);

            $data = array(
                'NM_PS' => $NM_PS,
                'HP_PS' => $HP_PS,
                'ALMT_PS' => $ALMT_PS,
                'FTO_PS' => $new_image,
                'JK_PS' => $JK_PS,
                'PEKERJAAN' => $PEKERJAAN,
                'AGAMA_PS' => $AGAMA_PS
            );
            $data2 = array(
                'ID_WEBINAR' => $ID_WEBINAR,
                'ID_PS' => $ID_PS,
                'ALASAN' => $ALASAN,
                'DATE_PS_WBNR' => $DATE_PS_WBNR
            );

            $this->m_webinar->update($where, $data, 'peserta');
            $this->m_webinar->insert($data2, 'peserta_wbnr');

            $this->session->set_flashdata('message', 'berhasil_daftar');
            redirect('peserta/webinar/mywebinar');
        
            }
        }  else {
            redirect('peserta/webinar/mywebinar');
        }
    }

    public function mywebinar()
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $data['tittle'] = "Webinar Saya";

        $data['pesertaa'] = $this->m_webinar->mywebinar($email)->result();

        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view('peserta/webinar/v_mywebinar', $data);
        $this->load->view("peserta/template/v_footer");
    }

    public function download_srt($SRT_WEBINAR)
    {
        force_download('./assets/fotowebinar/sertifikat/' . $SRT_WEBINAR, NULL);
        redirect('peserta/webinar/mywebinar');
    }
}
