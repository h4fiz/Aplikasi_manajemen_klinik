<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mymodel extends CI_Model {

	//query login

	public function proses_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	//tambah data user
	public function simpandata($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	//ambill semua data
	public function getAll($table)
	{
		return $this->db->get($table);
	}
	//update data
	public function updatedata($table,$data,$where)
	{
		$this->db->where($where);
		$hasil = $this->db->update($table, $data);
		return $hasil;
	}
	//delete data
	public function deletedata($table,$where)
	{
		$this->db->where($where);
		$hasil = $this->db->delete($table);
		return $hasil;
	}
	//ambil data join
	public function getJoin()
	{
		$this->db->select('*');
		$this->db->from('mck');
		$this->db->join('pasien', 'pasien.id_pasien = mck.id_pasien');
		$query = $this->db->get();
		return $query;
	}
}

/* End of file mymodel.php */
/* Location: ./application/models/mymodel.php */