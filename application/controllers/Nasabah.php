<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Nasabah_model");
  }

  public function index()
  {
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/dashboard", $data);
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
      $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
      // Ambil ID nasabah dari session
      $id = $this->session->userdata('id_nasabah');
  
      // Ambil nilai points_to_redeem dari formulir
      $pointsToRedeem = $this->input->post('points_to_redeem');
  
      // Panggil fungsi redeemPoints dari model
      $redeemResult = $this->Nasabah_model->redeemPoints($id, $pointsToRedeem);
  
      // Set pesan hasil redeeming untuk ditampilkan di view
      if ($redeemResult) {
          $data['redeem_message'] = "Poin berhasil ditukar menjadi saldo.";
      } else {
          $data['redeem_message'] = "Gagal menukar poin atau poin tidak mencukupi.";
      }
  
      $this->load->view("layout/layoutNasabah/header", $data);
      $this->load->view("nasabah/redeem", $data);
      $this->load->view("layout/layoutNasabah/footer", $data);
  }
  
}


/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */