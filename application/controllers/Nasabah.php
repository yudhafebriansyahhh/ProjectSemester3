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
    $this->load->view("layout/layoutNasabah/header",$data);
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

}


/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */