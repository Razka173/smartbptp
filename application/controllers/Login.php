<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->sudah_login();
	}

	// Halaman login
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('username','Username','required',
			array(	'required'	=>	'%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
			array(	'required'	=>	'%s harus diisi'));

		$attempt = $this->session->userdata('attempt');
		if($attempt>=3){
			$this->form_validation->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');
		}

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// proses ke simple login
			$this->simple_login->login($username, $password);
		}
		// End validasi
		if($attempt>=3){
			$captcha = $this->set_captcha();
			$this->session->set_userdata('captchaword', $captcha['word']);
			
			$data = array(	'title'		=> 'Login Administrator',
							'captcha'	=> $captcha,
						);

			$this->load->view('login/list', $data, FALSE);
		}else{
			$data = array(	'title'		=> 'Login Administrator',);
			$this->load->view('login/list', $data, FALSE);
		}
		
	}

	// Fungsi logout
	public function logout()
	{
		// Ambil fungsi logout dari simple_login
		$this->simple_login->logout();
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

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */