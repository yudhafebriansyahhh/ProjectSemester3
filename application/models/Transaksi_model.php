<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model HistoryTransaki_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Transaksi_model extends CI_Model
{

  public $table = 'transaksi';
  public $id = 'transaksi.id_transaksi';

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
  public function getTransaksi()
  {
    $this->db->select('transaksi.*, nasabah.nama');
    $this->db->from('transaksi');
    $this->db->join('nasabah', 'transaksi.id_nasabah = nasabah.id_nasabah', 'inner');

    // Eksekusi kueri
    $query = $this->db->get();

    // Mengembalikan hasil kueri
    return $query->result();
  }

  public function getTransaksiByIdNasabah($id_nasabah)
  {
    $this->db->where('id_nasabah', $id_nasabah);
    return $this->db->get('transaksi')->result();
  }

  public function updateStatus($id_transaksi, $status)
  {
    $data = array('status' => $status);
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update('transaksi', $data);
  }
  
  public function countMenungguPembayaran()
  {
    $this->db->where('status', 'Menunggu Pembayaran');
    $query = $this->db->get('transaksi');
    return $query->num_rows();
  }
}

/* End of file HistoryTransaki_model.php */
/* Location: ./application/models/HistoryTransaki_model.php */