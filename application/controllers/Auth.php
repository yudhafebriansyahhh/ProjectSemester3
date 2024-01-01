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
      $email = $this->input->post('email', true);
      $data = [

        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($email),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'gambar' => 'default.png',
        'saldo' => '0',
        'poin' => '0',
        'is_active' => 0,


      ];

      $token = base64_encode(random_bytes(32));
      // var_dump($token);
      // die;
      $Nasabah_token = [
        'email' => $email,
        'token' => $token,


      ];
      $this->Nasabah_model->insert($data);
      $this->db->insert('Nasabah_token', $Nasabah_token);
      $this->_sendEmail($token, 'verify');



      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Selamat Akunmu telah berhasil terdaftFar, Silahkan Login!</div>');
      redirect('Auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => '465',
      'smtp_user' => 'muhammadraihan22ti@mahasiswa.pcr.ac.id',
      'smtp_pass' => 'raihan1234',
      'mailtype' => 'html',
      'starttls' => true,
      'newline' => "\r\n"

    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('muhammadraihan22ti@mahasiswa.pcr.ac.id', 'Web Bank Sampah');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Verifikasi Akun Bank Sampah');
      $this->email->message('Terima kasih telah mendaftar di TRASH.
      Untuk memastikan email Anda benar dan aktif, klik tombol "Verifikasi" di bawah ini :
      <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Verifikasi</a>');
    }


    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $nasabah = $this->db->get_where('nasabah', ['email' => $email])->row_array();

    if ($nasabah) {
      $nasabah_token = $this->db->get_where('nasabah_token', ['token' => $token])->row_array();


      // Update 'is_active' in 'nasabah' table
      $this->db->set('is_active', 1);
      $this->db->where('email', $email);
      $this->db->update('nasabah');

      // Delete the token from 'Nasabah_token' table
      $this->db->delete('nasabah_token', ['email' => $email]);

      // Successful verification message
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Verifikasi akun berhasil!</div>');
      redirect('Auth');
    } else {
      // Incorrect token message
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah!</div>');
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
    } {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      // Check if the user is active
      $nasabah = $this->db->get_where('nasabah', ['email' => $email])->row_array();

      if ($nasabah) {
        // Fetch 'is_active' status
        $is_active = $nasabah['is_active'];

        // Authentication logic
        if ($is_active == 1 && password_verify($password, $nasabah['password'])) {
          $data = [
            'email' => $nasabah['email'],
            'id_nasabah' => $nasabah['id_nasabah'],
          ];
          $this->session->set_userdata($data);
          redirect('Nasabah'); // Redirect to the appropriate user page
        } else {
          // Password incorrect or user not active
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah atau Akun tidak aktif!</div>');
          redirect('Auth');
        }
      } else {
        // If the user is not found in the 'nasabah' table
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
        redirect('Auth');
      }
    }
  }



  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('flash', 'Berhasil Logout!');
    redirect('Welcome');
  }

}
