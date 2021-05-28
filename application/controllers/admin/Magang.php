<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Magang_model');
        // Proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $peserta = $this->Magang_model->listing();
        $data = array(
            'title'     => 'Halaman PKL/Magang',
            'peserta'   => $peserta,
            'isi'       => 'admin/magang/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function dokumen($id_peserta)
    {
        $peserta = $this->Magang_model->detail($id_peserta);
        $data = array(
            'title'     => 'Halaman PKL/Magang',
            'peserta'   => $peserta,
            'isi'       => 'admin/magang/dokumen'
        );
        $this->load->view('admin/magang/dokumen', $data, FALSE);
    }
}