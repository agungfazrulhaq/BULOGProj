<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model
{
    private $_tableaset = "tb_aset";
    private $_tablekategori = "tb_kategori";
    private $_tabletransaksi = "tb_transaksi";

    public function getAset(){
        return $this->db->get($this->_tableaset)->result();
    }

    public function getKategori(){
        return $this->db->get($this->_tablekategori)->result();
    }

    public function getTransaksi(){
        $query = $this->db->query("SELECT tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset FROM tb_transaksi INNER JOIN tb_aset ON tb_transaksi.id_aset=tb_aset.id_aset INNER JOIN tb_kategori on tb_transaksi.id_kategori=tb_kategori.id_kategori;");
        return $query->result();
    }
}