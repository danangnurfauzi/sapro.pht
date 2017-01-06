<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* 
*/
class Unpaid extends MX_controller
{
	
	var $api = "";

	function __construct()
	{
		parent::__construct();
		
		$this->api = 'http://localhost/ikat.api/index.php/karyawan/';
		
		if ( ! isset($_SESSION['logged_in']) )
		{
			redirect('auth/login');
		}
	}

	function index()
	{
		$data['unpaid'] = $this->db->query('SELECT * FROM order_tiket JOIN user_register ON ur_id = ot_ur_id JOIN invoice ON i_ot_id = ot_id WHERE i_status = 0');

		$this->load->view('Unpaid_view',$data);
	}

	function konfirmasiPembayaran($id)
	{
		$data['id'] = $id;
		$this->load->view('konfirmasiPembayaran_view',$data);
	}

	function postKonfirmasiPembayaran($id)
	{
		echo "<pre>";
		print_r($_POST);exit;
		$jumlahArray = count($_POST['barangId']);

		$invoice = $this->randomNomorTiket();
		
		$this->db->trans_begin();

		$this->db->set('ot_invoice',$invoice);
		$this->db->set('ot_ur_id',$_SESSION['userId']);
		$this->db->set('ot_alamat',$_POST['alamat']);
		$this->db->set('ot_total_harga',$_POST['totalHarga']);
		$this->db->set('ot_total_point',$_POST['totalPoint']);
		$this->db->set('ot_created',date('Y-m-d H:i:j'));
		$this->db->insert('order_tiket');

		$ot_id = $this->db->insert_id();

		$set = array();

		for ($i=0; $i < $jumlahArray; $i++)
		{ 
			$set[] = array(
							'op_ot_id' => $ot_id,
							'op_pb_id' => $_POST['barangId'][$i],
							'op_harga' => $_POST['harga'][$i],
							'op_point' => $_POST['point'][$i],
							'op_jumlah_barang' => $_POST['order'][$i],
							'op_jumlah_harga' => $_POST['jumlah'][$i]
						);

			$stock = $this->db->query('SELECT pb_stock FROM produk_barang WHERE pb_id = '.$_POST['barangId'][$i])->row()->pb_stock;

			$this->db->set('pb_stock',$stock - $_POST['order'][$i]);
			$this->db->where('pb_id',$_POST['barangId'][$i]);
			$this->db->update('produk_barang');

		}

		$this->db->insert_batch('order_produk',$set);

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem Saat Penyimpanan, Harap Ulangi Kembali');
			redirect('order/produk');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Order Barang Berhasil Silakan Lakukan Pembayaran');
			redirect('order/produk/invoice/'.$invoice);
		}

	}

	function invoice($invoice)
	{
		$data['nomorInv'] = $invoice;

		$data['order'] = $this->db->query('SELECT * FROM order_produk JOIN order_tiket ON op_ot_id = ot_id JOIN produk_barang ON pb_id = op_pb_id WHERE ot_invoice = "'.$invoice.'"');

		$data['tiket'] = $this->db->query('SELECT * FROM order_tiket WHERE ot_invoice = "'.$invoice.'"')->row();

		$this->load->view('invoice_view',$data);
	}

	function randomNomorTiket()
	{

		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';  
		$string = '';  
		for($i = 0; $i < 8; $i++)
		{  
	  		$pos = rand(0, strlen($karakter)-1);  
			$string .= $karakter{$pos};  
		}

		$cekString = $this->db->query('SELECT ot_invoice FROM order_tiket WHERE ot_invoice = "'.$string.'"');

		if ($cekString->num_rows() > 0)
		{
		  	redirect('order/produk/randomNomorTiket');
		}
		else
		{
			return $string;  
		}  
	 
	}

	
}

?>