<?php
header('Access-Control-Allow-Origin: *');
header('*Access-Control-Allow-Method: GET, OPTIONS*');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_transaksi');
        $this->load->model('peserta/m_kelas');
		$params = array('server_key' => 'SB-Mid-server-tNBThkCAIbSjBODU1WuDkHfU', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
        psrt_logged_in();
        cekpsrt();
    }

    /** Menampilkan data transaksi */
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $data['tittle'] = 'Histori Transaksi';

        /** Mengambil data kelas */
        $data['transaksi'] = $this->m_transaksi->gettrn($email);
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/transaksi/v_transaksi", $data);
        $this->load->view("peserta/template/v_footer");
    }

    /** Menampilkan detail transaksi */
    public function dettrn($eID)
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        $data['tittle'] = 'Detail Transaksi';

        /** Mengambil data kelas */
        $data['dettrn'] = $this->m_transaksi->dettrn($eID, $email);
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/transaksi/v_dettransaksi", $data);
        $this->load->view("peserta/template/v_footer");
    }

    /** Edit data kelas */
    public function editkls()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Kelas';

        /** Mengambil data kelas */
        $data['kelas'] = $this->m_kelas->getkelas();

        $this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Kolom ini harus diisi',
            'numeric' => 'Data harus berisi angka'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_kelas', $data);
            $this->load->view('admin/template_adm/v_footer');
        } else {
            $id = $this->input->post('id');
            $nama = htmlspecialchars($this->input->post('namakls'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $kategori = htmlspecialchars($this->input->post('ktg'));
            $oldimg = $this->input->post('old');

            /** Proses edit gambar */
            $upload_image = $_FILES['gbrkls']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/kelas/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gbrkls')) {
                    if ($oldimg != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/kelas/' . $oldimg);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $new_image = $oldimg;
            }

            $edit = [
                'TITTLE' => $nama,
                'PERMALINK' => $link,
                'GBR_KLS' => $new_image,
                'DESKRIPSI' => $deskripsi,
                'PRICE' => $harga,
                'ID_DISKON' => 0,
                'ID_KTGKLS' => $kategori,
                'UPDATE_KLS' => time(),
            ];

            $this->m_kelas->editkls($edit, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/kelas');
        }
    }

    public function hapuskls()
    {
        $id = $this->input->post('id');
        $this->m_kelas->delkls($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/kelas');
    }

    public function beli($id)
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();
        
        $cek = $this->db->query("SELECT transaksi.ID_PS, peserta.ID_PS AS ID_PSS FROM transaksi, peserta
                                WHERE transaksi.ID_PS = peserta.ID_PS AND transaksi.ID_KLS = '$id'");
        if ($cek->result() == NULL) {
            $data['tittle'] = 'Beli Kelas';
            
            $data['kelas'] = $this->m_kelas->get_detclass($id);
            $this->load->view("peserta/template/v_header", $data);
            $this->load->view("peserta/template/v_navbar", $data);
            $this->load->view("peserta/template/v_sidebar", $data);
            $this->load->view("peserta/transaksi/v_beli_kelas", $data);
            $this->load->view("peserta/template/v_footer");
        } else {
            redirect ('peserta/myclass');
        }
    }

    public function token()
	{
        /** Menangkap data ajax */
        $idkls  = $this->input->post('idkls');
		$kelas = $this->input->post('kelas');
		$harga = $this->input->post('harga');
		$namaps = $this->input->post('namaps');
		$hp  = $this->input->post('hp');
        $email  = $this->input->post('email');

		// Required
		$transaction_details = array(
			'order_id' => 'TRN' . rand(),
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => $idkls,
			'price' => $harga,
			'quantity' => 1,
			'name' => $kelas
		);

		// Optional
		$item_details = array($item1_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		// $shipping_address = array(
		// 	'first_name'    => "Obet",
		// 	'last_name'     => "Supriadi",
		// 	'address'       => "Manggis 90",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16601",
		// 	'phone'         => "08113366345",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $namaps,
			'last_name'     => "",
			'email'         => $email,
			'phone'         => $hp
			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'hours',
			'duration'  => 12
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$email = $this->session->userdata('email');
		$peserta = $this->db->get_where('peserta', [
			'EMAIL_PS' => $email
		])->row_array();
        $idps  = $peserta['ID_PS'];
        $idkls = $this->input->post('idkls');

		$result = json_decode($this->input->post('result_data'), true);

		/** Expired time pembayaran */
		$exp_time = date("Y-m-d H:i:s", strtotime('+12 hours'));

		$data = array(
			'ID_TRN'  => $result['order_id'],
			'eID' => $result['transaction_id'],
			'AMOUNT' => $result['gross_amount'],
			'PAYMENT' => $result['payment_type'],
			'BANK' => $result['va_numbers'][0]['bank'],
			'VA_NUMBER' => $result['va_numbers'][0]['va_number'],
			'TIME' => $result['transaction_time'],
			'PDF_GUIDE' => $result['pdf_url'],
			'ID_KLS' => $idkls,
			'ID_PS' => $idps,
			'STATUS' => $result['status_code'],
			'EXP_TIME' => $exp_time
		);

		$data1 = array(
			'ID_TRN' => $data['ID_TRN'],
			'ID_KLS' => $idkls,
			'ID_PS' => $idps
		);

		$data2 = array(
			'STATUS_BELI' => $result['status_code']
		);

		/** Insert ke tabel notifikasi */
		$notif = array(
			'GLOBAL_ID' => $data['eID'],
			'ID_US' => 'ADM',
			'TITTLE_NOT' => 'Transaksi baru',
			'MSG_NOT' => 'Order id ' . $data['ID_TRN'] . ', atas nama ' . $peserta['NM_PS']  . '.',
			'LINK' => 'admin/transaksi/detpending/' . $data['eID'],
			'IS_READ' => 0,
			'ST_NOT' => 0,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($data['TIME']))
		);

		$notif1 = array(
			'GLOBAL_ID' => $data['eID'],
			'ID_US' => $data['ID_PS'],
			'TITTLE_NOT' => 'Transaksi berhasil',
			'MSG_NOT' => 'Order id ' . $data['ID_TRN'],
			'LINK' => 'peserta/transaksi/dettrn/' . $data['eID'],
			'IS_READ' => 0,
			'ST_NOT' => 1,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($data['TIME']))
		);

		$this->m_kelas->transaksi($data);
		$this->m_kelas->detilkls($data1);
		$this->m_kelas->pending($idps, $data2);

		/** admin */
		$this->db->insert('notif', $notif);

		/** peserta */
		$this->db->insert('notif', $notif1);

		$this->session->set_flashdata('message', 'success_trn');
		redirect('peserta/transaksi');
	}
}
