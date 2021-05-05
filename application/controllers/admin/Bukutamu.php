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
		$this->load->library('ciqrcode');
	}

	// Halaman utama dasbor
	public function index()
	{
		$tamu = $this->Bukutamu_model->listing();
		$qr_code = $this->generate_cr_qode();
		$data = array(	'title'			=> 'Halaman Dashboard',
						'tamu'			=> $tamu,
						'qr_code'		=> $qr_code,
						'isi'			=> 'admin/bukutamu/list',
						
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	function generate_cr_qode()
	{
		$config['cacheable'] = true;
		$config['cachedir'] = './assets/qrcode/';
		$config['errorlog'] = './assets/qrcode/';
		$config['imagedir'] = './assets/qrcode/images/';
		$config['quality'] = true;
		$config['size'] = 1024;
		$config['black'] = array(224, 255, 255);
		$config['white'] = array(70, 130, 180);

		$this->ciqrcode->initialize($config);

		$params['data'] = "https://jakarta.litbang.pertanian.go.id";
		$params['level'] = 'H';
		$params['size'] = 20;
		$params['savename'] = FCPATH.$config['imagedir'].'tes.png';
        $qr_code = $this->ciqrcode->generate($params);
        return $qr_code;
	}

}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/admin/Bukutamu.php */