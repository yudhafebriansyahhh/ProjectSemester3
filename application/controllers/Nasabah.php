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
}


/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */