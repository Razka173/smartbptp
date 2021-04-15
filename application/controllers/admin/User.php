<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        // Proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $admin = $this->Admin_model->listing();
        $data = array(
            'title'     => 'Data Admin',
            'admin'     => $admin,
            'isi'       => 'admin/user/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}