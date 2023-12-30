<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nasabah_model');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('Welcome');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
      'valid_email' => 'Email Harus Valid',
      'required' => 'Email Wajib di isi'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', [
      'required' => 'Password Wajib di isi'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view("layout/auth/auth_header");
      $this->load->view("auth/vw_login");
      $this->load->view("layout/auth/auth_footer");
    } else {
      $this->cek_login();
    }
  }

  public function register()
  {
    if ($this->session->userdata('email')) {
      redirect('Auth');
    }
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[nasabah.email]', [
      'is_unique' => 'Email ini sudah terdaftar!',
      'valid_email' => 'Email Harus Valid',
      'required' => 'Email Wajib di isi'
    ]);
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[8]|matches[password2]',
      [
        'matches' => 'Password Tidak Sama',
        'min_length' => 'Password Terlalu Pendek',
        'required' => 'Password harus diisi'
      ]
    );
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required' => 'Alamat Wajib di isi'
    ]);
    $this->form_validation->set_rules('no_hp', 'No HP', 'required|integer', [
      'required' => 'NO HP Wajib di isi',
      'integer' => 'NO HP harus Angka'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin Wajib di isi'
    ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registration';
      $this->load->view('layout/auth/auth_header', $data);
      $this->load->view('Auth/vw_regis');
      $this->load->view('layout/auth/auth_footer');
    } else {
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),  
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'gambar' => 'default.png',
        'saldo' => '0',
        'poin' => '0',
        'date_created' => 'CURRENT_TIMESTAMP',

      ];
      $this->Nasabah_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Selamat Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
      redirect('Auth');
    }
  }


  public function cek_login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // Cek di tabel 'admin'
    $admin = $this->db->get_where('admin', ['email' => $email])->row_array();
    if ($admin) {
      // Periksa password tanpa menggunakan password hash
      if ($password == $admin['password']) {
        $data = [
          'email' => $admin['email'],
          'id_admin' => $admin['id_admin'],
        ];
        $this->session->set_userdata($data);
        redirect('Admin');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
        redirect('Auth');
      }
    }


    // Cek di tabel 'nasabah'
    $nasabah = $this->db->get_where('nasabah', ['email' => $email])->row_array();
    if ($nasabah) {
      if (password_verify($password, $nasabah['password'])) {
        $data = [
          'email' => $nasabah['email'],
          'id_nasabah' => $nasabah['id_nasabah'],
        ];
        $this->session->set_userdata($data);
        redirect('Nasabah'); 
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
        redirect('Auth');
      }
    }

    // Jika tidak ditemukan di kedua tabel
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
    redirect('Auth');
  }


  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Berhasil Logout!</div>');
    redirect('Auth');
  }
}