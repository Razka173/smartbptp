<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		// Proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('Bukutamu_model');
	}

	// Halaman utama dasbor
	public function index()
	{
		$tamu = $this->Bukutamu_model->listing();
		$data = array(	'title'			=> 'Halaman Dashboard',
						'tamu'			=> $tamu,
						'isi'			=> 'admin/dasbor/list',
						
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */