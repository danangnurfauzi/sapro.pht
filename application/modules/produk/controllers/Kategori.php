<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* 
*/
class Kategori extends MX_controller
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
		$data['kategori'] = $this->db->query('SELECT * FROM produk_kategori');
		$this->load->view('kategori_view',$data);
	}

	function pageEdit($id)
	{
		$data['edit'] = $this->db->query('SELECT * FROM produk_kategori WHERE pk_id = '.$id)->row();
		$this->load->view('kategoriEdit_view',$data);	
	}

	function insert()
	{
		$this->db->trans_begin();

		$this->db->set('pk_nama',$_POST['nama']);
		$this->db->set('pk_keterangan',$_POST['keterangan']);
		$this->db->set('pk_created',date('Y-m-d H:i:j'));
		$this->db->insert('produk_kategori');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem Saat Penyimpanan, Harap Ulangi Kembali');
			redirect('produk/kategori');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Tambah');
			redirect('produk/kategori');
		}
	}

	function edit($id)
	{
		$this->db->trans_begin();

		$this->db->set('pk_nama',$_POST['nama']);
		$this->db->set('pk_keterangan',$_POST['keterangan']);
		$this->db->set('pk_updated',date('Y-m-d H:i:j'));
		$this->db->where('pk_id',$id);
		$this->db->update('produk_kategori');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem, Harap Ulangi Kembali');
			redirect('produk/kategori');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Edit');
			redirect('produk/kategori');
		}
	}
	
	function delete($id)
	{
		$this->db->trans_begin();

		$this->db->where('pk_id',$id);
		$this->db->delete('produk_kategori');

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('error', 'Maaf Terjadi Kesalahan Sistem, Harap Ulangi Kembali');
			redirect('produk/kategori');
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
			redirect('produk/kategori');
		}
	}
}

?>