<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* 
*/
class Barang extends MX_controller
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
		$data['produk'] = $this->db->query('SELECT * FROM produk_barang JOIN produk_kategori ON pk_id = pb_pk_id');
		$this->load->view('barang_view',$data);
	}

	function pageAdd()
	{
		$data['kategori'] = $this->db->query('SELECT * FROM produk_kategori');
		$this->load->view('barangAdd_view',$data);
	}

	function pageEdit($id)
	{
		$data['edit'] = $this->db->query('SELECT * FROM produk_barang JOIN produk_kategori ON pk_id = pb_pk_id WHERE pb_id = '.$id)->row();
		$data['kategori'] = $this->db->query('SELECT * FROM produk_kategori');

		$this->load->view('barangEdit_view',$data);	
	}

	function insert()
	{
		$this->db->trans_begin();

		$this->db->set('pb_nama',$_POST['nama']);
		$this->db->set('pb_keterangan',$_POST['keterangan']);
		$this->db->set('pb_pk_id',$_POST['kategori']);
		$this->db->set('pb_harga',$_POST['harga']);
		$this->db->set('pb_diskon',$_POST['diskon']);
		$this->db->set('pb_point',$_POST['point']);
		$this->db->set('pb_stock',$_POST['stock']);
		$this->db->set('pb_created',date('Y-m-d H:i:j'));
		$this->db->insert('produk_barang');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem Saat Penyimpanan, Harap Ulangi Kembali');
			redirect('produk/barang');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Tambah');
			redirect('produk/barang');
		}
	}

	function edit($id)
	{
		$this->db->trans_begin();

		$this->db->set('pb_nama',$_POST['nama']);
		$this->db->set('pb_keterangan',$_POST['keterangan']);
		$this->db->set('pb_pk_id',$_POST['kategori']);
		$this->db->set('pb_harga',$_POST['harga']);
		$this->db->set('pb_diskon',$_POST['diskon']);
		$this->db->set('pb_point',$_POST['point']);
		$this->db->set('pb_stock',$_POST['stock']);
		$this->db->set('pb_updated',date('Y-m-d H:i:j'));
		$this->db->where('pb_id',$id);
		$this->db->update('produk_barang');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem, Harap Ulangi Kembali');
			redirect('produk/barang');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
			redirect('produk/barang');
		}
	}
	
	function delete($id)
	{
		$this->db->trans_begin();

		$this->db->where('pb_id',$id);
		$this->db->delete('produk_barang');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem, Harap Ulangi Kembali');
			redirect('produk/barang');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
			redirect('produk/barang');
		}
	}
}

?>