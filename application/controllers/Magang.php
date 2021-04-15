<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->model('Surat_model');
    }

	public function index()
	{
		$data = array(	'title' 	=> 'Informasi Magang',
						'isi'		=> 'magang/list'
					);
		$this->load->view('magang/list', $data, FALSE);
	}

	// Daftar Magang
	public function daftar()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('instansi','Instansi','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nomor_induk','Nomor Induk','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nomor_telepon','Nomor Telepon','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()) {
			$nama = $this->input->post('nama');
			$nama_file = strtolower(str_replace(' ', '', $nama));
			$config['file_name']		= $nama_file;
			$config['upload_path'] 		= './assets/upload/magang/dokumen';
			$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			$config['max_size']  		= '10240';//Dalam KB
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('dokumen')){
				// End validasi
				$data = array(	'title' 	=> 'Daftar Magang',
								'error'		=> $this->upload->display_errors(),
								'isi'		=> 'magang/daftar',
							);
				$this->load->view('magang/daftar', $data, FALSE);

			// Masuk database
			}else{
				$upload_data = array('upload_data' => $this->upload->data());

				$i = $this->input;
				if(empty($i->post('materi'))){
					$materi = $i->post('other');
				}else{
					$materi = $i->post('materi');
				}
				$data = array(	'nama'				=> $i->post('nama'),
								'instansi'			=> $i->post('instansi'),
								'nomor_induk'		=> $i->post('nomor_induk'),
								'alamat'			=> $i->post('alamat'),
								'nomor_telepon'		=> $i->post('nomor_telepon'),
								'email'				=> $i->post('email'),
								'materi'			=> $materi,
								'status'			=> "menunggu konfirmasi",
							);
				$this->Peserta_model->tambah($data);
				$id = $this->db->insert_id();
				$data_dokumen = array(	'nama_surat'	=> $upload_data['upload_data']['file_name'],
										'id_peserta'	=> $id,
							);
				$this->Surat_model->tambah($data_dokumen);
				$this->session->set_flashdata('sukses', 'Anda telah terdaftar');
				redirect(base_url('magang/informasi'),'refresh');
			}
		}
		// End masuk database
		$data = array(	'title' 	=> 'Daftar Magang',
						'isi'		=> 'magang/daftar',
					);
		$this->load->view('magang/daftar', $data, FALSE);
	}

}

/* End of file Magang.php */
/* Location: ./application/controllers/Magang.php */