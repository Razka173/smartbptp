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

    // Tambah admin
    public function tambah()
    {
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','Nama','required',
            array(  'required'      => '%s harus diisi'));

        $valid->set_rules('email','Email','required|valid_email|is_unique[users.email]',
            array(  'required'      => '%s harus diisi',
                    'valid_email'   => '%s tidak valid',
                    'is_unique'     => '%s sudah digunakan. Gunakan email lain.'));
        
        $valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]|alpha_numeric',
            array(  'required'      => '%s harus diisi',
                    'min_length'    => '%s minimal 6 karakter',
                    'max_length'    => '%s maksimal 32 karakter',
                    'is_unique'     => '%s sudah ada. Buat username baru.',
                    'alpha_numeric' => 'Pastikan %s terdiri dari angka atau huruf.'));

        $valid->set_rules('password','Password','required|min_length[6]',
            array(  'required'      => '%s harus diisi',
                    'min_length'    => '%s minimal 6 karakter'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Tambah Admin',
                            'isi'       => 'admin/user/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            // Masuk database
            $i = $this->input;
            $data = array(  'nama'          => $i->post('nama'),
                            'email'         => $i->post('email'),
                            'username'      => $i->post('username'),
                            'password'      => SHA1($i->post('password')),
                        );
            $this->Admin_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/user'),'refresh');
        }
        // End masuk database
    }
}