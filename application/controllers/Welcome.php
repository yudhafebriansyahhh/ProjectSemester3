<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/landingPage/header');
		$this->load->view('landingPage/tampilan');
		$this->load->view('layout/landingPage/footer');
	}
}
