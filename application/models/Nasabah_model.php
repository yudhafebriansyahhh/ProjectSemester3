<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_model extends CI_Model {

  public $table = 'nasabah';
  public $id = 'nasabah.id_nasabah';

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

  public function getById($id)
  {
      $this->db->from($this->table);
      $this->db->where('id_nasabah', $id);
      $query = $this->db->get();
      return $query->row_array();
  }

  public function getBy()
  {
      $this->db->from($this->table);
      $this->db->where('email', $this->session->userdata('email'));
      $query = $this->db->get();
      return $query->row_array();
  }

  public function update($id, $data)
  {
      $this->db->where('id_nasabah', $id);
      return $this->db->update('nasabah', $data);
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
}
