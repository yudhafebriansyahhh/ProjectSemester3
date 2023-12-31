<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Nasabah_model');
    $this->load->model('Transaksi_model');
    $this->load->model('SetorSampah_model');
    $this->load->model('Penjemputan_model');
    $this->load->model('HistoryPoin_model');
  }

  public function index()
  {
    $data['judul'] = 'Dashboard';
    
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $id = $this->session->userdata('id_nasabah');
    $data['histori'] = $this->SetorSampah_model->historisetorbyID($id);
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/dashboard", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function profile()
  {
    $data['judul'] = "Halaman Profile";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/profile", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }
  public function editProfile()
  {
    $data['judul'] = "Halaman Edit Profile";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $data['id'] = $this->session->userdata('id_nasabah');
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/editProfile", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function changePassword()
  {
    $data['judul'] = "Halaman Edit Password";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[8]|matches[newPassword2]');
    $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[8]|matches[newPassword1]');

    if ($this->form_validation->run() == false) {
      $this->load->view("layout/layoutNasabah/header", $data);
      $this->load->view("nasabah/editPassword", $data);
      $this->load->view("layout/layoutNasabah/footer", $data);
    } else {
      $currentPassword = $this->input->post('currentPassword');
      $newPassword = $this->input->post('newPassword1');

      if (!password_verify($currentPassword, $data['nasabah']['password'])) {
        $this->session->set_flashdata('flash', 'Gagal, Password salah!');
        redirect('Nasabah/changePassword');
      } else {
        if ($currentPassword == $newPassword) {
          $this->session->set_flashdata('flash', 'Gagal, Password baru tidak boleh sama dengan password sebelumnya!!');
          redirect('Nasabah/changePassword');
        } else {
          $dataToUpdate = array('password' => password_hash($newPassword, PASSWORD_DEFAULT));

          // Perbarui hanya kolom password
          $this->Nasabah_model->update(['email' => $this->session->userdata('email')], $dataToUpdate);
          $this->session->set_flashdata('flash', 'Password berhasil diubah!');
          redirect('Nasabah/changePassword');
        }
      }
    }
  }

  public function updateProfile()
  {
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();

    // Konfigurasi upload gambar
    $config['upload_path']   = './assets/img/profile/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    // Lakukan upload gambar hanya jika file gambar diunggah
    if ($this->upload->do_upload('profile_picture')) {
      $old_image = $data['nasabah']['gambar'];
      if ($old_image != 'default.png') {
        unlink(FCPATH . '/assets/img/profile/' . $old_image);
      }

      $data = $this->upload->data();
      $file_name = $data['file_name'];
    } else {
      // Jika tidak ada file gambar yang diunggah, gunakan gambar lama
      $file_name = $data['nasabah']['gambar'];
    }

    // Dapatkan data lain dari form
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $no_hp = $this->input->post('no_hp');
    $email = $this->input->post('email');

    // Update data dan nama file ke dalam database
    $update_data = array(
      'nama' => $nama,
      'alamat' => $alamat,
      'jenis_kelamin' => $jenis_kelamin,
      'no_hp' => $no_hp,
      'email' => $email,
      'gambar' => $file_name,
    );

    // Panggil model untuk melakukan update
    $this->Nasabah_model->update(array('id_nasabah' => $this->session->userdata('id_nasabah')), $update_data);

    // Redirect atau tampilkan pesan sukses
    $this->session->set_flashdata('flash', 'Profil berhasil diperbarui!');
    redirect('Nasabah/editProfile');
  }
  public function redeemPoints()
  {
    $data['judul'] = "Halaman Redeem Point";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/redeem", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }
  public function cek_redeem()
  {
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
    redirect('Nasabah/redeemPoints');
  }
  public function penarikan()
  {
    $data['judul'] = "Halaman Penarikan";

    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/penarikan", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function cek_penarikan()
  {
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
        'penerima' => $this->input->post('namaPenerima'),
        'jumlah_tarik' => $jumlah_tarik,
        'status' => 'Menunggu Pembayaran',
      ];
      $this->Transaksi_model->insert($transaksi);
      // Redirect atau tampilkan pesan sukses
      $this->session->set_flashdata('flash', ' Penarikan sedang diproses, mohon ditunggu!');
    } else {
      // Tampilkan pesan error
      $this->session->set_flashdata('flash', ' Gagal melakukan penarikan atau saldo tidak cukup!');
    }
    redirect('Nasabah');
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
  public function historySetor()
  {
    $data['judul'] = 'History Penyetoran Sampah';
    $data['histori'] = $this->SetorSampah_model->historisetorbyID();
  }
  #controller
  public function hapusAccount($id)
  {
    if ($this->input->post('accountActivation')) {
      // Hapus akun jika checkbox dikonfirmasi
      $this->Nasabah_model->delete($id);
      $this->session->set_flashdata('flash', 'Account berhasil dihapus.');
      redirect("Auth");
    } else {
      // Tampilkan pesan bahwa checkbox belum dikonfirmasi
      $this->session->set_flashdata('flash', 'Silakan konfirmasi penghapusan akun.');
      redirect("Nasabah/hapus/" . $id);
    }
  }

  public function dropPoint()
  {
    $data['judul'] = 'Lokasi Bank Sampah';
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/lokasi_pengantaran", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function inputpenjemputan()
  {
    // Ambil id_nasabah dari sesi pengguna
    $id_nasabah = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array()['id_nasabah'];

    // Data yang akan disimpan
    $data = [
      "id_nasabah" => $id_nasabah,
      "nama" => $this->input->post("nama"),
      "alamat" => $this->input->post("alamat"),
      "no_hp" => $this->input->post("no_hp"),
      "status" => "Waiting",
    ];

    // Panggil model untuk menyimpan data
    $this->Penjemputan_model->insert($data);
    $this->session->set_flashdata('flash', 'Penjemputan Sampah berhasil dipesan! Silahkan tunggu sampah di jemput dan poin anda akan di inputkan oleh admin');
    redirect('Nasabah');
  }


  public function pesanpenjemputan()
  {
    $data['judul'] = "Pesan penjemputan";
    $data['nasabah'] = $this->db->get_where('nasabah', ['email' => $this->session->userdata('email')])->row_array();
    $this->Nasabah_model->get();
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/penjemputan", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function getDataByNasabah()
  {
    // Ambil id_nasabah dari session
    $id_nasabah = $this->session->userdata('id_nasabah');

    if (!$id_nasabah) {
      // Handle jika id_nasabah tidak tersedia di session (sesuaikan dengan kebutuhan Anda)
      echo json_encode(['error' => 'ID Nasabah tidak tersedia di session.']);
      return;
    }

    $data = $this->SetorSampah_model->getDataByNasabah($id_nasabah);

    // Mengubah struktur data untuk hanya berisi berat
    $formattedData = array();
    foreach ($data as $row) {
      $formattedData[] = (float)$row['total_berat'];
    }

    header('Content-Type: application/json');
    echo json_encode($formattedData);
  }

  public function historyPoin()
  {
    $id = $this->session->userdata('id_nasabah');
    $data['judul'] = 'History Poin';
    $data['histori'] = $this->HistoryPoin_model->historisetorbyID($id);
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/history_poin", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }
  public function historyPenjemputan()
  {
    $id = $this->session->userdata('id_nasabah');
    $data['judul'] = 'History Penjemputan';
    $data['histori'] = $this->Penjemputan_model->historipenjemputanbyID($id);
    $this->load->view("layout/layoutNasabah/header", $data);
    $this->load->view("nasabah/statusPenjemputan", $data);
    $this->load->view("layout/layoutNasabah/footer", $data);
  }

  public function deleteProfilePicture()
  {
    $id = $this->session->userdata('id_nasabah');
    $old_image = $this->session->userdata('gambar');

    if ($old_image != 'default.png') {
      $file_path = FCPATH . '/assets/img/profile/' . $old_image;

      // Check if the file exists before attempting to unlink
      if (file_exists($file_path)) {
        unlink($file_path);
      }
    }

    $this->Nasabah_model->resetProfile($id);

    $this->session->set_flashdata('flash', 'Photo profile berhasil dihapus.');
    redirect('Nasabah/editProfile');
  }

 


  #controller
  // public function hapusAccount($id)
  // {
  //   if ($this->input->post('accountActivation')) {
  //     // Hapus akun jika checkbox dikonfirmasi
  //     $this->Nasabah_model->delete($id);
  //     $this->session->set_flashdata('flash', 'Account berhasil dihapus.');
  //     redirect("Auth");
  //   } else {
  //     // Tampilkan pesan bahwa checkbox belum dikonfirmasi
  //     $this->session->set_flashdata('flash', 'Silakan konfirmasi penghapusan akun.');
  //     redirect("Nasabah/hapus/" . $id);
  //   }
  // }
}


/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */