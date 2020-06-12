<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model
{
    private $_tableaset = "tb_aset";
    private $_tablekategori = "tb_kategori";
    private $_tabletransaksi = "tb_transaksi";

    public $tanggal;
    public $id_aset;
    public $id_kategori;
    public $saldo;
    public $uraian;
    public $ref;

    public function getAset(){
        return $this->db->get($this->_tableaset)->result();
    }

    public function getKategori(){
        return $this->db->get($this->_tablekategori)->result();
    }

    public function getTransaksi(){
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset FROM tb_transaksi INNER JOIN tb_aset ON tb_transaksi.id_aset=tb_aset.id_aset INNER JOIN tb_kategori on tb_transaksi.id_kategori=tb_kategori.id_kategori;");
        return $query->result();
    }

    public function addTransaksi(){
        $post=$this->input->post();

        $date_y = DateTime::createFromFormat("Y-m-d", $post['tanggal']);

        if($post['customRadio'] == "D"){
            $ref_ = "D";
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'D%' ");
            $refcount = $query_ref->num_rows();
            if($refcount < 9){
                $ref_ .= '0';
                $ref_ .= $refcount+1;
            }
            else {
                $ref_ .= $refcount+1;
            }
        }
        else {
            $ref_ = "K";
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'K%' ");
            $refcount = $query_ref->num_rows();
            if($refcount < 9){
                $ref_ .= '0';
                $ref_ .= $refcount+1;
            }
            else {
                $ref_ .= $refcount+1;
            }
        }
        $saldo_1 = str_replace(".","",$post['saldo']);
        $saldo_ = str_replace(",",".",$saldo_1);
        $saldo = floatval($saldo_);
        $year_ = $date_y->format('Y');
        return $this->db->query("INSERT INTO tb_transaksi(ref,tanggal,id_aset,id_kategori,uraian,saldo,tahun) 
                                    VALUES('".$ref_."','".$post['tanggal']."','".$post['aset']."','"
                                    .$post['kategori']."','".$post['uraian']."','"
                                    .$saldo."','".$year_."')");
    }

    public function rules(){

    }
}