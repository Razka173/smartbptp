<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Bukutamu_model');
    }

	public function index()
	{
		// VALIDASI INPUT USER
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nik','NIK','required|min_length[16]|numeric',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 16 angka',
					'numeric'		=> '%s hanya boleh angka'
				));

		$valid->set_rules('nomor_telepon','Nomor Telepon','required|numeric',
			array(	'required'		=> '%s harus diisi',
					'numeric'		=> '%s harus angka'
				));
		// END VALIDASI

		if($valid->run()){
			// BEGIN MASUK DATABASE
			$i = $this->input;
			$data = array(	'nama'				=> $i->post('nama'),
							'nik'				=> $i->post('nik'),
							'nomor_telepon'		=> $i->post('nomor_telepon'),
							);
			$this->Bukutamu_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terima kasih, Anda telah terdaftar sebagai pengunjung!');
			redirect(base_url('bukutamu'),'refresh');
			// END MASUK DATABASE	

		}else{
			$data = array(	'title' 	=> 'Formulir Data Diri Pengunjung BPTP Jakarta',
							'isi'		=> 'bukutamu/list'
						);
			$this->load->view('bukutamu/list', $data, FALSE);
		}
		
	}


}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/Bukutamu.php */