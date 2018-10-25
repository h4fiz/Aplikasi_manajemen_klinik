<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical extends CI_Controller {

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
		if ($this->session->userdata('group_user')=='2') {
		$home = 'page/v_medical';
		$data['tampil'] = $this->mymodel->getJoin();
		$data['pasein'] = $this->mymodel->getAll('pasien');
		$data['menumedical'] = 'active';
		$this->template->load('dashboard',$home, $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	public function tambah_medical()
	{
		if ($this->session->userdata('group_user')=='2') {
			$id_pasien = trim(strip_tags(addslashes(ucwords($this->input->post('id_pasien')))));
			$sistolik = trim(strip_tags(addslashes(ucwords($this->input->post('sistolik')))));
			$diastolik = trim(strip_tags(addslashes(ucwords($this->input->post('diastolik')))));
			$data = array(
						'id_mck' 	=> null,
						'id_pasien' 	=> $id_pasien,
						'sistolik' 	=> $sistolik,
						'diastolik' => $diastolik,
						'tgl_periksa'	=> null
					);
			$this->mymodel->simpandata('mck',$data);
			redirect('medical');

		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	public function edit_medical()
	{
		if ($this->session->userdata('group_user')=='2') {
			$id = $this->input->post('id_mck');
			$id_pasien = trim(strip_tags(addslashes(ucwords($this->input->post('id_pasien')))));
			$sistolik = trim(strip_tags(addslashes(ucwords($this->input->post('sistolik')))));
			$diastolik = trim(strip_tags(addslashes(ucwords($this->input->post('diastolik')))));
			$data = array(
						'id_pasien' => $id_pasien,
						'sistolik' 	=> $sistolik,
						'diastolik' => $diastolik
					);
			$where = array('id_mck' => $id);
			$this->mymodel->updatedata('mck',$data,$where);
			redirect('medical');

		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	public function delete_medical()
	{
		if ($this->session->userdata('group_user')=='2') {
			$id = $this->input->post('id_mck');
			$where = array('id_mck' => $id);
			$this->mymodel->deletedata('mck',$where);
			redirect('medical');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

}

/* End of file medical.php */
/* Location: ./application/controllers/medical.php */