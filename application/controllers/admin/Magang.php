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

    public function detail($id)
    {
        $object = $this->Magang_model->detail($id);
        $data = array(  'title'             => 'Detail: '.$object->nama,
                        'object'            => $object,
                        'isi'               => 'admin/magang/detail'
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

    public function pdf()
    {
        $namafile = "magang_";
        $peserta = $this->Magang_model->listingAsc();
        $data = array(  'title'         => 'Daftar Peserta PKL/Magang',
                        'peserta'       => $peserta,
                    );
        $html   = $this->load->view('admin/magang/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'orientation' => 'L']);
        $mpdf->WriteHTML($html);
        $mpdf->Output($namafile.date("Y/m/d").'.pdf', 'I');
    }

    // Delete magang
    public function delete($id_peserta)
    {
        // Proses hapus gambar
        $magang = $this->Magang_model->detail($id_peserta);
        unlink('./assets/upload/pkl/'.$magang->dokumen);
        // End proses hapus
        $data = array('id_peserta'   => $id_peserta);
        $this->Magang_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/magang'),'refresh');
    }

}