<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nasabah_model');
  }

  public function index()
  {
    $this->load->view("layout/layoutAdmin/header");
    $this->load->view("admin/dashboard");
    $this->load->view("layout/layoutAdmin/footer");
  }
  
  public function userData()
  {
    $data['judul'] = "Data Table User";
    $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['nasabah'] = $this->Nasabah_model->get();
    $this->load->view("layout/layoutAdmin/header");
    $this->load->view("admin/dataUser", $data);
    $this->load->view("layout/layoutAdmin/footer");
  }

}
