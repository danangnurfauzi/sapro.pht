<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* 
*/
class Login extends MX_controller
{
	
	var $api = "";

	function __construct()
	{
		parent::__construct();
		
		$this->api = 'http://localhost/ikat.api/index.php/karyawan/';

	}

	function index()
	{
		$this->load->view('auth/login_view');
	}

	function validate()
	{
		$npk 		= $_POST['npk']; 
		$password 	= $_POST['password'];

		$data = $this->rest->get($this->api.'dataKaryawanNpk',array('npk'=>$npk),'application/json');

		if ( $data->status === FALSE )
		{
			$this->session->set_flashdata('error', 'NPK tidak ditemukan dalam database IKaT PHT');
			redirect('auth/login');
		}
		else
		{
			$isRegister = $this->db->query('SELECT * FROM user_register WHERE ur_karyawan_id = '.$data->id);

			if ($isRegister->num_rows() > 0)
			{
				$isValidate = $this->rest->get($this->api.'loginKaryawan',array( 'username'=>$npk , 'password' => $password ),'application/json');

				if ($isValidate->status == 'true')
				{

					$setData = array(
								'karyawanId' => $data->id,
								'userId' => $isRegister->row()->ur_id,
								'nama' => $data->nama,
								'logged_in'	=> TRUE
								);

					$this->session->set_userdata($setData);
					redirect('home/dashboard');
				}
				else
				{
					$this->session->set_flashdata('error', 'Username dan Password Salah');
					redirect('auth/login');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Anda Belum Daftar Sebagai Marketing Produk Perhutani');
				redirect('auth/login');
			}
		}

	}

	function logout()
	{
		session_destroy();
		redirect('auth/login');
	}
	
}

?>