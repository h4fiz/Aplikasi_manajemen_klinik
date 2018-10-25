<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if($this->session->userdata('logged_in') !== TRUE){
		      redirect('login');
		    }
	}
	public function index()
	{	
		$home = 'page/content-index';
		$data['nama_user'] = $this->session->userdata('nama_user');
		$this->template->load('dashboard',$home,$data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */