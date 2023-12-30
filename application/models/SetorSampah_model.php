<?php
defined('BASEPATH') or exit('No direct script access allowed');


class SetorSampah_model extends CI_Model
{

    public $table = 'setor';
    public $id = 'setor.id_setor';
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

    public function getDataPoin()
    {
        $this->db->select('setor.id_setor, nasabah.nama AS nama_nasabah, sampah.nama AS nama_sampah, admin.nama AS nama_admin, setor.poin, setor.berat, setor.date');
        $this->db->from($this->table);
        $this->db->join('nasabah', 'nasabah.id_nasabah = setor.id_nasabah');
        $this->db->join('sampah', 'sampah.id_sampah = setor.id_sampah');
        $this->db->join('admin', 'admin.id_admin = setor.id_admin');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByid($id)
    {

        $this->db->from($this->table);
        $this->db->where('id_setor', $id);
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

    public function historisetorbyID($id)
    {
        $this->db->select('setor.id_setor, nasabah.nama AS nama_nasabah, sampah.nama AS nama_sampah, sampah.jenis, setor.berat, setor.poin, setor.date');
        $this->db->from('setor');
        $this->db->join('nasabah', 'nasabah.id_nasabah = setor.id_nasabah');
        $this->db->join('sampah', 'sampah.id_sampah = setor.id_sampah');
        $this->db->where('nasabah.id_nasabah', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }
    }
}
