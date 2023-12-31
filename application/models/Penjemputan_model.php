<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjemputan_model extends CI_Model
{

    public $table = 'penjemputan';
    public $id = 'penjemputan.id_penjemputan';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getByid($id)
    {

        $this->db->from($this->table);
        $this->db->where('id_sampah', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function historipenjemputanbyID($id)
    {
        $this->db->select('nama, alamat, no_hp, status, date');
        $this->db->from('penjemputan');
        $this->db->where('id_nasabah', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Menggunakan result() tanpa parameter untuk mengembalikan objek hasil query
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }
    }
    public function countMenungguPenjemputan()
    {
        $status = array('Waiting', 'On Progress');
        $this->db->where_in('status', $status);
        $query = $this->db->get('penjemputan');
        return $query->num_rows();
    }


    public function getPenjemputan()
    {
        $this->db->select('penjemputan.*, nasabah.nama');
        $this->db->from('penjemputan');
        $this->db->join('nasabah', 'penjemputan.id_nasabah = nasabah.id_nasabah', 'inner');

        // Eksekusi kueri
        $query = $this->db->get();

        // Mengembalikan hasil kueri
        return $query->result();
    }

    public function updateStatus($id_penjemputan, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id_penjemputan', $id_penjemputan);
        $this->db->update('penjemputan', $data);
    }
}
