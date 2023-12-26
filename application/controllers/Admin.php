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

    public function tambahdatauser()
    {
        $data['judul'] = "Tambah Data User";
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['nasabah'] = $this->Nasabah_model->get();
        $this->load->view("layout/layoutAdmin/header");
        $this->load->view("admin/tambahDataUser", $data);
        $this->load->view("layout/layoutAdmin/footer");
    }

    public function prosesTambahData()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'saldo' => $this->input->post('saldo'),
            'poin' => $this->input->post('poin')
        );

        $this->db->insert('nasabah', $data);
        redirect('admin/userData');
    }

    public function editDataUser($id)
    {
        $data['judul'] = "Edit Data User";
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['nasabah'] = $this->Nasabah_model->getById($id);
  
        if ($data['nasabah'] !== null) {
            $this->load->view("layout/layoutAdmin/header");
            $this->load->view("admin/editDataUser", $data);
            $this->load->view("layout/layoutAdmin/footer");
        }
    }

    public function prosesEditData($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'saldo' => $this->input->post('saldo'),
            'poin' => $this->input->post('poin')
        );
    
        $this->Nasabah_model->update($id, $data);
    
        if ($this->db->affected_rows() > 0) {
            redirect('admin/userData');
        }
    }

    public function deleteDataUser($id)
    {
    $result = $this->Nasabah_model->delete($id);

    if ($result > 0) {
        redirect('admin/userData');
    } else {
        echo "Gagal menghapus data atau data tidak ditemukan.";
    }
    }
    
}
