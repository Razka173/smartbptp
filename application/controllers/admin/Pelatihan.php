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

    public function detail($id)
    {
        $object = $this->Pelatihan_model->detail($id);
        $data = array(  'title'             => 'Detail: '.$object->nama,
                        'object'            => $object,
                        'isi'               => 'admin/pelatihan/detail'
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

    public function pdf()
    {
        $pelatihan = $this->Pelatihan_model->listingAsc();
        $data = array(  'title'         => 'Daftar Pelatihan Teknologi',
                        'peserta'       => $pelatihan,
                    );
        $html   = $this->load->view('admin/pelatihan/cetak', $data, true);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    // Delete pelatihan
    public function delete($id_pelatihan)
    {
        // Proses hapus gambar
        $pelatihan = $this->Pelatihan_model->detail($id_pelatihan);
        unlink('./assets/upload/pelatihan/'.$pelatihan->dokumen);
        // End proses hapus
        $data = array('id_pelatihan'   => $id_pelatihan);
        $this->Pelatihan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/pelatihan'),'refresh');
    }
}