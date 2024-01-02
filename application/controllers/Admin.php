<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nasabah_model');
    $this->load->model('Sampah_model');
    $this->load->model('SetorSampah_model');
    $this->load->model('Transaksi_model');
    $this->load->model('Penjemputan_model');
  }


  public function index()
  {
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $data['jmlhNasabah'] = $this->Nasabah_model->countNasabah();
    $data['jmlhSampahOrganik'] = $this->SetorSampah_model->jumlahBeratSampahOrganik();
    $data['jmlhSampahAnorganik'] = $this->SetorSampah_model->jumlahBeratSampahAnorganik();
    $this->load->view("layout/layoutAdmin/header", $data);
    $this->load->view("admin/dashboard", $data);
    $this->load->view("layout/layoutAdmin/footer", $data);
  }

  public function userData()
  {
    $data['judul'] = "Data Table User";
    $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['nasabah'] = $this->Nasabah_model->get();
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $this->load->view("layout/layoutAdmin/header", $data);
    $this->load->view("admin/dataUser", $data);
    $this->load->view("layout/layoutAdmin/footer", $data);
  }

  public function update()
  {
    $data = [
      'poin' => $this->input->post('poin'),

    ];
    $id = $this->input->post('id_nasabah');
    $this->Nasabah_model->update(['id_nasabah' => $id], $data);
    redirect('Admin/userData');
  }

  public function ubah($id)
  {
    $data['nasabah'] = $this->Nasabah_model->getByid($id);
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $this->load->view("layout/layoutAdmin/header", $data);
    $this->load->view("admin/editUser", $data);
    $this->load->view("layout/layoutAdmin/footer", $data);
  }

  public function hapus($id)
  {
    $this->Nasabah_model->delete($id);
    redirect("Admin/userData");
  }

  public function insertPoin()
  {
    $data["judul"] = "Halaman Insert Point";
    $data['nasabah_list'] = $this->Nasabah_model->get();  // Mengambil list nasabah dari model
    $data['sampah_list'] = $this->Sampah_model->get();     // Mengambil list sampah dari model
    $data['poin'] = $this->SetorSampah_model->getDataPoin();
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();

    $this->load->view('layout/layoutAdmin/header', $data);
    $this->load->view("admin/insertpoin", $data);
    $this->load->view("layout/layoutAdmin/footer", $data);
  }

  public function TambahPoin()
  {
    $data['judul'] = "Halaman Input Point";
    $data['nasabah_list'] = $this->Nasabah_model->get();  // Mengambil list nasabah dari model
    $data['sampah_list'] = $this->Sampah_model->get();     // Mengambil list sampah dari model
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $this->load->view('layout/layoutAdmin/header', $data);
    $this->load->view('admin/tambahpoin', $data);
    $this->load->view('layout/layoutAdmin/footer', $data);
  }
  // controllers/Admin.php

  public function prosesInsertPoin()
  {
    $id_nasabah = $this->input->post('id_nasabah');
    $id_sampah = $this->input->post('id_sampah');
    $berat = $this->input->post('berat');
    $id_admin = $this->session->userdata('id_admin');
    $currentPoints = $this->Nasabah_model->getPoinById($id_nasabah);
    // Mengambil data sampah berdasarkan id_sampah
    $sampah = $this->Sampah_model->getByid($id_sampah);


    // Menghitung poin baru berdasarkan berat dan poin per kg dari tabel sampah
    $poin_baru = $berat * $sampah['point'];

    // Memasukkan data ke dalam tabel insertpoin
    $data_insertpoin = [
      'id_nasabah' => $id_nasabah,
      'id_sampah' => $id_sampah,
      'id_admin' => $id_admin,
      'berat' => $berat,
      'poin' => $poin_baru,
    ];

    // Insert data ke dalam tabel insertpoin
    $this->SetorSampah_model->insert($data_insertpoin);

    // Mengambil data nasabah berdasarkan id
    $nasabah = $this->Nasabah_model->getByid($id_nasabah);

    if ($nasabah) {
      // Menghitung poin baru berdasarkan berat dan poin dari sampah
      $poin_baru_nasabah = $nasabah['poin'] + $poin_baru;

      // Update nilai poin di tabel nasabah
      $data_nasabah = [
        'poin' => $poin_baru_nasabah
        // Tambahkan field lain yang perlu diupdate
      ];

      $this->Nasabah_model->update(['id_nasabah' => $id_nasabah], $data_nasabah);
      $this->Nasabah_model->saveTransactionHistory($id_nasabah, $currentPoints, $poin_baru, 'Setor');

      // Setelah mengupdate nilai poin, Anda dapat melakukan redirect atau menampilkan pesan sukses
      $this->session->set_flashdata('flash', 'Data berhasil ditambahkan.');
      redirect('admin/insertPoin');
    } else {
      // Handle jika nasabah tidak ditemukan
      echo "Nasabah tidak ditemukan.";
    }
  }

  public function DeletePoin($id)
  {
    $this->SetorSampah_model->delete($id);
    $this->session->set_flashdata('flash', 'Data berhasil dihapus.');
    redirect("Admin/insertPoin");
  }

  public function konfirmasiPembayaran()
  {
    $data['judul'] = "Konfirmasi Pembayaran";
    $data['transaksi'] = $this->Transaksi_model->getTransaksi();
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $this->load->view('layout/layoutAdmin/header', $data);
    $this->load->view('admin/konfirmasiPembayaran', $data);
    $this->load->view('layout/layoutAdmin/footer', $data);
  }

  public function prosesPembayaran($id_transaksi)
  {
    // Panggil method pada model untuk mengubah status menjadi 'Success'
    $this->Transaksi_model->updateStatus($id_transaksi, 'Success');

    // Set flashdata untuk memberikan pesan sukses
    $this->session->set_flashdata('flash', 'Pembayaran berhasil diproses.');

    // Redirect atau tampilkan halaman yang sesuai
    redirect('admin/konfirmasiPembayaran');
  }
  public function konfirmasiPenjemputan()
  {
    $data['judul'] = "Konfirmasi Penjemputan";
    $data['jemput'] = $this->Penjemputan_model->getPenjemputan();
    $data['jumlahMenungguPembayaran'] = $this->Transaksi_model->countMenungguPembayaran();
    $data['jumlahMenungguPenjemputan'] = $this->Penjemputan_model->countMenungguPenjemputan();
    $this->load->view('layout/layoutAdmin/header', $data);
    $this->load->view('admin/konfirmasiPenjemputan', $data);
    $this->load->view('layout/layoutAdmin/footer', $data);
  }

  public function prosesPenjemputan($id_penjemputan)
  {
    // Panggil method pada model untuk mengubah status menjadi 'Success'
    $this->Penjemputan_model->updateStatus($id_penjemputan, 'On Progress');

    // Set flashdata untuk memberikan pesan sukses
    $this->session->set_flashdata('flash', 'Penjemputan sampah berhasil diproses!.');

    // Redirect atau tampilkan halaman yang sesuai
    redirect('admin/konfirmasiPenjemputan');
  }
  public function selesaikanPenjemputan($id_penjemputan)
  {
    // Panggil method pada model untuk mengubah status menjadi 'Success'
    $this->Penjemputan_model->updateStatus($id_penjemputan, 'Done');

    // Set flashdata untuk memberikan pesan sukses
    $this->session->set_flashdata('flash', 'Sampah telah selesai dijemput.');

    // Redirect atau tampilkan halaman yang sesuai
    redirect('admin/konfirmasiPenjemputan');
  }
  public function hapusNasabah($id)
  {
    $this->Nasabah_model->delete($id);
    $this->session->set_flashdata('flash', 'Data berhasil dihapus.');
    redirect("Admin/userData");
  }
}
