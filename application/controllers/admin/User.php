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

    public function edit_profile($id_user)
    {
        $user = $this->Admin_model->detail($id_user);

        if($user->id_user != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data orang lain');
            redirect(base_url('admin/user'));
        }

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','Nama','required',
            array(  'required'      => '%s harus diisi'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Edit Profile Admin',
                            'user'      => $user,
                            'isi'       => 'admin/user/edit',
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            // Masuk database
            $i = $this->input;
            $data = array(  'id_user'       => $id_user,
                            'nama'          => $i->post('nama'),
                            // 'email'         => $i->post('email'),
                            // 'username'      => $i->post('username'),
                        );
            $this->Admin_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/user'),'refresh');
        }
        // End masuk database
    }

    public function edit_email($id_user)
    {
        $user = $this->Admin_model->detail($id_user);

        if($user->id_user != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data orang lain');
            redirect(base_url('admin/user'));
        }

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('email','Email', 'required|valid_email|is_unique[users.email]',
            array(  'required'      => '%s harus diisi',
                    'valid_email'   => '%s tidak valid',
                    'is_unique'     => '%s sudah digunakan. Gunakan email lain.'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Edit Email Admin',
                            'user'      => $user,
                            'isi'       => 'admin/user/edit_email',
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            // Masuk database
            $i = $this->input;
            $data = array(  'id_user'       => $id_user,
                            'email'         => $i->post('email'),
                        );
            $this->Admin_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/user'),'refresh');
        }
        // End masuk database
    }

    public function edit_username($id_user)
    {
        $user = $this->Admin_model->detail($id_user);

        if($user->id_user != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data orang lain');
            redirect(base_url('admin/user'));
        }

        // Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]|alpha_numeric',
            array(  'required'      => '%s harus diisi',
                    'min_length'    => '%s minimal 6 karakter',
                    'max_length'    => '%s maksimal 32 karakter',
                    'is_unique'     => '%s sudah ada. Buat username baru.',
                    'alpha_numeric' => 'Pastikan %s terdiri dari angka atau huruf.'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Edit Profile Admin',
                            'user'      => $user,
                            'isi'       => 'admin/user/edit_username',
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            // Masuk database
            $i = $this->input;
            $data = array(  'id_user'       => $id_user,
                            'username'      => $i->post('username'),
                        );
            $this->Admin_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/user'),'refresh');
        }
        // End masuk database
    }

    public function ganti_password($id_user)
    {
        $user = $this->Admin_model->detail($id_user);

        if($user->id_user != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data orang lain');
            redirect(base_url('admin/user'));
        }

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('new_password','Password','required|min_length[6]',
            array(  'required'      => '%s harus diisi',
                    'min_length'    => '%s minimal 6 karakter'));

        $valid->set_rules('conf_password','Konfirmasi Password','required|matches[new_password]',
            array(  'required'      => '%s harus diisi',
                    'matches'       => '%s harus sama dengan password'));

        if($valid->run()===FALSE) {
            // End validasi
            $data = array(  'title'     => 'Ganti Password Admin',
                            'user'      => $user,
                            'isi'       => 'admin/user/ganti_password',
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        }else{
            $old_password = $this->input->post('old_password');
            $cek_old = $this->admin_model->login($user->username, $old_password);
            if(!$cek_old){
                $this->session->set_flashdata('warning', "Password lama anda tidak cocok");
                redirect(base_url('admin/user/ganti_password/').$this->session->userdata('id_user'),'refresh');
            }else{
                // Masuk database
                $i = $this->input;
                $data = array(  'id_user'       => $id_user,
                                'password'      => SHA1($i->post('new_password')),
                            );
                $this->Admin_model->edit($data);
                $this->session->set_flashdata('sukses', 'Password berhasil diganti');
                redirect(base_url('admin/user'),'refresh');
            }
             // End masuk database
        }
       
    }
}