<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah_model extends CI_Model
{

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
    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getByid($id)
    {

        $this->db->from($this->table);
        $this->db->where('id_nasabah', $id);
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
    public function redeemPoints($id, $pointsToRedeem)
    {
        // Ambil poin dari tabel nasabah
        $currentPoints = $this->db->select('poin')->get_where('nasabah', array('id_nasabah' => $id))->row()->poin;

        if ($currentPoints >= $pointsToRedeem) {
            // Hitung nilai saldo berdasarkan jumlah poin yang ditukarkan
            $saldoEarned = $this->calculateSaldoEarned($pointsToRedeem);

            // Kurangkan poin
            $updatedPoints = $currentPoints - $pointsToRedeem;

            // Update poin di tabel nasabah
            $this->db->where('id_nasabah', $id)->update('nasabah', array('poin' => $updatedPoints));

            // Tambahkan saldo
            $this->db->where('id_nasabah', $id)->set('saldo', 'saldo + ' . $saldoEarned, false)->update('nasabah');

            // Simpan transaksi penukaran poin ke dalam tabel histori
            $this->saveTransactionHistory($id, $currentPoints, $pointsToRedeem, 'Redeem');

            return true;
        } else {
            return false;
        }
    }
    public function getPoinById($id_nasabah)
    {
        $this->db->select('poin');
        $query = $this->db->get_where('nasabah', ['id_nasabah' => $id_nasabah]);
        $result = $query->row_array();

        return isset($result['poin']) ? $result['poin'] : 0; // Mengembalikan poin atau 0 jika tidak ada data
    }

    private function calculateSaldoEarned($pointsRedeemed)
    {
        // Nilai saldo yang didapatkan berdasarkan jumlah poin yang ditukarkan
        $saldoEarned = $pointsRedeemed * 100;
        return $saldoEarned;
    }

    public function saveTransactionHistory($userId, $currentPoints, $amount, $transactionType)
    {
        $point_awal = $currentPoints;
        if ($transactionType == 'Redeem') {
            $point_akhir = $point_awal - $amount;
        } else {
            $point_akhir = $point_awal + $amount;
        }
        $data = array(
            'poin_awal' => $point_awal,
            'transaksi_poin' => $amount,
            'jenis_transaksi' => $transactionType,
            'poin_akhir' => $point_akhir,
            'id_nasabah' => $userId
        );

        $this->db->insert('histori_poin', $data);
    }

    public function get_saldo($id)
    {
        return $this->db->get_where('nasabah', ['id_nasabah' => $id])->row()->saldo;
    }

    public function update_saldo($id, $new_saldo)
    {
        $this->db->where('id_nasabah', $id);
        $this->db->update('nasabah', ['saldo' => $new_saldo]);
    }

    public function resetProfile($id)
    {
        $this->db->where('id_nasabah', $id);
        $this->db->update('nasabah', ['gambar' => 'default.png']);
    }

    public function countNasabah()
    {
        $query = $this->db->get('nasabah');
        return $query->num_rows();
    }
}
