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

    public function getYears(){
        $sql = "SELECT DISTINCT YEAR(tanggal) as years FROM tb_transaksi ORDER BY YEAR(tanggal)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getKategori(){
        return $this->db->get($this->_tablekategori)->result();
    }

    public function getTransaksi(){
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                                    FROM tb_transaksi 
                                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori;");
        return $query->result();
    }

    public function addTransaksi(){
        $post=$this->input->post();

        $date_y = DateTime::createFromFormat("Y-m-d", $post['tanggal']);
        $month_ = $date_y->format('m');

        if($post['customRadio'] == "D"){
            $ref_ = "D";
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'D%' AND MONTH(tanggal)=".$month_);
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
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'K%' AND MONTH(tanggal)=".$month_);
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
        return $this->db->query("INSERT INTO tb_transaksi(ref,tanggal,transaksi_id_aset,transaksi_id_kategori,uraian,saldo,tahun) 
                                    VALUES('".$ref_."','".$post['tanggal']."','".$post['aset']."','"
                                    .$post['kategori']."','".$post['uraian']."','"
                                    .$saldo."','".$year_."')");
    }

    public function addAset(){
        $post=$this->input->post();
        $nama_aset = $post['nama_aset'];

        return $this->db->query("INSERT INTO tb_aset(nama_aset) VALUES('".$nama_aset."');");
    }

    public function delete(){
        $post=$this->input->post();
        $id = $post['id_transaksi'];
        return $this->db->delete($this->_tabletransaksi,array("id_transaksi"=>$id));
    }

    public function rulesadd(){
        return [
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'aset',
                'label' => 'Aset',
                'rules' => 'required'    
            ],
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'uraian',
                'label' => 'Uraian',
                'rules' => 'required'
            ],
            [
                'field' => 'saldo',
                'label' => 'Saldo',
                'rules' => 'required'
            ]
        ];
    }

    public function delcheck(){
        $delid = $post['checkdel'];
        $sql = "DELETE FROM tb_transaksi WHERE id_transaksi in ";
        $sql.= "('".implode("','",array_values($post['checkdel']))."')";

        return $this->db->query($sql);
    }

    public function getAset_Transaksi($id_aset,$monthdate,$yeardate){
        if ($monthdate>0 and $monthdate<13 and $id_aset>0 and $yeardate>0){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE tb_transaksi.transaksi_id_aset=".$id_aset." AND MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($monthdate>0 and $monthdate<13 and $id_aset>0){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13 and $yeardate>0){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($yeardate>0 and $id_aset>0){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE YEAR(tb_transaksi.tanggal)=".$yeardate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE MONTH(tb_transaksi.tanggal)=".$monthdate;
        }
        else if($yeardate>0){
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else{
            $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                    FROM tb_transaksi 
                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                    WHERE tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        
        $sql_ = $this->db->query($sql);
        return $sql_->result();
    }

    public function getall_Transaksi(){
        // $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
        // tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
        // FROM tb_transaksi 
        // INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
        // INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori;";

        $this->datatables->select('id_transaksi,tanggal,ref,uraian,saldo,nama_kategori,nama_aset,transaksi_id_aset,transaksi_id_kategori');
        $this->datatables->from('tb_transaksi');
        $this->datatables->join('tb_kategori',"transaksi_id_kategori = id_kategori");
        $this->datatables->join('tb_aset',"transaksi_id_aset = id_aset");

        // $buttons = '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>'
        $this->datatables->add_column('view', '<div class="btn-group">
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalForm">
        <i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom" title="Lihat"></i></button>

        <button type="button" class="btn btn-warning btn-sm data_update" data-toggle="modal" data-target="#modalUpdate" data-id="$1" data-tanggal="$2" data-aset="$3" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7" >
          <i class="fas fa-edit" style="color:white;" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i>
        </button>
        
        <button type="button" class="btn btn-danger btn-sm deletedata" data-toggle="modal" data-target="#modaldel" data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7">
          <i class="fas fa-trash" data-toggle="tooltip" data-placement="right" title="Hapus"></i>
        </button>
      </div>', 'id_transaksi,tanggal,transaksi_id_aset,transaksi_id_kategori,uraian,ref,saldo,nama_aset,nama_kategori');
        // $sql_ = $this->db->query($sql);
        return $this->datatables->generate();
    }

    public function updateTransaksi(){
        $post=$this->input->post();

        $date_y = DateTime::createFromFormat("Y-m-d", $post['tanggal']);
        $month_ = $date_y->format('m');
        $id_transaksi = $post['id_transaksi'];

        if($post['customRadio'] == "D"){
            $ref_ = "D";
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'D%' AND MONTH(tanggal)=".$month_);
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
            $query_ref = $this->db->query("SELECT * FROM tb_transaksi where ref LIKE 'K%' AND MONTH(tanggal)=".$month_);
            $refcount = $query_ref->num_rows();
            if($refcount < 9){
                $ref_ .= '0';
                $ref_ .= $refcount+1;
            }
            else {
                $ref_ .= $refcount+1;
            }
        }
        $saldo = $post['saldo'];
        $year_ = $date_y->format('Y');
        $sql___ = "UPDATE tb_transaksi 
                    SET ref ='".$ref_."' , tanggal = '".$post['tanggal']."' , transaksi_id_aset = '".$post['aset']."',
                    transaksi_id_kategori = '".$post['kategori']."',uraian = '".$post['uraian']."',saldo = ".$saldo.", tahun = '".$year_."'
                    WHERE id_transaksi=".$id_transaksi;
        return $this->db->query($sql___);
    }
}