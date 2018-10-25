<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
		      redirect('login');
		    }
		$this->load->model('mymodel');
	}

	public function index()
	{	
		if ($this->session->userdata('group_user')=='1') {
		$home = 'page/v_users';
		$data['tampil'] = $this->mymodel->getAll('users');
		$data['menuusers'] = 'active';
		$this->template->load('dashboard',$home, $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
		
	}
	public function tambah_user()
	{
		if ($this->session->userdata('group_user')=='1') {
			$nama_user = trim(strip_tags(addslashes(ucwords($this->input->post('nama_user')))));
			$username = trim(strip_tags(addslashes($this->input->post('username'))));
			$password = trim(strip_tags(addslashes($this->input->post('password'))));
			$group_user = trim(strip_tags(addslashes(ucwords($this->input->post('group_user')))));
			$data = array(
						'iduser' 		=> null,
						'nama_user' 	=> $nama_user,
						'username' 		=> $username,
						'password' 		=> md5($password),
						'group_user'	=> $group_user
					);
			$this->mymodel->simpandata('users',$data);
			redirect('users');

		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function edit_user()
	{
		if ($this->session->userdata('group_user')=='1') {
			$id 			= $this->input->post('iduser');
			$nama_user = trim(strip_tags(addslashes(ucwords($this->input->post('nama_user')))));
			$username = trim(strip_tags(addslashes($this->input->post('username'))));
			$password = trim(strip_tags(addslashes($this->input->post('password'))));
			$group_user = trim(strip_tags(addslashes(ucwords($this->input->post('group_user')))));
			if (empty($password)) {
				$data = array(
						'nama_user' 	=> $nama_user,
						'username' 		=> $username,
						'group_user'	=> $group_user
					);
				$where = array('iduser' => $id);
				$this->mymodel->updatedata('users',$data,$where);
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil diupdate</label>');
				redirect('users');
			}else{
				$data = array(
						'nama_user' 	=> $nama_user,
						'username' 		=> $username,
						'password' 		=> md5($password),
						'group_user'	=> $group_user
					);
				$where = array('iduser' => $id);
				$this->mymodel->updatedata('users',$data,$where);
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pengguna Berhasil diupdate</label>');
				redirect('users');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	public function delete_user()
	{
		if ($this->session->userdata('group_user')=='1') {
			$id = $this->input->post('iduser');
			$where = array('iduser' => $id);
			$this->mymodel->deletedata('users',$where);
			redirect('users');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */