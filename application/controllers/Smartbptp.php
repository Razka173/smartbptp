<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartbptp extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Magang_model');
        $this->load->model('Surat_model');
    }

	public function index()
	{
		$data = array(	'title' 	=> 'Halaman Utama Smart BPTP',
						'isi'		=> 'smartbptp/dasbor/list'
					);
		$this->load->view('smartbptp/layout/wrapper', $data, FALSE);
	}

	public function pelatihan()
	{
		$data = array(	'title'		=> 'Informasi Pelatihan Teknologi',
						'isi'		=> 'pelatihan/list'
					);
		$this->load->view('smartbptp/layout/wrapper', $data, FALSE);
	}

	public function magang()
	{
		$pkl = $this->Magang_model->listingthisyear();
		$test = $this->Magang_model->cekKuotaLainnya(04, 2021, 'Lainnya');
		$data = array(	'title'		=> 'Informasi Magang/PKL',
						'isi'		=> 'magang/list',
						'pkl'		=> $pkl,
						'test'		=> $test
					);
		$this->load->view('smartbptp/layout/wrapper', $data, FALSE);
	}

}

/* End of file Smartbptp.php */
/* Location: ./application/controllers/Smartbptp.php */