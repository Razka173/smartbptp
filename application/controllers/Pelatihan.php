<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Pelatihan_model');
        $this->load->helper('captcha');
    }

	// Daftar Pkl
	public function daftar(){
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

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');

		if($valid->run()){
			// BEGIN CEK KUOTA
			setlocale (LC_TIME, 'id_ID');
			$tanggal_kunjungan = $this->input->post('tanggal_kunjungan');
			if($this->cek_kuota($tanggal_kunjungan) === FALSE){
				$tanggal = strtotime("$tanggal_kunjungan");
				$hari = strftime('%e %B %Y', $tanggal);
				$this->session->set_flashdata('warning', 'Kuota pelatihan pada ' .$hari. ' sudah penuh');
				redirect(base_url('pelatihan/daftar'),'refresh');
			}


			$nama = $this->input->post('nama');
			$nama_file = strtolower(str_replace(' ', '', $nama));
			$config['file_name']		= $nama_file;
			$config['upload_path'] 		= './assets/upload/pelatihan';
			$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			$config['max_size']  		= '10240';//Dalam KB
			$this->load->library('upload', $config);
			// END VALIDASI
			
			if (!$this->upload->do_upload('dokumen')){
				$data = array(	'title' 	=> 'Pendaftaran Pelatihan Teknologi',
								'error'		=> $this->upload->display_errors(),
								'isi'		=> 'pelatihan/form',
							);
				$this->load->view('pelatihan/form', $data, FALSE);

			// MASUK DATABASE
			}else{
				$upload_data = array('upload_data' => $this->upload->data());

				$i = $this->input;
				$data = array(	'nama'				=> $i->post('nama'),
								'instansi'			=> $i->post('instansi'),
								'nomor_induk'		=> $i->post('nomor_induk'),
								'alamat'			=> $i->post('alamat'),
								'nomor_telepon'		=> $i->post('nomor_telepon'),
								'email'				=> $i->post('email'),
								'tanggal_kunjungan'	=> $i->post('tanggal_kunjungan'),
								'tujuan_kunjungan'	=> $i->post('tujuan_kunjungan'),
								'dokumen'			=> $upload_data['upload_data']['file_name'],
							);
				$this->Pelatihan_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Anda telah terdaftar');
				redirect(base_url('pelatihan/terimakasih'),'refresh');
				// END MASUK DATABASE	
			}
		}else{
			$captcha = $this->set_captcha();
			$this->session->set_userdata('captchaword', $captcha['word']);
        
			$data = array(	'title' 	=> 'Pendaftaran Pelatihan Teknologi',
							'isi'		=> 'pelatihan/form',
							'captcha'	=> $captcha
						);
			$this->load->view('pelatihan/form', $data, FALSE);
		}
	}

	public function terimakasih(){
		$data = array(	'title' 	=> 'Terima Kasih!',
						'url'		=> base_url('smartbptp/pelatihan'),
					);
		$this->load->view('pelatihan/terima_kasih', $data, FALSE);
	}

	function set_captcha(){
		// Captcha configuration
        $config = array(
            'img_path'      => './captcha/',
            'img_url'       => base_url().'captcha/',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 16,
            'pool'          => '0123456789',
            'expiration'	=> '7200',

            // White background and border, black text and red grid
        	'colors'        => array( 	'background' => array(255, 255, 255),
                						'border' => array(0, 0, 0),
               							'text' => array(0, 0, 0),
                						'grid' => array(200, 200, 200)
        	)
        );

        $captcha = create_captcha($config);

        return $captcha;
	}

	function cek_kuota($tanggal){
		$pelatihan = $this->Pelatihan_model->cekKuota($tanggal);
		$total_pelatihan = 0;
		foreach ($pelatihan as $pelatihan) {
			$total_pelatihan = $total_pelatihan + 1;
		}
		if($total_pelatihan < 1){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	function check_captcha(){
		if ($this->input->post('captcha') === $this->session->userdata('captchaword')){
			return true;
		}else{
			$this->form_validation->set_message('check_captcha', 'Captcha salah');
			return false;
		}
	}
}

/* End of file Pelatihan.php */
/* Location: ./application/controllers/Pelatihan.php */