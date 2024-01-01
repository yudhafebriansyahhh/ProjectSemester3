<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model HisotryPoin_model
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

class HistoryPoin_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public $table = 'histori_poin';
    public $id = 'histori_poin.id_histori';
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
        $this->db->select('poin_awal, transaksi_poin, jenis_transaksi, poin_akhir, date');
        $this->db->from('histori_poin');
        $this->db->where('id_nasabah', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Menggunakan result() tanpa parameter untuk mengembalikan objek hasil query
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file HisotryPoin_model.php */
/* Location: ./application/models/HisotryPoin_model.php */