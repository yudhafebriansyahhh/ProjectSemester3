<?php
defined('BASEPATH') or exit('no direct sript access allowed');
class Konten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model');
       
    }
    public function index()
    {
        $data['judul'] = "Halaman Konten";
        $data['konten'] = $this->Konten_model->get();
       
        $this->load->view("layout/layoutAdmin/header", $data);
        $this->load->view("konten/vw_konten", $data);
        $this->load->view("layout/layoutAdmin/footer");
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Konten";
        
        $this->form_validation->set_rules('gambar', 'Gambar', 'required', [
            'required' => 'Gambar Wajib di isi'
        ]);
        $this->form_validation->set_rules('konten', 'Konten', 'required', [
            'required' => 'Konten Wajib di isi'
        ]);
       
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/layoutAdmin/header", $data);
            $this->load->view("konten/vw_konten_tambah", $data);
            $this->load->view("layout/layoutAdmin/footer");
        } else {
            $data = [
                'gambar' => $this->input->post('gambar'),
                'konten' => $this->input->post('konten'),
                
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|JPG';
                $config['max_size'] = '10000';
                $config['upload_path'] = 'assets/gambar/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');

                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Konten_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
            Konten Berhasil Ditambah!</div>');
            redirect('Konten');
        }
    }

   

   


    
    public function hapus($id)
    {
        $this->Konten_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
        fas fa-info-circle"></i>Data Konten tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
        class="icon fas fa-check-circle"></i>Data Konten Berhasil Dihapus!</div>');
        }
        redirect('Konten');
    }
}
?>