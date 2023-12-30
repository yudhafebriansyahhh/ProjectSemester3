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
            // $this->saveTransactionHistory($id, $saldoEarned  , 'Redeem Points');

            return true;
        } else {
            return false;
        }
    }
    public function tarik($id, $jumlahTarik)
    {
        // Ambil poin dari tabel nasabah
        $currentSaldo = $this->db->select('saldo')->get_where('nasabah', array('id_nasabah' => $id))->row()->saldo;
    }

    private function calculateSaldoEarned($pointsRedeemed)
    {
        // Nilai saldo yang didapatkan berdasarkan jumlah poin yang ditukarkan
        $saldoEarned = $pointsRedeemed * 100;
        return $saldoEarned;
    }

    // private function saveTransactionHistory($userId, $amount, $transactionType)
    // {
    //     $data = array(
    //         'user_id' => $userId,
    //         'amount' => $amount,
    //         'transaction_type' => $transactionType,
    //         'transaction_date' => date('Y-m-d H:i:s'),
    //     );

    //     $this->db->insert('transaction_history', $data);
    // }

    public function get_saldo($id)
    {
        return $this->db->get_where('nasabah', ['id_nasabah' => $id])->row()->saldo;
    }

    public function update_saldo($id, $new_saldo)
    {
        $this->db->where('id_nasabah', $id);
        $this->db->update('nasabah', ['saldo' => $new_saldo]);
    }
}
