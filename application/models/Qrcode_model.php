<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all data
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('qrcode');
		$this->db->order_by('id_qrcode', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail specific data
	public function detail($id_qrcode)
	{
		$this->db->select('*');
		$this->db->from('qrcode');
		$this->db->where('id_qrcode', $id_qrcode);
		$this->db->order_by('id_qrcode', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah data
	public function tambah($data)
	{
		$this->db->insert('qrcode', $data);
	}

	// Edit ata
	public function edit($data)
	{
		$this->db->where('id_qrcode', $data['id_qrcode']);
		$this->db->update('qrcode',$data);
	}

	// Delete data
	public function delete($data)
	{
		$this->db->where('id_qrcode', $data['id_qrcode']);
		$this->db->delete('qrcode',$data);
	}

}

/* End of file Qrcode_model.php */
/* Location: ./application/models/Qrcode_model.php */