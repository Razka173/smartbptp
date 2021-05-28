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

}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/admin/Bukutamu.php */