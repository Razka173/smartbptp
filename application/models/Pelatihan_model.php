<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all pelatihan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->order_by('id_pelatihan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all pelatihan
	public function listingAsc()
	{
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->order_by('id_pelatihan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail pelatihan
	public function detail($id_pelatihan)
	{
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->where('id_pelatihan', $id_pelatihan);
		$this->db->order_by('id_pelatihan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua pelatihan pada bulan tertentu
	public function countthismonth()
	{
		$month = date("m");
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pelatihan');
		$this->db->where('month(date_created)', $month);
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua pelatihan tahun ini
	public function countthisyear()
	{
		$year = date("Y");
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pelatihan');
		$this->db->where('year(date_created)', $year);
		$query = $this->db->get();
		return $query->row();
	}

	// Cek Kuota Pelatihan pada hari tertentu (perhari dibatasi hanya 1)
	public function cekKuota($date)
	{
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->where('tanggal_kunjungan', $date);
		$this->db->order_by('id_pelatihan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('pelatihan', $data);
		return $this->db->affected_rows();
    }

	// Edit
	public function edit($data)
	{
		$this->db->where('id_pelatihan', $data['id_pelatihan']);
		$this->db->update('pelatihan',$data);
		return $this->db->affected_rows();
    }

	// Delete
	public function delete($data)
	{
		$this->db->where('id_pelatihan', $data['id_pelatihan']);
		$this->db->delete('pelatihan',$data);
		return $this->db->affected_rows();
   	}
}

/* End of file pelatihan_model.php */
/* Location: ./application/models/pelatihan_model.php */