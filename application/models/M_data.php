<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{
    private $_tableaset = "tb_aset";
    private $_tablekategori = "tb_kategori";
    private $_tabletransaksi = "tb_transaksi";
    private $_tablekategori_lr = "tb_kategori_laba_rugi";

    public $tanggal;
    public $id_aset;
    public $id_kategori;
    public $saldo;
    public $uraian;
    public $ref;

    public function delete()
    {
        $post = $this->input->post();
        $id = $post['id_transaksi'];
        $que_file_existance = $this->db->query("SELECT * FROM files WHERE file_id_transaksi=".$id);
        if($que_file_existance->num_rows() == 1){
            $getFileex = $que_file_existance->row();
            $delfile__ = $this->db->query("DELETE FROM files WHERE file_id_transaksi=".$id);
            unlink($_SERVER['DOCUMENT_ROOT'] . '/OpasetBulog/upload/'.$getFileex->nama_file);
        }
        return $this->db->delete($this->_tabletransaksi, array("id_transaksi" => $id));
    }

    public function getAset()
    {
        return $this->db->get($this->_tableaset)->result();
    }

    public function getYears()
    {
        $sql = "SELECT DISTINCT YEAR(tanggal) as years FROM tb_transaksi ORDER BY YEAR(tanggal)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getKategori()
    {
        return $this->db->get($this->_tablekategori)->result();
    }

    public function getTransaksi()
    {
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                                    FROM tb_transaksi 
                                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori;");
        return $query->result();
    }

    public function getTransaksitoPdf()
    {
        $query = $this->db->query("SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                                    tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                                    FROM tb_transaksi 
                                    INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                                    INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori
                                    ORDER BY tb_transaksi.tanggal;");
        return $query->result();
    }

    public function addTransaksi()
    {
        $post = $this->input->post();

        $date_y = DateTime::createFromFormat("Y-m-d", $post['tanggal']);
        $month_ = $date_y->format('m');

        $looking_for_ref__query = $this->db->query("SELECT id_kategori,jenis_transaksi FROM tb_kategori INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi WHERE id_kategori=".$post['kategori']);
        $row_lfr = $looking_for_ref__query->row();
        if(isset($row_lfr)){
            if ($row_lfr->jenis_transaksi =="DEBIT") {
                $query_ref__ = $this->db->query("SELECT * FROM tb_transaksi 
                                                INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                WHERE jenis_transaksi='DEBIT';");
                $refangka = $query_ref__->num_rows()+1;
                for($i = 1;$i<=$refangka;$i++){
                    $currref = "D".$i;
                    $query_refgen = $this->db->query("SELECT * FROM tb_transaksi 
                                                    INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                    INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                    WHERE ref='".$currref."';");
                    $result_query_refgen = $query_refgen->num_rows();
                    if($result_query_refgen == 0){
                        $ref_ = $currref;
                        break;
                    }
                }
            } 
            else {
                $query_ref__ = $this->db->query("SELECT * FROM tb_transaksi 
                                                INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                WHERE jenis_transaksi='KREDIT';");
                $refangka = $query_ref__->num_rows()+1;
                for($i = 1;$i<=$refangka;$i++){
                    $currref = "K".$i;
                    $query_refgen = $this->db->query("SELECT * FROM tb_transaksi 
                                                    INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                    INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                    WHERE ref='".$currref."';");
                    $result_query_refgen = $query_refgen->num_rows();
                    if($result_query_refgen == 0){
                        $ref_ = $currref;
                        break;
                    }
                }
                
            }
        }
        $saldo_1 = str_replace(".", "", $post['saldo']);
        $saldo_ = str_replace(",", ".", $saldo_1);
        $saldo = floatval($saldo_);
        $year_ = $date_y->format('Y');
        return $this->db->query("INSERT INTO tb_transaksi(ref,tanggal,transaksi_id_aset,transaksi_id_kategori,uraian,saldo,tahun,transaksi_id_user) 
                                    VALUES('" . $ref_ . "','" . $post['tanggal'] . "','" . $post['aset'] . "','"
            . $post['kategori'] . "','" . $post['uraian'] . "','"
            . $saldo . "','" . $year_ . "',".$post['user_update'].")");
    }

    public function addAset()
    {
        $post = $this->input->post();
        $nama_aset = $post['nama_aset'];

        return $this->db->query("INSERT INTO tb_aset(nama_aset) VALUES('" . $nama_aset . "');");
    }

    public function rulesadd()
    {
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

    public function delcheck()
    {
        $delid = $post['checkdel'];
        $sql = "DELETE FROM tb_transaksi WHERE id_transaksi in ";
        $sql .= "('" . implode("','", array_values($post['checkdel'])) . "')";

        return $this->db->query($sql);
    }

    public function getAset_Transaksi_filter($id_aset,$monthdate,$yeardate){
        $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                FROM tb_transaksi 
                INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori ";
        if ($monthdate>0 and $monthdate<13 and $id_aset>0 and $yeardate>0){
            $sql .="WHERE tb_transaksi.transaksi_id_aset=".$id_aset." AND MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($monthdate>0 and $monthdate<13 and $id_aset>0){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13 and $yeardate>0){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($yeardate>0 and $id_aset>0){
            $sql .="WHERE YEAR(tb_transaksi.tanggal)=".$yeardate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate;
        }
        else if($yeardate>0){
            $sql .="WHERE YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else{
            $sql .="WHERE tb_transaksi.transaksi_id_aset=".$id_aset;
        }

        $sql_ = $this->db->query($sql);
        return $sql_->result();
    }

    public function getAset_Transaksi_filter_toPdf($id_aset,$monthdate,$yeardate){
        $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
                tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
                FROM tb_transaksi 
                INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
                INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori ";
        if ($monthdate>0 and $monthdate<13 and $id_aset>0 and $yeardate>0){
            $sql .="WHERE tb_transaksi.transaksi_id_aset=".$id_aset." AND MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($monthdate>0 and $monthdate<13 and $id_aset>0){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13 and $yeardate>0){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate." AND YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else if($yeardate>0 and $id_aset>0){
            $sql .="WHERE YEAR(tb_transaksi.tanggal)=".$yeardate." AND tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        else if($monthdate>0 and $monthdate<13){
            $sql .="WHERE MONTH(tb_transaksi.tanggal)=".$monthdate;
        }
        else if($yeardate>0){
            $sql .="WHERE YEAR(tb_transaksi.tanggal)=".$yeardate;
        }
        else{
            $sql .="WHERE tb_transaksi.transaksi_id_aset=".$id_aset;
        }
        $sql .=" ORDER BY tb_transaksi.tanggal"; 

        $sql_ = $this->db->query($sql);
        return $sql_->result();
    }

    public function getall_Transaksi()
    {
        // $sql = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tanggal, tb_transaksi.ref, tb_transaksi.uraian, 
        // tb_transaksi.saldo, tb_kategori.nama_kategori, tb_aset.nama_aset 
        // FROM tb_transaksi 
        // INNER JOIN tb_aset ON tb_transaksi.transaksi_id_aset=tb_aset.id_aset 
        // INNER JOIN tb_kategori ON tb_transaksi.transaksi_id_kategori=tb_kategori.id_kategori;";

        $this->datatables->select('id_transaksi,tanggal,ref,uraian,saldo,nama_kategori,nama_aset,transaksi_id_aset,transaksi_id_kategori,waktuupdate,nama_kat_lr,nama_file,ukuran_file,nama,nip');
        $this->datatables->from('tb_transaksi');
        $this->datatables->join('tb_kategori', "transaksi_id_kategori = id_kategori");
        $this->datatables->join('tb_aset', "transaksi_id_aset = id_aset");
        $this->datatables->join('tb_kategori_laba_rugi',"id_kat_laba_rugi = id_kat_lr_kat");
        $this->datatables->join('files',"id_transaksi = file_id_transaksi",'left');
        $this->datatables->join('tb_user',"transaksi_id_user = id_user",'left');

        // $buttons = '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>'
        $this->datatables->add_column('view', '<div class="btn-group">
        <button class="btn btn-info btn-sm viewdata" data-toggle="modal"  data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$9" data-uraian="$5" data-ref="$6" data-saldo="$7" data-time="$9" data-lr="$10" data-nkat="$11" data-namfile="$12" data-sizefile="$13" data-user="$14" data-nip="$15">
        <i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom" title="Lihat"></i></button>

        <button type="button" class="btn btn-warning btn-sm data_update" data-toggle="modal" data-target="#modalUpdate" data-id="$1" data-tanggal="$2" data-aset="$3" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7" >
          <i class="fas fa-edit" style="color:white;" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i>
        </button>
        
        <button type="button" class="btn btn-danger btn-sm deletedata" data-toggle="modal" data-target="#modaldel" data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7">
          <i class="fas fa-trash" data-toggle="tooltip" data-placement="right" title="Hapus"></i>
        </button>
        </div>', 'id_transaksi,tanggal,transaksi_id_aset,transaksi_id_kategori,uraian,ref,saldo,nama_aset,waktuupdate,nama_kat_lr,nama_kategori,nama_file,ukuran_file,nama,nip');

        $this->datatables->add_column('file_check','<span class="hiddencheck$2"><i class="fas fa-check" ></i></span>','id_transaksi,ukuran_file');
        // $sql_ = $this->db->query($sql);
        return $this->datatables->generate();
    }

    public function getAset_Transaksi($id_aset, $monthdate, $yeardate)
    {
        $this->datatables->select('id_transaksi,tanggal,ref,uraian,saldo,nama_kategori,nama_aset,transaksi_id_aset,transaksi_id_kategori,waktuupdate,nama_kat_lr,nama_file,ukuran_file,nama,nip');
        $this->datatables->from('tb_transaksi');
        $this->datatables->join('tb_kategori', "transaksi_id_kategori = id_kategori");
        $this->datatables->join('tb_aset', "transaksi_id_aset = id_aset");
        $this->datatables->join('tb_kategori_laba_rugi',"id_kat_laba_rugi = id_kat_lr_kat");
        $this->datatables->join('files',"id_transaksi = file_id_transaksi",'left');
        $this->datatables->join('tb_user',"transaksi_id_user = id_user",'left');

        // $buttons = '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>'
        // $sql_ = $this->db->query($sql);
        if ($monthdate > 0 and $monthdate < 13 and $id_aset > 0 and $yeardate > 0) {
            $key_cond_where = ['MONTH(tanggal)' => $monthdate, 'transaksi_id_aset' => $id_aset, 'YEAR(tanggal)' => $yeardate];
            $this->datatables->where($key_cond_where);
        } else if ($monthdate > 0 and $monthdate < 13 and $id_aset > 0) {
            $key_cond_where = ['MONTH(tanggal)' => $monthdate, 'transaksi_id_aset' => $id_aset];
            $this->datatables->where($key_cond_where);
        } else if ($monthdate > 0 and $monthdate < 13 and $yeardate > 0) {
            $key_cond_where = ['MONTH(tanggal)' => $monthdate, 'YEAR(tanggal)' => $yeardate];
            $this->datatables->where($key_cond_where);
        } else if ($yeardate > 0 and $id_aset > 0) {
            $key_cond_where = ['transaksi_id_aset' => $id_aset, 'YEAR(tanggal)' => $yeardate];
            $this->datatables->where($key_cond_where);
        } else if ($monthdate > 0 and $monthdate < 13) {
            $key_cond_where = ['MONTH(tanggal)' => $monthdate];
            $this->datatables->where($key_cond_where);
        } else if ($yeardate > 0) {
            $key_cond_where = ['YEAR(tanggal)' => $yeardate];
            $this->datatables->where($key_cond_where);
        } else {
            $key_cond_where = ['transaksi_id_aset' => $id_aset];
            $this->datatables->where($key_cond_where);
        }

        $this->datatables->add_column('view', '<div class="btn-group">
        <button class="btn btn-info btn-sm viewdata" data-toggle="modal"  data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$9" data-uraian="$5" data-ref="$6" data-saldo="$7" data-time="$9" data-lr="$10" data-nkat="$11" data-namfile="$12" data-sizefile="$13" data-user="$14" data-nip="$15">
        <i class="fas fa-eye" data-toggle="tooltip" data-placement="bottom" title="Lihat"></i></button>

        <button type="button" class="btn btn-warning btn-sm data_update" data-toggle="modal" data-target="#modalUpdate" data-id="$1" data-tanggal="$2" data-aset="$3" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7" >
          <i class="fas fa-edit" style="color:white;" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i>
        </button>
        
        <button type="button" class="btn btn-danger btn-sm deletedata" data-toggle="modal" data-target="#modaldel" data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7">
          <i class="fas fa-trash" data-toggle="tooltip" data-placement="right" title="Hapus"></i>
        </button>
        </div>', 'id_transaksi,tanggal,transaksi_id_aset,transaksi_id_kategori,uraian,ref,saldo,nama_aset,waktuupdate,nama_kat_lr,nama_kategori,nama_file,ukuran_file,nama,nip');
        $this->datatables->add_column('file_check','<span class="hiddencheck$2"><i class="fas fa-check" ></i></span>','id_transaksi,ukuran_file');
        // $sql_ = $this->db->query($sql);
        return $this->datatables->generate();
    }

    public function updateTransaksi()
    {
        $post = $this->input->post();

        $date_y = DateTime::createFromFormat("Y-m-d", $post['tanggal']);
        $month_ = $date_y->format('m');
        $id_transaksi = $post['id_transaksi'];

        $looking_for_ref__query = $this->db->query("SELECT id_kategori,jenis_transaksi FROM tb_kategori INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi WHERE id_kategori=".$post['kategori']);
        $row_lfr = $looking_for_ref__query->row();
        if(isset($row_lfr)){
            if ($row_lfr->jenis_transaksi =="DEBIT") {
                $query_ref__ = $this->db->query("SELECT * FROM tb_transaksi 
                                                INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                WHERE jenis_transaksi='DEBIT';");
                $refangka = $query_ref__->num_rows()+1;
                for($i = 1;$i<=$refangka;$i++){
                    $currref = "D".$i;
                    $query_refgen = $this->db->query("SELECT * FROM tb_transaksi 
                                                    INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                    INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                    WHERE ref='".$currref."';");
                    $result_query_refgen = $query_refgen->num_rows();
                    if($result_query_refgen == 0){
                        $ref_ = $currref;
                        break;
                    }
                }
            } 
            else {
                $query_ref__ = $this->db->query("SELECT * FROM tb_transaksi 
                                                INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                WHERE jenis_transaksi='KREDIT';");
                $refangka = $query_ref__->num_rows()+1;
                for($i = 1;$i<=$refangka;$i++){
                    $currref = "K".$i;
                    $query_refgen = $this->db->query("SELECT * FROM tb_transaksi 
                                                    INNER JOIN tb_kategori ON transaksi_id_kategori=id_kategori
                                                    INNER JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi
                                                    WHERE ref='".$currref."';");
                    $result_query_refgen = $query_refgen->num_rows();
                    if($result_query_refgen == 0){
                        $ref_ = $currref;
                        break;
                    }
                }
                
            }
        }

        $saldo = $post['saldo'];
        $year_ = $date_y->format('Y');
        $sql___ = "UPDATE tb_transaksi 
                    SET ref ='" . $ref_ . "' , tanggal = '" . $post['tanggal'] . "' , transaksi_id_aset = '" . $post['aset'] . "',
                    transaksi_id_kategori = '" . $post['kategori'] . "',uraian = '" . $post['uraian'] . "',saldo = " . $saldo . ", tahun = '" . $year_ . "'
                    ,transaksi_id_user = ".$post['user_update']."
                    WHERE id_transaksi=" . $id_transaksi;
        return $this->db->query($sql___);
    }

    public function uploadFile(){
        $post = $this->input->post();
        if(!empty($_FILES['file_transaksi']['name'])){
            $que_file_existance = $this->db->query("SELECT * FROM files where file_id_transaksi=".$post['id_transaksi']);
            if($que_file_existance->num_rows() == 1){
                $getFileex = $que_file_existance->row();
                unlink($_SERVER['DOCUMENT_ROOT'] . '/OpasetBulog/upload/'.$getFileex->nama_file);
                $delfile__ = $this->db->query("DELETE FROM files WHERE file_id_transaksi=".$post['id_transaksi']);
            }

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/OpasetBulog/upload/';
            $uploadfile = $uploaddir.basename($_FILES['file_transaksi']['name']);
            $allowedExts = array(".pdf",".jpg",".png","jpeg");
            $namafile = $_FILES['file_transaksi']['name'];
            if(move_uploaded_file($_FILES['file_transaksi']['tmp_name'],$uploadfile)){
                $queryUpload = "INSERT INTO files(file_id_transaksi,nama_file,ukuran_file)
                                VALUES(".$post['id_transaksi'].",'".$_FILES['file_transaksi']['name']."','".$_FILES['file_transaksi']['size']."')";
                $this->db->query($queryUpload);
            }
        }
    }

    public function getFiles(){
        $files___ = $this->db->query("SELECT * FROM files");
        return $files___->result();
    }

    public function getFilesbyId($id_transaksi){
        $files___ = $this->db->query("SELECT * FROM files WHERE id_transaksi=".$id_transaksi);
        $hasil = $files___->result();
        $htmlcode__ = "";
        foreach($hasil as $row_files){
            $htmlcode__ .= "
                            <li id='elemfile1'>
                            <span class='mailbox-attachment-icon'><i class='far fa-file-pdf'></i></span>
                                <div class='mailbox-attachment-info'>
                                <i class='fas fa-paperclip'></i> <span id='nama_file'>".$row_files->nama_file."</spin>
                                <span class='mailbox-attachment-size clearfix mt-1'>
                                    <span>".$row_files->ukuran_file." Bytes</span>
                                    <a href='#' class='btn btn-default btn-sm float-right'><i class='fas fa-cloud-download-alt'></i></a>
                                </span>
                                </div>
                            </li>
                            ";
        }
        return $htmlcode_;
    }

    public function deleteAset(){
        $post = $this->input->post();
        $id = $post['id_aset'];
        return $this->db->delete($this->_tableaset, array("id_aset" => $id));
    }

    public function addCategory(){
        $post = $this->input->post();
        $nama_kat_lr = $post['nama_kat_lr'];
        $nama_kat = $post['nama_kategori'];
        $jen_tran = $post['jenis_transaksi_kat'];
        $jen_laba = $post['laba'];

        if($jen_tran == "D"){
            $jenis_transaksi__ = "DEBIT";
        }
        else{
            $jenis_transaksi__ = "KREDIT";
        }

        $cari_name_lr = strtolower($nama_kat_lr);
        $query_kat__ = $this->db->query("SELECT * FROM tb_kategori_laba_rugi WHERE nama_kat_lr='".$cari_name_lr."';");
        if($query_kat__->num_rows()==0){
            $this->db->query("INSERT INTO tb_kategori_laba_rugi(nama_kat_lr,jenis_transaksi,jenis_laba_rugi) VALUES('".$cari_name_lr."','".$jenis_transaksi__."','".$jen_laba."')");
        }
        $result_id_kat = $this->db->query("SELECT id_kat_laba_rugi FROM tb_kategori_laba_rugi WHERE nama_kat_lr='".$cari_name_lr."'");
        $id_kat___ = $result_id_kat->row();
        if(isset($id_kat___)){
            return $this->db->query("INSERT INTO tb_kategori(nama_kategori,id_kat_lr_kat) VALUES('".$nama_kat."','".$id_kat___->id_kat_laba_rugi."');");
        }
    }

    public function getAllCat(){
        $allcat = $this->db->query("SELECT * FROM tb_kategori_laba_rugi");
        
        return $allcat->result();
    }

    public function deleteCat(){
        $post = $this->input->post();
        $id = $post['id_kategori'];
        return $this->db->delete($this->_tablekategori, array("id_kategori" => $id));
    }

    public function deleteCat_lr(){
        $post = $this->input->post();
        $id = $post['id_kategori_lr'];
        return $this->db->delete($this->_tablekategori_lr, array("id_kat_laba_rugi" => $id));
    }

    public function delFile($id_transaksi){
        $que_file_existance = $this->db->query("SELECT * FROM files where file_id_transaksi=".$id_transaksi);
        if($que_file_existance->num_rows() == 1){
            $getFileex = $que_file_existance->row();
            unlink($_SERVER['DOCUMENT_ROOT'] . '/OpasetBulog/upload/'.$getFileex->nama_file);
            $delfile__ = $this->db->query("DELETE FROM files WHERE file_id_transaksi=".$id_transaksi);
        }
    }

    public function getRpPerCat($id_kategori){
        $query__ = "SELECT SUM(saldo) as rp, transaksi_id_aset 
                    FROM tb_transaksi WHERE transaksi_id_kategori=".$id_kategori." 
                    GROUP BY transaksi_id_aset";
        $query = $this->db->query($query__);
        return $query->result();
    }

    public function getLRTransaksi(){
        $query = $this->db->query('SELECT SUM(saldo) as rp, transaksi_id_aset as aid, transaksi_id_kategori as kid, jenis_transaksi
                                    FROM tb_transaksi 
                                    LEFT JOIN tb_kategori ON transaksi_id_kategori=id_kategori 
                                    LEFT JOIN tb_kategori_laba_rugi ON id_kat_lr_kat=id_kat_laba_rugi 
                                    GROUP BY transaksi_id_aset, transaksi_id_kategori');
        return $query->result();
    }

}
