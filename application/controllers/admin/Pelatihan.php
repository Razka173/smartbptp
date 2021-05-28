<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatihan_model');
        // Proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $peserta = $this->Pelatihan_model->listing();
        $data = array(
            'title'     => 'Halaman Pelatihan Teknologi',
            'peserta'   => $peserta,
            'isi'       => 'admin/pelatihan/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function dokumen($id_peserta)
    {
        $peserta = $this->Pelatihan_model->detail($id_peserta);
        $data = array(
            'title'     => 'Halaman Pelatihan Teknologi',
            'peserta'   => $peserta,
            'isi'       => 'admin/pelatihan/dokumen'
        );
        $this->load->view('admin/pelatihan/dokumen', $data, FALSE);
    }
}