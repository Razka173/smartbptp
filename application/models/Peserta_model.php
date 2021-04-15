<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all peserta
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->order_by('id_peserta', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail peserta
	public function detail($id_peserta)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('id_peserta', $id_peserta);
		$this->db->order_by('id_peserta', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('peserta', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_peserta', $data['id_peserta']);
		$this->db->update('peserta',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_peserta', $data['id_peserta']);
		$this->db->delete('peserta',$data);
	}
}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */