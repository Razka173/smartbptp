<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Qrcode_model');
		$this->load->helper('download');
		// Proteksi halaman
        $this->simple_login->cek_login();
	}

	public function index()
	{
        $routes = $this->router->routes;
		$qr_code = $this->Qrcode_model->listing();
		$data = array(
            'title'     => 'Halaman QR Code',
            'qr_code'   => $qr_code,
            'isi'       => 'admin/qr/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah data
    public function tambah()
    {
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('data','Data','required',
            array(  'required'      => '%s QR harus diisi'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Tambah Data QR',
                            'isi'       => 'admin/qr/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            // Masuk database
            $i = $this->input;
            $qr_code = $this->generate_cr_code($i->post('data'));
            $data = array(  'data' 		=> $i->post('data'),
                        	'gambar'	=> $qr_code,
                        );
            $this->Qrcode_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/qr'),'refresh');
        }
        // End masuk database
    }

    // Delete data
    public function delete($id_qrcode)
    {
    	$qr_code = $this->Qrcode_model->detail($id_qrcode);
        // Proses hapus gambar
        @unlink('./assets/qrcode/images/'.$qr_code->gambar);
        // End proses hapus
        $data = array('id_qrcode'   => $id_qrcode);
        $this->Qrcode_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/qr'),'refresh');
    }

    public function download($id_qrcode)
    {
    	$qr_code = $this->Qrcode_model->detail($id_qrcode); //detail data
    	$qr_code_path = './assets/qrcode/images/'.$qr_code->gambar;
    	force_download($qr_code_path, NULL);
    	redirect(base_url('admin/qr'),'refresh');
    }

    public function generate()
    {
        $url = array(   base_url('login'),
                        base_url('pelatihan/daftar'),
                        base_url('magang/daftar'),
                        base_url('bukutamu'),
                        base_url()
                    );
        foreach ($url as $urls) {
            $qr_code = $this->generate_cr_code($urls);
            $data = array(  'data'      => $urls,
                            'gambar'    => $qr_code,
                        );
            $this->Qrcode_model->tambah($data);
            sleep(1);
        }    
        redirect(base_url('admin/qr'),'refresh');
    }

	function generate_cr_code($data)
	{
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/qrcode/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/qrcode/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = 1024; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        
        $image_name = date('dmY').uniqid().'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $data; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 20;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        return $image_name;
	}
}

/* End of file Qr.php */
/* Location: ./application/controllers/admin/Qr.php */