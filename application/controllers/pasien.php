<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller {

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
		$home = 'page/v_pasien';
		$data['tampil'] = $this->mymodel->getAll('pasien');
		$data['menupasien'] = 'active';
		$this->template->load('dashboard',$home, $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
		
	}

	public function tambah_pasien()
	{
		if ($this->session->userdata('group_user')=='1') {
			$nama_pasien = trim(strip_tags(addslashes(ucwords($this->input->post('nama_pasien')))));
			$tgl_lahir = trim(strip_tags(addslashes(ucwords($this->input->post('tgl_lahir')))));
			$jenis_kelamin = trim(strip_tags(addslashes(ucwords($this->input->post('jenis_kelamin')))));
			$alamat = trim(strip_tags(addslashes(ucwords($this->input->post('alamat')))));
			$data = array(
						'id_pasien' 	=> null,
						'nama_pasien' 	=> $nama_pasien,
						'tgl_lahir' 	=> $tgl_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat_pasien'	=> $alamat
					);
			$this->mymodel->simpandata('pasien',$data);
			redirect('pasien');

		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	public function edit_pasien()
	{
		if ($this->session->userdata('group_user')=='1') {
			$id 			= $this->input->post('id_pasien');
			$nama_pasien 	= trim(strip_tags(addslashes(ucwords($this->input->post('nama_pasien')))));
			$tgl_lahir 		= trim(strip_tags(addslashes(ucwords($this->input->post('tgl_lahir')))));
			$jenis_kelamin 	= trim(strip_tags(addslashes(ucwords($this->input->post('jenis_kelamin')))));
			$alamat_pasien 	= trim(strip_tags(addslashes(ucwords($this->input->post('alamat')))));

			$data = array(
						'nama_pasien' 	=> $nama_pasien,
						'tgl_lahir' 	=> $tgl_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'alamat_pasien' => $alamat_pasien
					);
			$where = array('id_pasien' => $id);
			$this->mymodel->updatedata('pasien',$data,$where);
			redirect('pasien');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	public function delete_pasien()
	{
		if ($this->session->userdata('group_user')=='1') {
			$id = $this->input->post('id_pasien');
			$where = array('id_pasien' => $id);
			$this->mymodel->deletedata('pasien',$where);
			redirect('pasien');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}


}

/* End of file pasien.php */
/* Location: ./application/controllers/pasien.php */