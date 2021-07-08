<?php
class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/m_kelas');
		$this->load->library('upload');
		adm_logged_in();
		cekadm();
	}

	/** Menampilkan data kelas */
	public function index()
	{
		$email = $this->session->userdata('email');
		$data['admin'] = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();
		$data['tittle'] = 'Data Kelas';

		/** Mengambil data kelas */
		$data['kelas'] = $this->m_kelas->getkelas();
		$this->load->view('admin/template_adm/v_header', $data);
		$this->load->view('admin/template_adm/v_navbar', $data);
		$this->load->view('admin/template_adm/v_sidebar', $data);
		$this->load->view('admin/kelas/v_kelas', $data);
		$this->load->view('admin/template_adm/v_footer');
	}

	/** Mengambil data kategori kelas */
	public function get_ktgkls()
	{
		$ktgkls = $this->m_kelas->getktg();
		echo json_encode($ktgkls);
	}

	/** Mengambil data kategori kelas */
	public function get_diskon()
	{
		$diskon = $this->m_kelas->getdiskon();
		echo json_encode($diskon);
	}

	/** Simpan Semua Data Kelas */
	public function tambahkls()
	{
		$email = $this->session->userdata('email');
		$data['admin'] = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();
		$data['tittle'] = 'Tambah Data Kelas';

		/** Periksa apa ada data di tabel kelas */
		$tabel = $this->m_kelas->idkls()->num_rows();

		/** Ambil id terakhir */
		$getID = $this->m_kelas->idkls()->row_array();

		if ($tabel > 0) :
			$id_kls = autonumber($getID['ID_KLS'], 2, 8);
		else :
			$id_kls = 'KL00000001';
		endif;

		$this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
			'required' => 'Kolom ini harus diisi'
		]);

		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric|is_natural', [
			'required' => 'Kolom ini harus diisi',
			'numeric' => 'Kolom ini harus diisi angka',
			'is_natural' => 'Kolom ini harus diisi angka'
		]);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
			'required' => 'Kolom ini harus diisi',
		]);

		if ($this->form_validation->run() == false) {
			/** Mengambil data kelas */
			$data['kelas'] = $this->m_kelas->getkelas();
			$this->load->view('admin/template_adm/v_header', $data);
			$this->load->view('admin/template_adm/v_navbar', $data);
			$this->load->view('admin/template_adm/v_sidebar', $data);
			$this->load->view('admin/kelas/v_tambahkls', $data);
			$this->load->view('admin/template_adm/v_footer');
			$this->session->set_flashdata('message', 'formempty');
		} else {
			$namakls = htmlspecialchars($this->input->post('namakls'));
			// $tgl_daftar = htmlspecialchars($this->input->post('tgl_daftar'));
			// $tgl_penutupan = htmlspecialchars($this->input->post('tgl_penutupan'));
			$permalink = htmlspecialchars($this->input->post('permalink'));
			$tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai'));
			$tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai'));
			// $lok_kls = htmlspecialchars($this->input->post('lok_kls'));
			// $hari = htmlspecialchars($this->input->post('hari'));
			$kategori = htmlspecialchars($this->input->post('ktg'));
			$harga = htmlspecialchars($this->input->post('harga'));
			$kuota_kls = htmlspecialchars($this->input->post('kuota_kls'));
			$deskripsi = $this->input->post('deskripsi');

			/** upload gambar */
			$upload_image = $_FILES['gbrkls']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['upload_path']  = './assets/dist/img/kelas/';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gbrkls')) {
					$upload_img = $this->upload->data();

					/** konfigurasi gambar */
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/dist/img/kelas/' . $upload_img['file_name'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '80%';
					$config['width'] = 600;
					$config['height'] = 400;
					$config['new_image'] = './assets/dist/img/kelas/v_kelas/' . $upload_img['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$image = $this->upload->data('file_name');
				} else {
					// echo $this->upload->display_errors();
					$this->session->set_flashdata('message', 'upload_gagal');
					redirect('admin/kelas');
				}
			} else {
				$image = 'default.jpg';
			}

			/** Proses insert ke database */
			$kelas = [
				'ID_KLS' => $id_kls,
				'ID_ADM' => $data['admin']['ID_ADM'],
				'ID_KTGKLS' => $kategori,
				'ID_DISKON' => 0,
				'TITTLE' => $namakls,
				// 'TGL_PENDAFTARAN' => date('Y-m-d H:i', strtotime($tgl_daftar)),
				// 'TGL_PENUTUPAN' => date('Y-m-d H:i', strtotime($tgl_penutupan)),
				'PERMALINK' => $permalink,
				'TGL_MULAI' => date('Y-m-d', strtotime($tgl_mulai)),
				'TGL_SELESAI' => date('Y-m-d', strtotime($tgl_selesai)),
				// 'LOK_KLS' => $lok_kls,
				// 'HARI' => $hari,
				'GBR_KLS' => $image,
				'DESKRIPSI' => $deskripsi,
				'PRICE' => $harga,
				'KUOTA_KLS' => $kuota_kls,
				'STAT' => 0,
				'DATE_KLS' => time(),
				'UPDATE_KLS' => 0
			];

			$this->m_kelas->tambahkls($kelas);
			$this->session->set_flashdata('message', 'save');
			redirect('admin/kelas');
		}
	}

	/** Edit data kelas */
	public function detailkls($id)
	{
		$email = $this->session->userdata('email');
		$data['admin'] = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();
		$data['tittle'] = 'Detail Kelas';

		/** Mengambil data kelas */
		$data['kelas'] = $this->m_kelas->detilkls($id);
		$data['kategori_kls'] = $this->m_kelas->getktg();

		$this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
			'required' => 'Kolom ini harus diisi'
		]);

		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric|is_natural', [
			'required' => 'Kolom ini harus diisi',
			'numeric' => 'Kolom ini harus diisi angka',
			'is_natural' => 'Kolom ini harus diisi angka'
		]);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
			'required' => 'Kolom ini harus diisi',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template_adm/v_header', $data);
			$this->load->view('admin/template_adm/v_navbar', $data);
			$this->load->view('admin/template_adm/v_sidebar', $data);
			$this->load->view('admin/kelas/v_editkls', $data);
			$this->load->view('admin/template_adm/v_footer');
		} else {
			$id = $this->input->post('id');
			$nama = htmlspecialchars($this->input->post('namakls'));
			// $tgl_daftar = htmlspecialchars($this->input->post('tgl_daftar'));
			// $tgl_penutupan = htmlspecialchars($this->input->post('tgl_penutupan'));
			$permalink = htmlspecialchars($this->input->post('link'));
			$tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai'));
			$tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai'));
			// $lok_kls = htmlspecialchars($this->input->post('lok_kls'));
			// $hari = htmlspecialchars($this->input->post('hari'));
			$harga = htmlspecialchars($this->input->post('harga'));
			$kuota_kls = htmlspecialchars($this->input->post('kuota_kls'));
			$kategori = htmlspecialchars($this->input->post('ktg'));
			$deskripsi = $this->input->post('deskripsi');
			$oldimg = $this->input->post('old');

			/** Proses edit gambar */
			$upload_image = $_FILES['gbrkls']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/dist/img/kelas/';

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gbrkls')) {
					/** file yang di upload */
					$upload_img = $this->upload->data();

					/** konfigurasi gambar */
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/dist/img/kelas/' . $upload_img['file_name'];
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '80%';
					$config['width'] = 600;
					$config['height'] = 400;
					$config['new_image'] = './assets/dist/img/kelas/v_kelas/' . $upload_img['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($oldimg != 'default.jpg') {
						unlink(FCPATH . 'assets/dist/img/kelas/' . $oldimg);
					}
					$new_image = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', 'upload_gagal');
					redirect('admin/kelas/detailkls/' . $id);
				}
			} else {
				$new_image = $oldimg;
			}

			$edit = [
				'TITTLE' => $nama,
				// 'TGL_PENDAFTARAN' => date('Y-m-d H:i', strtotime($tgl_daftar)),
				// 'TGL_PENUTUPAN' => date('Y-m-d H:i', strtotime($tgl_penutupan)),
				'PERMALINK' => $permalink,
				'TGL_MULAI' => date('Y-m-d', strtotime($tgl_mulai)),
				'TGL_SELESAI' => date('Y-m-d', strtotime($tgl_selesai)),
				// 'LOK_KLS' => $lok_kls,
				// 'HARI' => $hari,
				'GBR_KLS' => $new_image,
				'DESKRIPSI' => $deskripsi,
				'PRICE' => $harga,
				'KUOTA_KLS' => $kuota_kls,
				'ID_DISKON' => 0,
				'ID_KTGKLS' => $kategori,
				'UPDATE_KLS' => time(),
			];

			$this->m_kelas->editkls($edit, $id);
			$this->session->set_flashdata('message', 'edit');
			redirect('admin/kelas/detailkls/' . $id);
		}
	}

	/** Menampilkan list peserta yang terdaftar di masing2 kelas */
	public function peserta($id)
	{
		$email = $this->session->userdata('email');
		$data['admin'] = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();
		$data['tittle'] = 'List Peserta';

		/** Mengambil data peserta */
		$data['listpeserta'] = $this->m_kelas->listpeserta($id);

		/** Mengambil nama kelas */
		$data['nmkelas'] = $this->m_kelas->nmkelas($id);

		/** Jumlah tugas */
		$data['jmltugas'] = $this->m_kelas->jmltugas($id);

		/** Jumlah Submit */
		$data['submit'] = $this->m_kelas->submit($id);

		$this->load->view('admin/template_adm/v_header', $data);
		$this->load->view('admin/template_adm/v_navbar', $data);
		$this->load->view('admin/template_adm/v_sidebar', $data);
		$this->load->view('admin/kelas/v_listpeserta', $data);
		$this->load->view('admin/template_adm/v_footer');
	}

	/** Hapus data kelas */
	public function hapuskls()
	{
		$id = $this->input->post('id');
		$this->m_kelas->deldtkls($id);
		$this->m_kelas->delkls($id);
		$this->session->set_flashdata('message', 'hapus');
		redirect('admin/kelas');
	}

	/** Mengarsipkan kelas */
	public function draftkls()
	{
		$id = $this->input->post('id');
		$this->m_kelas->drftkls($id);
		$this->session->set_flashdata('message', 'draft');
		redirect('admin/kelas');
	}

	/** Mempublish kelas */
	public function publishkls()
	{
		$id = $this->input->post('id');
		$this->m_kelas->pubkls($id);
		$this->session->set_flashdata('message', 'publish');
		redirect('admin/kelas');
	}

	/** Mengirim sertifikat ke peserta */
	public function sertifikat($id)
	{
		$idps = $this->input->post('idps');
		$upload_sertif = $_FILES['sertif']['name'];

		/** Proses Upload Sertifikat */
		if ($upload_sertif) {
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/dist/img/sertifikat/';

			$this->upload->initialize($config);

			if ($this->upload->do_upload('sertif')) {
				$sertifikat = $this->upload->data('file_name');
			} else {
				// echo $this->upload->display_errors();
				$this->session->set_flashdata('message', 'upload_gagal');
				redirect('admin/kelas/peserta/' . $id);
			}
		} else {
			$this->session->set_flashdata('message', 'upload_gagal');
			redirect('admin/kelas/peserta/' . $id);
		}

		$data = [
			'ID_PS' => $idps,
			'ID_KLS' => $id,
			'SERTIFIKAT' => $sertifikat
		];

		$this->m_kelas->sertif($data);
		$this->session->set_flashdata('message', 'save');
		redirect('admin/kelas/peserta/' . $id);
	}
}