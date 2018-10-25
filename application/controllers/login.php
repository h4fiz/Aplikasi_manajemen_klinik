<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mymodel');
	}

	public function index()
	{
		$this->load->view('Vlogin');
	}
	public function cek_login()
	{
		$username = strip_tags(stripslashes($this->input->post('username')));
		$password = strip_tags(stripslashes($this->input->post('password')));
		$where = array(
					'username' => $username,
					'password' => md5($password)
				);
		$cek = $this->mymodel->proses_login('users',$where);
		if ($cek->num_rows() > 0) {
			$ambil_data = $cek->row_array();
			$nama_user 	= $ambil_data['nama_user'];
			$username 	= $ambil_data['username'];
			$group_user = $ambil_data['group_user'];

			$sesdata = array(
						'username' => $username,
						'nama_user'=> $nama_user,
						'group_user' => $group_user,
						'logged_in' => TRUE
					   );
			
			$this->session->set_userdata( $sesdata );
			if ($group_user === '1') {
				redirect('Cdashboard');
			}elseif ($group_user === '2') {
				redirect('Cdashboard');
			}
		} else {
			echo $this->session->set_flashdata('msg', 'Username atau Password Salah!!!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */