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
      $this->load->view("admin/landingpage");
      $this->load->view("layout/layoutAdmin/footer");
  }
  public function setor()
  {
    $this->load->view("layout/layoutAdmin/header");
      $this->load->view("admin/setor");
      $this->load->view("layout/layoutAdmin/footer");
  }
  public function tarik()
  {
    $this->load->view("layout/layoutAdmin/header");
      $this->load->view("admin/tarik");
      $this->load->view("layout/layoutAdmin/footer");
  }

}
