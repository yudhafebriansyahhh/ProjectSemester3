<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sampah_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Penjemputan_model');
    }


    public function index()
    {
        $data['judul'] = "Data Table Sampah";
        $data['sampah'] = $this->Sampah_model->get();
        $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
        $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
        $this->load->view("layout/layoutAdmin/header",$data);
        $this->load->view('admin/sampah', $data);
        $this->load->view("layout/layoutAdmin/footer",$data);
        
        
    }

    public function HalamanTambahSampah()
    {   $data['judul']="Halaman Tambah Data Sampah";
        $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
        $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
        $this->load->view("layout/layoutAdmin/header", $data);
        $this->load->view('admin/tambahsampah', $data); 
        $this->load->view("layout/layoutAdmin/footer",$data);
    }

    public function upload()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'jenis' => $this->input->post('jenis'),
            'point' => $this->input->post('point'),

        ];
        $this->Sampah_model->insert($data);
        
        redirect('Sampah');
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'jenis' => $this->input->post('jenis'),
            'point' => $this->input->post('point'),

        ];

        $id = $this->input->post('id_sampah');
        $this->Sampah_model->update(['id_sampah' => $id], $data);
        redirect('Sampah');
    }

    public function HalamanEditSampah($id)
    {
        $data['sampah'] = $this->Sampah_model->getByid($id);
        $this->load->view("layout/layoutAdmin/header");
        $this->load->view('admin/editsampah',$data);
        $this->load->view("layout/layoutAdmin/footer");

    }

    public function hapus($id)
    {
        $this->Sampah_model->delete($id);
        $this->session->set_flashdata('flash', 'Data berhasil dihapus.');
        redirect("Sampah");
    }

    

}