<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukutamu extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Bukutamu_model');
        $this->load->helper('captcha');
    }

	public function index()
	{
		// VALIDASI INPUT USER
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('nik','NIK','min_length[16]|numeric',
			array(	'min_length'	=> '%s minimal 16 angka',
					'numeric'		=> '%s hanya boleh angka',
				));

		$valid->set_rules('nomor_telepon','Nomor Telepon','required|numeric',
			array(	'required'		=> '%s harus diisi',
					'numeric'		=> '%s harus angka',
				));

		$valid->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');
		// END VALIDASI

		if($valid->run()){
			// BEGIN MASUK DATABASE
			$i = $this->input;
			$data = array(	'nama'				=> $this->security->xss_clean($i->post('nama')),
							'instansi'			=> $this->security->xss_clean($i->post('instansi')),
							'tujuan_kunjungan'	=> $this->security->xss_clean($i->post('tujuan_kunjungan')),
							'nik'				=> $this->security->xss_clean($i->post('nik')),
							'nomor_telepon'		=> $this->security->xss_clean($i->post('nomor_telepon')),
							);
			$this->Bukutamu_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terima kasih, Anda telah terdaftar sebagai pengunjung!');
			redirect(base_url('bukutamu'),'refresh');
			// END MASUK DATABASE	

		}else{
			$captcha = $this->set_captcha();
			$this->session->set_userdata('captchaword', $captcha['word']);

			$data = array(	'title' 	=> 'Formulir Data Diri Pengunjung BPTP Jakarta',
							'isi'		=> 'bukutamu/list',
							'captcha'	=> $captcha,
						);
			$this->load->view('bukutamu/list', $data, FALSE);
		}
		
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

	function check_captcha(){
		if ($this->input->post('captcha') === $this->session->userdata('captchaword')){
			return true;
		}else{
			$this->form_validation->set_message('check_captcha', 'Captcha salah');
			return false;
		}
	}


}

/* End of file Bukutamu.php */
/* Location: ./application/controllers/Bukutamu.php */