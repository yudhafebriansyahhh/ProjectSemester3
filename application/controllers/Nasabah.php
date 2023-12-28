<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Nasabah_model");
    $this->load->model('Transaksi_model');
  }

  public function index()
  {
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/dashboard", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function profile()
  {
    $data['judul'] = "Halaman Edit Profile";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/profile", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }
  public function editProfile()
  {
    $data['judul'] = "Halaman Edit Profile";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/editProfile", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function redeemPoints()
  {
    $data['judul'] = "Halaman Redeem Point";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();

    // Ambil ID nasabah dari session
    $id = $this->session->userdata('id_nasabah');

    // Ambil nilai points_to_redeem dari formulir
    $pointsToRedeem = $this->input->post('points_to_redeem');

    // Panggil fungsi redeemPoints dari model
    $redeemResult = $this->Nasabah_model->redeemPoints($id, $pointsToRedeem);

    // Set pesan hasil redeeming untuk ditampilkan di view
    if ($redeemResult) {
      $this->session->set_flashdata('flash', ' melakukan redeem poin. Saldo Anda telah ditambahkan!');
    } else {
      $this->session->set_flashdata('flash', 'Gagal menukarkan poin atau poin tidak mencukupi.');
    }

    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/redeem", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function penarikan()
  {
    $data['judul'] = "Halaman Penarikan";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();

    $id = $this->session->userdata('id_nasabah');

    $jumlah_tarik = $this->input->post('jumlah_tarik');

    $saldo_sekarang = $this->Nasabah_model->get_saldo($id);

    if ($jumlah_tarik > 0 && $saldo_sekarang >= $jumlah_tarik) {
      // Update saldo nasabah
      $new_saldo = $saldo_sekarang - $jumlah_tarik;
      $this->Nasabah_model->update_saldo($id, $new_saldo);

      // Simpan transaksi penarikan saldo ke tabel historyTransaksi
      $metode = $this->input->post('metode');
      $jenis = '';
      $nomor = '';

      if ($metode == 'Bank Transfer') {
        $jenis = $this->input->post('jenis_bank');
        $nomor = $this->input->post('nomor_rekening');
      } elseif ($metode == 'Dompet Digital') {
        $jenis = $this->input->post('jenis_dompet');
        $nomor = $this->input->post('nomor_hp');
      }

      $transaksi = [
        'id_nasabah' => $id,
        'metode' => $metode,
        'jenis' => $jenis,
        'nomor' => $nomor,
        'jumlah_tarik' => $jumlah_tarik,
        'status' => 'Menunggu Pembayaran',
        'date' => date('Y-m-d H:i:s')
      ];
      $this->Transaksi_model->insert($transaksi);
      // Tambahkan pula log transaksi ke tabel logTransaksi (jika diperlukan)
      // $this->db->insert('logTransaksi', [
      //   'id_nasabah' => $id,
      //   'jenis_transaksi' => 'penarikan',
      //   'jumlah' => $jumlah_tarik,
      //   'tanggal' => date('Y-m-d H:i:s')
      // ]);

      // Redirect atau tampilkan pesan sukses
      $this->session->set_flashdata('flash', ' Penarikan sedang diproses. Mohon Tunggu!');
      redirect('Nasabah');
    } else {
      // Tampilkan pesan error
      $this->session->set_flashdata('flash', ' Gagal melakukan penarikan atau saldo tidak cukup!');
    }


    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/penarikan", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function historyTransaksi()
  {
      $data['judul'] = "Histori Transaksi";
      $id_nasabah = $this->session->userdata('id_nasabah');
  
      $data['histori_transaksi'] = $this->Transaksi_model->getTransaksiByIdNasabah($id_nasabah);
  
      $this->load->view("layout/layoutNasabah/header", $data);
      $this->load->view("nasabah/history_penarikan", $data);  // Gantilah dengan nama view yang sesuai
      $this->load->view("layout/layoutNasabah/footer", $data);
  }
}


/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */