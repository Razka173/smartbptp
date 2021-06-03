<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang_model extends CI_Model {

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

	// Listing all peserta
	public function listingAsc()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->order_by('id_peserta', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing semua peserta PKL/Magang tahun ini
	public function listingthisyear()
	{
		$year = date("Y");
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('year(tanggal_masuk)', $year);
		$this->db->order_by('id_peserta', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing semua peserta PKL/Magang pada bulan tertentu
	public function listingbymonth($month)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('month(tanggal_masuk)', $month);
		$this->db->order_by('id_peserta', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Hitung semua pkl pada bulan tertentu
	public function countthismonth()
	{
		$month = date("m");
		$this->db->select('SUM(jumlah_anggota) AS total');
		$this->db->from('peserta');
		$this->db->where('month(tanggal_masuk)', $month);
		$query = $this->db->get();
		return $query->row();
	}

	// Hitung semua pkl tahun ini
	public function countthisyear()
	{
		$year = date("Y");
		$this->db->select('SUM(jumlah_anggota) AS total');
		$this->db->from('peserta');
		$this->db->where('year(tanggal_masuk)', $year);
		$query = $this->db->get();
		return $query->row();
	}

	// Cek kuota PKL/Magang pada bulan&tahun tertentu dan materi tertentu (dibatasi permateri di bulan dan tahun tertentu)
	public function cekKuota($month, $year, $materi)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('month(tanggal_masuk)', $month);
		$this->db->where('year(tanggal_masuk)', $year);
		$this->db->where('materi', $materi);
		$this->db->order_by('id_peserta', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Cek kuota PKL/Magang pada bulan&tahun tertentu dan materi lainnya (dibatasi permateri di bulan dan tahun tertentu
	public function cekKuotaLainnya($month, $year, $materi)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('month(tanggal_masuk)', $month);
		$this->db->where('year(tanggal_masuk)', $year);
		$this->db->like('materi', 'Lainnya');
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
		return $this->db->affected_rows();
    }

	// Edit
	public function edit($data)
	{
		$this->db->where('id_peserta', $data['id_peserta']);
		$this->db->update('peserta',$data);
		return $this->db->affected_rows();
    }

	// Delete
	public function delete($data)
	{
		$this->db->where('id_peserta', $data['id_peserta']);
		$this->db->delete('peserta',$data);
		return $this->db->affected_rows();
   	}
}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */