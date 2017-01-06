<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* 
*/
class Dashboard extends MX_controller
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
		$this->load->view('dashboard_view');
	}

	
	
}

?>