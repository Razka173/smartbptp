<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkl extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Peserta_model');
        $this->load->helper('captcha');
    }

	// Daftar Pkl
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

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');

		if($valid->run()){
			// BEGIN CEK KUOTA
			setlocale (LC_TIME, 'id_ID');
			$month = $this->input->post('month');
			$year = $this->input->post('year');
			$jumlah_anggota = $this->input->post('jumlah_anggota');
			if(empty($this->input->post('materi'))){
					$materi = "Lainnya";
					$data = array(	'month'				=> $month,
									'year'				=> $year,
									'materi'			=> $materi,
									'jumlah_anggota' 	=> $jumlah_anggota
							);
					if($this->cek_kuota($data) === FALSE){
						$month_name = strftime('%B', mktime(0, 0, 0, $month, 10));
						$this->session->set_flashdata('warning', 'Kuota untuk materi lainnya pada bulan ' .$month_name. ' sudah penuh');
						redirect(base_url('pkl/daftar'),'refresh');
					}
			}else{
					$materi = $this->input->post('materi');
					$data = array(	'month'				=> $month,
									'year'				=> $year,
									'materi'			=> $materi,
									'jumlah_anggota' 	=> $jumlah_anggota
							);
					if($this->cek_kuota($data) === FALSE){
						$month_name = strftime('%B', mktime(0, 0, 0, $month, 10));
						$this->session->set_flashdata('warning', 'Kuota ' .$materi. ' pada bulan ' .$month_name. ' sudah penuh atau melebihi kuota maksimal.');
						redirect(base_url('pkl/daftar'),'refresh');
					}
				}
			// END CEK KOUTA

			$nama_file = strtolower(str_replace(' ', '', $this->input->post('nama')));
			$config['file_name']		= date("YmdHis").$nama_file;
			$config['upload_path'] 		= './assets/upload/pkl';
			$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
			$config['max_size']  		= '10240';//Dalam KB
			$this->load->library('upload', $config);
			// END VALIDASI
			
			if (!$this->upload->do_upload('dokumen')){
				$data = array(	'title' 	=> 'Pendaftaran PKL/Magang',
								'error'		=> $this->upload->display_errors(),
								'isi'		=> 'pkl/form',
							);
				$this->load->view('pkl/form', $data, FALSE);

			// MASUK DATABASE
			}else{
				$upload_data = array('upload_data' => $this->upload->data());

				$i = $this->input;
				if(empty($i->post('materi'))){
					$materi = "Lainnya: ".$i->post('other');
				}else{
					$materi = $i->post('materi');
				}
				$data = array(	'nama'				=> $i->post('nama'),
								'instansi'			=> $i->post('instansi'),
								'nomor_induk'		=> $i->post('nomor_induk'),
								'alamat'			=> $i->post('alamat'),
								'nomor_telepon'		=> $i->post('nomor_telepon'),
								'email'				=> $i->post('email'),
								'tanggal_masuk'		=> $i->post('year').$i->post('month').'01',
								'materi'			=> $materi,
								'jumlah_anggota'	=> $i->post('jumlah_anggota'),
								'dokumen'			=> $upload_data['upload_data']['file_name'],
								'status'			=> "Diterima",
							);
				$this->Peserta_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Anda telah terdaftar');
				redirect(base_url('smartbptp/pkl'),'refresh');
				// END MASUK DATABASE	
			}
		}else{
			$captcha = $this->set_captcha();
			$this->session->set_userdata('captchaword', $captcha['word']);
 
			$data = array(	'title' 	=> 'Pendaftaran PKL/Magang',
							'isi'		=> 'pkl/form',
							'captcha'	=> $captcha
					);
			$this->load->view('pkl/form', $data, FALSE);
		}
	}

	function cek_kuota($data)
	{
		$kuota_sma = 4;
		$kuota_mahasiswa = 6;
		$month = $data['month'];
		$year = $data['year'];
		$materi = $data['materi'];
		$jumlah_anggota = $data['jumlah_anggota'];
		$terdaftar = 0;
		if($materi == "Lainnya"){
			$total_terdaftar = $this->Peserta_model->cekKuotaLainnya($month, $year, $materi);
		}else{
			$total_terdaftar = $this->Peserta_model->cekKuota($month, $year, $materi);
		}
		foreach ($total_terdaftar as $total_terdaftar) {
			$terdaftar = $terdaftar + $total_terdaftar->jumlah_anggota;
		}
		$total = $terdaftar + $jumlah_anggota;
	    if ($materi == "SMA/SMK" && $total <= $kuota_sma){
	    	return TRUE;
	    }
	    if ($materi != "SMA/SMK" && $total <= $kuota_mahasiswa){
	    	return TRUE;
	    }
	    return FALSE;
	}

	function set_captcha(){
		// Captcha configuration
        $config = array(
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url().'assets/captcha/',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 16,
            'pool'          => '0123456789',

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

	function check_captcha(){
		if ($this->input->post('captcha') === $this->session->userdata('captchaword')){
			return true;
		}else{
			$this->form_validation->set_message('check_captcha', 'Captcha salah');
			return false;
		}
	}
}

/* End of file Pkl.php */
/* Location: ./application/controllers/Pkl.php */