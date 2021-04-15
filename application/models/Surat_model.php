<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all surat
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->order_by('id_surat', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail surat
	public function detail($id_surat)
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('id_surat', $id_surat);
		$this->db->order_by('id_surat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('surat', $data);
		return $this->db->affected_rows();
    }

	// Edit
	public function edit($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->update('surat',$data);
		return $this->db->affected_rows();
    }

	// Delete
	public function delete($data)
	{
		$this->db->where('id_surat', $data['id_surat']);
		$this->db->delete('surat',$data);
		return $this->db->affected_rows();
	}
}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */