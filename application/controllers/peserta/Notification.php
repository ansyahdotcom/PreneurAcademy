<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-tNBThkCAIbSjBODU1WuDkHfU', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

	public function index()
	{
		/** Mengambil data peserta berdasarkan session */
		$email = $this->session->userdata('email');
        $peserta = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
		])->row_array();
		
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");
		
		$status = $result['status_code'];
		$trn_time = $result['transaction_time'];
		$order_id = $result['order_id'];
		$eID = $result['transaction_id'];
		$id_ps = $peserta['ID_PS'];
		$nm_ps = $peserta['NM_PS'];

		$data = [
			'STATUS' => $status,
			'TRN_TIME' => $trn_time
		];

		$data1 = [
			'STATUS_BELI' => $status
		];
		
		/** Insert ke tabel Notifikasi */
		$notif_success = [
			'GLOBAL_ID' => $eID,
			'ID_US' => $id_ps,
			'TITTLE_NOT' => 'Transaksi sukses dibayar',
			'MSG_NOT' => 'Order id ' . $order_id . ', atas nama ' . $nm_ps,
			'LINK' => 'admin/transaksi/detsuccess/' . $eID,
			'IS_READ' => 0,
			'ST_NOT' => 0,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($trn_time))
		];

		$notif_cancel = [
			'GLOBAL_ID' => $eID,
			'ID_US' => $id_ps,
			'TITTLE_NOT' => 'Transaksi dibatalkan',
			'MSG_NOT' => 'Order id ' . $order_id . ', atas nama ' . $nm_ps,
			'LINK' => 'admin/transaksi/detcancel/' . $eID,
			'IS_READ' => 0,
			'ST_NOT' => 0,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($trn_time))
		];

		/** Insert ke tabel Notifikasi 1 */
		$notif_success1 = [
			'GLOBAL_ID' => $eID,
			'ID_US' => $id_ps,
			'TITTLE_NOT' => 'Transaksi sukses dibayar',
			'MSG_NOT' => 'Order id ' . $order_id,
			'LINK' => 'admin/transaksi/detsuccess/' . $eID,
			'IS_READ' => 0,
			'ST_NOT' => 1,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($trn_time))
		];

		$notif_cancel1 = [
			'GLOBAL_ID' => $eID,
			'ID_US' => $id_ps,
			'TITTLE_NOT' => 'Transaksi dibatalkan',
			'MSG_NOT' => 'Order id ' . $order_id,
			'LINK' => 'admin/transaksi/detcancel/' . $eID,
			'IS_READ' => 0,
			'ST_NOT' => 1,
			'DATE_NOT' => date('Y-m-d H:i:s', strtotime($trn_time))
		];

		if ($status == 200) {
			$this->db->update('transaksi', $data, array('ID_TRN' => $order_id));
			$this->db->update('peserta', $data1, array('ID_PS' => $id_ps));

			/** admin */
			$this->db->insert('notif', $notif_success);

			/** peserta */
			$this->db->insert('notif', $notif_success1);

		} elseif ($status == 201) {
			$this->db->update('transaksi', $data, array('ID_TRN' => $order_id));
			$this->db->update('peserta', $data1, array('ID_PS' => $id_ps));
		} elseif($status == 202) {
			$this->db->update('transaksi', $data, array('ID_TRN' => $order_id));
			$this->db->update('peserta', $data1, array('ID_PS' => $id_ps));
			
			/** admin */
			$this->db->insert('notif', $notif_cancel);

			/** peserta */
			$this->db->insert('notif', $notif_cancel1);
		}
		// if($result){
		// $notif = $this->veritrans->status($result->order_id);
		// }

		// error_log(print_r($result,TRUE));

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/

	}
}
