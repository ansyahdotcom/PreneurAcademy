<?php
header('Access-Control-Allow-Origin: *');
header('*Access-Control-Allow-Method: GET, OPTIONS*');

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peserta/m_kelas');
		$params = array('server_key' => 'SB-Mid-server-tNBThkCAIbSjBODU1WuDkHfU', 'production' => false);
		$this->load->library('midtrans');
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

		$data['tittle'] = "Daftar Kelas Belajar";

		/** Function Search Data */
		if (isset($_POST['btn-search'])) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		/** Pagination halaman kelas */

		/** Query terakhir untuk helper search*/
		$this->db->like('TITTLE', $data['keyword']);
		$this->db->from('kelas');


		$config['total_rows'] = $this->db->count_all_results();
		$data['rows'] = $config['total_rows'];
		$config['per_page'] = 6;
		// $config['num_links'] = 3;

		/** Initialize library pagination */
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(4);


		/** Mengambil data kelas */
		$data['kls'] = $this->m_kelas->getkelas($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view("peserta/template/v_header", $data);
		$this->load->view("peserta/template/v_navbar", $data);
		$this->load->view("peserta/template/v_sidebar", $data);
		$this->load->view("peserta/kelas/v_kelas", $data);
		$this->load->view("peserta/template/v_footer");
	}

	/** Mengambil  */
	public function getkelas()
	{
		$id = $this->input->post('eID');
		$data['kelas'] = $this->m_kelas->kelas($id);
		echo json_encode($data['kelas']);
	}

	// public function token()
	// {
		/** Menangkap data ajax */
		// $id  = $this->input->post('id');
		// $kelas = $this->input->post('kelas');
		// $harga = $this->input->post('harga');
		// $nama = $this->input->post('nama');
		// $hp  = $this->input->post('hp');
		// $email  = $this->input->post('email');

		// Required
		// $transaction_details = array(
			// 'order_id' => 'TRN' . rand(),
			// 'gross_amount' => $harga, // no decimal allowed for creditcard
		// );

		// Optional
		// $item1_details = array(
		// 	'id' => $id,
		// 	'price' => $harga,
		// 	'quantity' => 1,
		// 	'name' => $kelas
		// );

		// Optional
		// $item_details = array($item1_details);

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
		// $customer_details = array(
		// 	'first_name'    => $nama,
		// 	'last_name'     => "",
		// 	'email'         => $email,
		// 	'phone'         => $hp
			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		// );

		// Data yang akan dikirim untuk request redirect_url.
		// $credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		// $time = time();
		// $custom_expiry = array(
		// 	'start_time' => date("Y-m-d H:i:s O", $time),
		// 	'unit' => 'hours',
		// 	'duration'  => 12
		// );

	// 	$transaction_data = array(
	// 		'transaction_details' => $transaction_details,
	// 		'item_details'       => $item_details,
	// 		'customer_details'   => $customer_details,
	// 		'credit_card'        => $credit_card,
	// 		'expiry'             => $custom_expiry
	// 	);

	// 	error_log(json_encode($transaction_data));
	// 	$snapToken = $this->midtrans->getSnapToken($transaction_data);
	// 	error_log($snapToken);
	// 	echo $snapToken;
	// }

	// public function finish()
	// {
	// 	$email = $this->session->userdata('email');
	// 	$peserta = $this->db->get_where('peserta', [
	// 		'EMAIL_PS' => $email
	// 	])->row_array();

		/** Menangkap data ajax */
		// $id  = $this->input->post('id');
		// $id_ps  = $this->input->post('id_ps');

		// $result = json_decode($this->input->post('result_data'), true);

		/** Expired time pembayaran */
		// $exp_time = date("Y-m-d H:i:s", strtotime('+12 hours'));

		// $data = array(
		// 	'ID_TRN'  => $result['order_id'],
		// 	'eID' => $result['transaction_id'],
		// 	'AMOUNT' => $result['gross_amount'],
		// 	'PAYMENT' => $result['payment_type'],
		// 	'BANK' => $result['va_numbers'][0]['bank'],
		// 	'VA_NUMBER' => $result['va_numbers'][0]['va_number'],
		// 	'TIME' => $result['transaction_time'],
		// 	'PDF_GUIDE' => $result['pdf_url'],
		// 	'ID_KLS' => $id,
		// 	'ID_PS' => $id_ps,
		// 	'STATUS' => $result['status_code'],
		// 	'EXP_TIME' => $exp_time
		// );

		// $data1 = array(
		// 	'ID_TRN' => $data['ID_TRN'],
		// 	'ID_KLS' => $id,
		// 	'ID_PS' => $id_ps
		// );

		// $data2 = array(
		// 	'STATUS_BELI' => $result['status_code']
		// );

		/** Insert ke tabel notifikasi */
		// $notif = array(
		// 	'GLOBAL_ID' => $data['eID'],
		// 	'ID_US' => $data['ID_PS'],
		// 	'TITTLE_NOT' => 'Transaksi baru',
		// 	'MSG_NOT' => 'Order id ' . $data['ID_TRN'] . ', atas nama ' . $peserta['NM_PS']  . '.',
		// 	'LINK' => 'admin/transaksi/detpending/' . $data['eID'],
		// 	'IS_READ' => 0,
		// 	'ST_NOT' => 0,
		// 	'DATE_NOT' => date('Y-m-d H:i:s', strtotime($data['TIME']))
		// );

		// $notif1 = array(
		// 	'GLOBAL_ID' => $data['eID'],
		// 	'ID_US' => $data['ID_PS'],
		// 	'TITTLE_NOT' => 'Transaksi berhasil',
		// 	'MSG_NOT' => 'Order id ' . $data['ID_TRN'],
		// 	'LINK' => 'peserta/transaksi/dettrn/' . $data['eID'],
		// 	'IS_READ' => 0,
		// 	'ST_NOT' => 1,
		// 	'DATE_NOT' => date('Y-m-d H:i:s', strtotime($data['TIME']))
		// );

		// $this->m_kelas->transaksi($data);
		// $this->m_kelas->detilkls($data1);
		// $this->m_kelas->pending($id_ps, $data2);

		/** admin */
		// $this->db->insert('notif', $notif);

		/** peserta */
		// $this->db->insert('notif', $notif1);

	// 	$this->session->set_flashdata('message', 'success_trn');
	// 	redirect('peserta/transaksi');
	// }
}
