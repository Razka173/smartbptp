<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all bukutamu
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('bukutamu');
		$this->db->order_by('nama', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_bukutamu)
	{
		$this->db->select('*');
		$this->db->from('bukutamu');
		$this->db->where('id_bukutamu', $id_bukutamu);
		$this->db->order_by('id_bukutamu', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('bukutamu', $data);
		return $this->db->affected_rows();
    }

	// Edit
	public function edit($data)
	{
		$this->db->where('id_bukutamu', $data['id_bukutamu']);
		$this->db->update('bukutamu',$data);
		return $this->db->affected_rows();
    }

	// Delete
	public function delete($data)
	{
		$this->db->where('id_bukutamu', $data['id_bukutamu']);
		$this->db->delete('bukutamu',$data);
		return $this->db->affected_rows();
   	}
}

/* End of file Bukutamu_model.php */
/* Location: ./application/models/Bukutamu_model.php */