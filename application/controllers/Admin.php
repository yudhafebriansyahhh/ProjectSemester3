<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view("layout/layoutAdmin/header");
      $this->load->view("admin/transaksi");
      $this->load->view("layout/layoutAdmin/footer");
  }

}
