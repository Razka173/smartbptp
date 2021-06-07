<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		// Proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('Bukutamu_model');
	}

	public function index()
	{
		$tamu = $this->Bukutamu_model->listing();
		$tahun_ini = $this->Bukutamu_model->listingthisyear();
		$data = array(	'title'			=> 'Halaman Buku Tamu',
						'tamu'			=> $tamu,
						'tahun_ini'		=> $tahun_ini,
						'isi'			=> 'admin/bukutamu/list',
						
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function pdf()
	{
		$namafile = "Bukutamu_";
		$tamu = $this->Bukutamu_model->listingAsc();
		$data = array(	'title'			=> 'Daftar Tamu BPTP Jakarta',
						'tamu'			=> $tamu,
					);
		$html 	= $this->load->view('admin/bukutamu/cetak', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'L']);
		$mpdf->WriteHTML($html);
		$mpdf->Output($namafile.date("Y/m/d").'.pdf', 'I');
	}

}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/admin/Bukutamu.php */