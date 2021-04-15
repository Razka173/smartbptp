<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peserta_model');
        // Proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $peserta = $this->Peserta_model->listing();
        $data = array(
            'title'     => 'Data Peserta',
            'peserta'   => $peserta,
            'isi'       => 'admin/peserta/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}