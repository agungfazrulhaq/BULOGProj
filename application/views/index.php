<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opaset</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css')?>">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
   <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css')?>">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css')?>">
   <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
   <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
   <!-- Bootstrap4 Duallistbox -->
   <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css')?>">
</head>
<body class="layout-top-nav" style="height: auto;">
<script>
</script>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2">
              <img class="img-fluid" src="<?php echo base_url("dist/img/BULOG.png"); ?>"  alt="Logo Bulog">
          </div>
          <div class="col-7">
            <div class="text-center">
              <h1><b>Laporan Keuangan UB. OPASET <br>KANTOR WILAYAH SULAWESI SELATAN & BARAT</b></h1>
            </div>
          </div>
          <div class="col-3">
          <div class="info-box mb-0">
              <div class="info-box-content">
                <span class="info-box-text">Muhammad Fachrizal Ramdani</span>
                <span class="info-box-number">NIP : 1103174125</span>
              </div>
              <span class="info-box-icon bg-default"><img class="" src="<?php echo base_url();?>/dist/img/pict.jpg" alt="photo"></span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <?php if ($this->session->flashdata('success')): ?>
        <div class="toast-message"><?php echo $this->session->flashdata('success'); ?></div>
		<?php endif; ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <form action="<?php echo site_url('Home/add') ?>" method="post" enctype="multipart/form-data" >
                <div class="modal-header text-center">
                  <h4 class="modal-title font-weight-bold">Masukkan Data [Transaksi]</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-2">
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Tanggal</label>
                    <input type="date" id="defaultForm-email" class="form-control validate" name="tanggal" required>
                  </div>
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                    <select class="form-control select2" style="width: 100%;" name="aset" required>
                      <option selected="selected" value="">Pilih Unit</option>
                      <?php foreach ($aset as $row_a){ ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                    <select class="form-control select2" style="width: 100%;" name="kategori" required>
                      <option selected="selected" value="">Pilih Kategori</option>
                      <?php foreach($kategori as $row_k){?>
                      <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
                    <textarea type="textarea" class="form-control validate" name="uraian" required></textarea>
                  </div>
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Jenis Transaksi</label>
                    <div class="custom-control custom-check">
                      <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="D" required>
                      <label for="customRadio1" class="custom-control-label" alignment="right">Debet</label>
                    </div>
                    <div class="custom-control custom-check">
                      <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="K" required>
                      <label for="customRadio2" class="custom-control-label">Kredit</label>
                    </div>
                  </div>
                  
                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Jumlah</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Rp.</i></span>
                      </div>
                      <input type="text" id="rupiah" class="form-control" name="saldo">
                    </div>
                  </div>
                  <div class="md-form mb-2">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" value="Unggah">
                        <label class="custom-file-label" for="exampleInputFile">Masukan Bukti Pembayaran</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-info">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
          <button type="button" class="btn btn-info btn-block mb-3" data-toggle="modal" data-target="#modalLoginForm">Tambah</button>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title "><b>
              Optimalisasi Aset</b><br></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
              <?php foreach($aset as $row_a){?>
                <?php 
                $link_showaset = "Home/showaset/";
                if(isset($curr_month) and isset($curr_year)){
                  $link_showaset .=$row_a->id_aset."/".$curr_month."/".$curr_year;
                }
                else if(isset($curr_month)){ 
                  $link_showaset .=$row_a->id_aset."/".$curr_month."/0";
                } 
                else{ 
                  $link_showaset .=$row_a->id_aset."/0/0";
                }
                ?>
                <li class="nav-item">
                  <a href="<?php echo site_url($link_showaset);?>" id="namaaset<?php echo $row_a->id_aset;?>" style="border-radius:0px;" class="nav-link"> <?php echo $row_a->nama_aset; ?></a>
                </li>
                <li class="nav-item"></li>
             <?php } ?>
              </ul>
              </div>
              <form action="<?php echo site_url("Home/addaset"); ?>" method="post" enctype="multipart/form-data">
              <div class="input-group pt-1 pb-1 pl-1 pr-1">
                  <input type="text" class="form-control" type="text" placeholder="Tambah Aset" name="nama_aset" required>
                  <span class="input-group-append">
                  <button type="submit" class="btn btn-info" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
                  </span>
              </div>
              </form>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekap Tahun</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <?php
                  $year_filt = "Home/showaset/"; 
                  if(isset($curr_aset) and isset($curr_month)){
                    $year_filt.=$curr_aset."/".$curr_month."/";
                  }
                  else if(isset($curr_month)){
                    $year_filt.="0/".$curr_month."/";
                  }
                  else{
                    $year_filt.="0/0/";
                  }
                ?>
                <?php foreach($datatahun as $year_row){?>
                <li class="nav-item">
                  <a href="<?php echo site_url($year_filt.$year_row->years);?>" class="nav-link" id="ftahun">
                    <?php echo $year_row->years;?>
                  </a>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <div class="btn-group dropdown">
                <button type="button" class="btn btn-dark btn-sm toastrDefaultInfo">Dashboard</button>
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php 
                      if(isset($curr_month)){
                        if($curr_month==0){
                          echo "BULAN";
                        }
                        else if($curr_month==1){
                          echo "Januari";
                        }
                        else if($curr_month==2){
                          echo "Februari";
                        }
                        else if($curr_month==3){
                          echo "Maret";
                        }
                        else if($curr_month==4){
                          echo "April";
                        }
                        else if($curr_month==5){
                          echo "Mei";
                        }
                        else if($curr_month==6){
                          echo "Juni";
                        }
                        else if($curr_month==7){
                          echo "Juli";
                        }
                        else if($curr_month==8){
                          echo "Agustus";
                        }
                        else if($curr_month==9){
                          echo "September";
                        }
                        else if($curr_month==10){
                          echo "Oktober";
                        }
                        else if($curr_month==11){
                          echo "November";
                        }
                        else if($curr_month==12){
                          echo "Desember";
                        }
                      }
                      else {
                        echo "BULAN";
                      }
                    ?>
                  </button>
                  <div class="dropdown-menu">
                  <?php if (isset($curr_aset) and isset($curr_year)){?>
                    <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/".$curr_aset."/1/".$curr_year);?>">Januari</a>
                    <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/".$curr_aset."/2/".$curr_year);?>">Februari</a>
                    <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/".$curr_aset."/3/".$curr_year);?>">Maret</a>
                    <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/".$curr_aset."/4/".$curr_year);?>">April</a>
                    <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/".$curr_aset."/5/".$curr_year);?>">Mei</a>
                    <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/".$curr_aset."/6/".$curr_year);?>">Juni</a>
                    <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/".$curr_aset."/7/".$curr_year);?>">Juli</a>
                    <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/".$curr_aset."/8/".$curr_year);?>">Agustus</a>
                    <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/".$curr_aset."/9/".$curr_year);?>">September</a>
                    <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/".$curr_aset."/10/".$curr_year);?>">Oktober</a>
                    <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/".$curr_aset."/11/".$curr_year);?>">November</a>
                    <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/".$curr_aset."/12/".$curr_year);?>">Desember</a>
                  <?php } 
                  
                  else if(isset($curr_aset)){
                  ?>                    
                    <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/".$curr_aset."/1/0");?>">Januari</a>
                    <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/".$curr_aset."/2/0");?>">Februari</a>
                    <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/".$curr_aset."/3/0");?>">Maret</a>
                    <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/".$curr_aset."/4/0");?>">April</a>
                    <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/".$curr_aset."/5/0");?>">Mei</a>
                    <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/".$curr_aset."/6/0");?>">Juni</a>
                    <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/".$curr_aset."/7/0");?>">Juli</a>
                    <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/".$curr_aset."/8/0");?>">Agustus</a>
                    <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/".$curr_aset."/9/0");?>">September</a>
                    <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/".$curr_aset."/10/0");?>">Oktober</a>
                    <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/".$curr_aset."/11/0");?>">November</a>
                    <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/".$curr_aset."/12/0");?>">Desember</a>                  
                  <?php
                  }
                  else{
                  ?>                    
                  <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/0/1/0");?>">Januari</a>
                  <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/0/2/0");?>">Februari</a>
                  <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/0/3/0");?>">Maret</a>
                  <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/0/4/0");?>">April</a>
                  <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/0/5/0");?>">Mei</a>
                  <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/0/6/0");?>">Juni</a>
                  <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/0/7/0");?>">Juli</a>
                  <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/0/8/0");?>">Agustus</a>
                  <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/0/9/0");?>">September</a>
                  <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/0/10/0");?>">Oktober</a>
                  <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/0/11/0");?>">November</a>
                  <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/0/12/0");?>">Desember</a>
                  
                  <?php
                  }
                  ?>
                  </div>
                  <script>
                    <?php 
                      if(isset($curr_month)){
                    ?>
                      var bulanaktif = document.getElementById("month<?php echo $curr_month;?>"); 
                      bulanaktif.className += " active";
                    <?php
                      }
                    ?>
                  </script>
                </div>  
              </b></h3>
              <a href="<?php echo base_url();?>" ><button class="btn btn-info btn-sm ml-2" data-toggle="tooltip" title="Perlihatkan Semua Data">View All</button></a>
              <div class="card-tools">
                <div class="input-group input-group-sm mt-0"> 
                <span class="btn btn-dark btn-sm breadcrumb-item mr-1"><div id="clock"></div></span>
                <span class="btn btn-danger btn-sm toastrDefaultError" data-toggle="tooltip" data-placement="bottom" title="Keluar">Log Out</span>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
              <div class="card-body">
                 <table class="table table-hover table-sm"  style="text-align: center;" id="example1">
                  <thead class="" >
                    <tr>
                        <td><b>AKSI</b></td>
                        <td><b>TANGGAL</b></td>
                        <td><b>REF</b></td>
                        <td><b>ASET</b></td>
                        <td><b>URAIAN</b></td>
                        <td></td>  
                        <td><b>SALDO</b></td>
                    </tr>
                    <tfoot class="" >
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Total Saldo = </b></td>
                        <?php 
                        $total_saldo = 0;
                        foreach($transaksi as $t_row){
                          if(strpos($t_row->ref,"D")!== false){
                            $total_saldo = $total_saldo + $t_row->saldo;
                          }
                          else {
                            $total_saldo = $total_saldo - $t_row->saldo;
                          }
                        }  
                        ?>
                        <td></td>  
                        <td class="text-left"><b><?php echo "Rp. " . number_format($total_saldo, 2, "." , ","); ?></b></td>
                    </tr>
                  </thead>
                  <?php foreach ($transaksi as $row_t){?>
                  <tbody>
                  <tr>
                    <td>
                    <div class="btn-group">
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalForm<?php echo $row_t->id_transaksi;?>">Lihat</button>
                      <a href="<?php echo site_url('Home/del/'.$row_t->id_transaksi); ?>" style="color:white;" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash"></i></a>
                    </div>
                    </td>
                    <td class=""><?php echo date('d-F-Y', strtotime($row_t->tanggal)); ?></td>
                    <?php
                      $align="";
                      if(strpos($row_t->ref,"D") !== false){
                        $align="text-left pl-2";
                      }
                      else {
                        $align="text-right pr-2";
                      }
                    ?>
                    <td class="<?php echo $align; ?>">[ <?php echo $row_t->ref; ?> ]</td>
                    <td class=""><?php echo $row_t->nama_aset ?></td>
                    <td class="text-left">  <?php $out = strlen($row_t->uraian) > 50 ? substr($row_t->uraian,0,50)."..." : $row_t->uraian; echo $out;  ?></td>
                    <td class="mailbox-attachment"></td>
                    <td class="text-left"><?php echo "Rp. " . number_format($row_t->saldo, 2, ".", ","); ?></td>
                  </tr>
                  <div class="modal fade" id="modalForm<?php echo $row_t->id_transaksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                <span class="btn btn-default"><b>| <?php echo $row_t->ref;?> | </b><?php echo date('d F Y', strtotime($row_t->tanggal)); ?></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Kembali</span>
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                <h3>DEBIT <b><?php echo "Rp. " . number_format($row_t->saldo, 2, ",", "."); ?></b>
                                    <span class="mailbox-read-time float-right text-right text-info">
                                    User : Muhammad Fachrizal Ramdani <br>  
                                    15 Feb. 2015 <br>
                                    11:03 PM</span></h3>
                                  <h4><?php echo $row_t->nama_aset; ?></h4>
                                </div>
                                <div class="mailbox-read-message">
                                  <p>&emsp;&emsp;<?php echo $row_t->uraian;  ?></p>
                                </div>
                                <!-- /.mailbox-read-message -->
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer bg-white">
                                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                  <li>
                                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                  
                                    <div class="mailbox-attachment-info">
                                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                                          <span class="mailbox-attachment-size clearfix mt-1">
                                            <span>1,245 KB</span>
                                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                          </span>
                                    </div>
                                  </li>
                                  <li>
                                    <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>
                  
                                    <div class="mailbox-attachment-info">
                                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                                          <span class="mailbox-attachment-size clearfix mt-1">
                                            <span>1,245 KB</span>
                                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                          </span>
                                    </div>
                                  </li>
                                  <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="dist/img/photo1.png" alt="Attachment"></span>
                  
                                    <div class="mailbox-attachment-info">
                                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                                          <span class="mailbox-attachment-size clearfix mt-1">
                                            <span>2.67 MB</span>
                                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                          </span>
                                    </div>
                                  </li>
                                  <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="dist/img/photo2.png" alt="Attachment"></span>
                  
                                    <div class="mailbox-attachment-info">
                                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                                          <span class="mailbox-attachment-size clearfix mt-1">
                                            <span>1.9 MB</span>
                                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                          </span>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.card-footer -->
                              <div class="card-footer">
                                <div class="float-right">
                                  <button type="button" class="btn  bg-gradient-warning "><i class="fas fa-share"></i> UBAH</button>
                                </div>
                                <a href="<?php echo site_url('Home/del/'.$row_t->id_transaksi); ?>"><button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> HAPUS</button></a>
                                <button type="button" class="btn btn-default"><i class="fas fa-print"></i> CETAK</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url();?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>plugins/toastr/toastr.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<script>
  $('.toastrDefaultInfo').click(function() {
      toastr.success('Data Berhasil Di Tambahkan <a href="#">Lihat Data</a>')
    });
  
  $('.toastrDefaultError').click(function() {
      toastr.error('Data Gagal Di Tambahkan ')
    });

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<script>
  <?php 
                    if(isset($curr_aset)){
                    ?>
                      var bulanaktif = document.getElementById("namaaset<?php echo $curr_aset;?>"); 
                      bulanaktif.className += " btn-info  active";
                    <?php
                      }
                    ?>
<?php 
                    if(isset($curr_year)){
                    ?>
                      var tahunaktif = document.getElementById("ftahun<?php echo $curr_year;?>"); 
                      tahunaktif.className += " btn-info  active";
                    <?php
                      }
                    ?>

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      "searching": true,
      "paging": true,
      "info": true,
      "ordering": true,
    });
  });
</script>

<script type="text/javascript">
		function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var curr_hour = today.getHours();
		    var curr_minute = today.getMinutes();
		    var curr_second = today.getSeconds();
		    if (curr_hour < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (curr_hour == 0) {
		        curr_hour = 12;
		    }
		    if (curr_hour > 12) {
		        curr_hour = curr_hour - 12;
		    }
		    curr_hour = checkTime(curr_hour);
		    curr_minute = checkTime(curr_minute);
		    curr_second = checkTime(curr_second);
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		    }
 
		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);
		//-->
		</script>
		<script type='text/javascript'>
			<!--
			var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth();
			var thisDay = date.getDay(),
			    thisDay = myDays[thisDay];
			var yy = date.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
			document.getElementById('hari').innerHTML=months[month] + ' ' + year;
			//-->
</script>
    
<script>
  $(function () {

      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })

  var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, " ");
});
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? " " + rupiah : "";
}
</script>
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
</body>
</html>
