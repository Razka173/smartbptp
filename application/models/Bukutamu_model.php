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
		$this->db->order_by('date_created', 'desc');
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

	// Listing semua tamu tahun ini
	public function listingthisyear()
	{
		$year = date("Y");
		$this->db->select('*, COUNT(*) AS total');
		$this->db->from('bukutamu');
		$this->db->where('year(date_created)', $year);
		$this->db->order_by('id_bukutamu', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Hitung semua tamu pada bulan tertentu
	public function countthisday()
	{
		$day = date("d");
		$this->db->select('COUNT(*) AS total');
		$this->db->from('bukutamu');
		$this->db->where('day(date_created)', $day);
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua tamu pada bulan tertentu
	public function countthisweek()
	{
		$date_start = strtotime('last Sunday');
		$date_end = strtotime('next Sunday');
		$week_start = date('Y-m-d', $date_start);
		$week_end = date('Y-m-d', $date_end);
		$this->db->select('COUNT(*) AS total');
		$this->db->from('bukutamu');
		$this->db->where('date_created >=', $week_start);
		$this->db->where('date_created <=', $week_end);
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua tamu pada bulan tertentu
	public function countthismonth()
	{
		$month = date("m");
		$this->db->select('COUNT(*) AS total');
		$this->db->from('bukutamu');
		$this->db->where('month(date_created)', $month);
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua tamu tahun ini
	public function countthisyear()
	{
		$year = date("Y");
		$this->db->select('COUNT(*) AS total');
		$this->db->from('bukutamu');
		$this->db->where('year(date_created)', $year);
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