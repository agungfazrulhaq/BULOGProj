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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
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

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2">
              <img class="img-thumbnail" src="<?php echo base_url("dist/img/BULOG.jpg"); ?>"  alt="Logo Bulog">
          </div>
          <div class="col-7">
              <h1><b>Laporan Keuangan UB. OPASET <br>KANTOR WILAYAH SULAWESI SELATAN & BARAT</b></h1>
          </div>
          
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="btn btn-secondary btn-sm breadcrumb-item"><div id="clock"></div></li>
              
            </ol>
            <ul>
            <li class="btn btn-danger btn-sm breadcrumb-item">Powered By Pejantan Tangguh</li>
            </ul>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                    <input type="date" id="defaultForm-email" class="form-control validate" name="tanggal">
                  </div>

                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                    <select class="form-control select2" style="width: 100%;" name="aset">
                      <option selected="selected" value="null">Pilih Unit</option>
                      <?php foreach ($aset as $row_a){ ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                      <?php }?>
                    </select>
                  </div>

                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                    <select class="form-control select2" style="width: 100%;" name="kategori">
                      <option selected="selected" value="null">Pilih Kategori</option>
                      <?php foreach($kategori as $row_k){?>
                      <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
                    <textarea type="textarea" class="form-control validate" name="uraian"></textarea>
                  </div>

                  <div class="md-form mb-2">
                    <button class="btn btn-default btn-sm">Unggah</button>
                  </div>
                  

                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Jenis Transaksi</label>
                    <div class="custom-control custom-check">
                      <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="D">
                      <label for="customRadio1" class="custom-control-label" alignment="right">Debet</label>
                    </div>
                    <div class="custom-control custom-check">
                      <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="K">
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

                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-default">Simpan</button>
                </div>
              </div>
            </div>
          </div>
                      </form>
          <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalLoginForm">Tambah</button>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title ">
              Optimalisasi Assets
              <br>  
              </h3>
              
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
              <?php foreach($aset as $row_a){?>  
                <li class="nav-item">
                  <a href="<?php echo site_url("Home/showaset/".$row_a->id_aset."/0");?>" id="namaaset<?php echo $row_a->id_aset;?>" class="nav-link"> <?php echo $row_a->nama_aset; ?></a>
                </li>
              <?php } ?>
                <li class="nav-item active">
                <span class="input-group-text">
                <input class="form-control form-control-sm" type="text" placeholder="Tambah Assets">
                <button type="button" class="btn btn-success btn-sm ml-1"><i class="fas fa-plus"></i></button>
                </span>
                
              </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tahun</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle"></i>
                    2019
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle"></i> 2020
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle"></i>
                    2021
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <div class="btn-group dropdown">
                <button type="button" class="btn btn-dark btn-sm disabled">Dashboard</button>
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
                  <?php if (isset($curr_aset)){?>
                    <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/".$curr_aset."/1");?>">Januari</a>
                    <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/".$curr_aset."/2");?>">Februari</a>
                    <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/".$curr_aset."/3");?>">Maret</a>
                    <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/".$curr_aset."/4");?>">April</a>
                    <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/".$curr_aset."/5");?>">Mei</a>
                    <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/".$curr_aset."/6");?>">Juni</a>
                    <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/".$curr_aset."/7");?>">Juli</a>
                    <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/".$curr_aset."/8");?>">Agustus</a>
                    <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/".$curr_aset."/9");?>">September</a>
                    <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/".$curr_aset."/10");?>">Oktober</a>
                    <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/".$curr_aset."/11");?>">November</a>
                    <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/".$curr_aset."/12");?>">Desember</a>
                  <?php } 
                  
                  else{
                  ?>                    
                  <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/0/1");?>">Januari</a>
                  <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/0/2");?>">Februari</a>
                  <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/0/3");?>">Maret</a>
                  <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/0/4");?>">April</a>
                  <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/0/5");?>">Mei</a>
                  <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/0/6");?>">Juni</a>
                  <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/0/7");?>">Juli</a>
                  <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/0/8");?>">Agustus</a>
                  <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/0/9");?>">September</a>
                  <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/0/10");?>">Oktober</a>
                  <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/0/11");?>">November</a>
                  <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/0/12");?>">Desember</a>
                  
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
              <div class="card-tools">
                <div class="input-group input-group-sm mt-0">
                  <input type="text" class="form-control" id="myInput" placeholder="Search">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
              <div class="card-body">
                
                 <div class="col-sm-12">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload()"><i class="fas fa-sync-alt"></i></button>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Urutkan : </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Nama</a>
                      <a class="dropdown-item" href="#">Waktu</a>
                      <a class="dropdown-item" href="#">Saldo Terendah</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Waktu Sekarang</a>
                    </div>
                    <a href="<?php echo base_url();?>"><button class="btn btn-primary btn-sm" >Tampilkan Semua</button></a> 
                    <div class="float-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-dark btn-sm disabled">Impor Ke:</i></button>
                        <button type="button" class="btn btn-default btn-sm">PDF</i></button>
                        <button type="button" class="btn btn-default btn-sm">EXCEL</i></button>
                        <button type="button" class="btn btn-default btn-sm">SVG</i></button>
                      </div>
                    </div>
                 </div>
                 <table class="table table-hover table-sm"  style="text-align: center;" id="example1">
                  <thead class="" >
                    <tr>
                        <td class="col-0"></td>
                        <td class="col-0"></td>
                        <td><b>TANGGAL</b></td>
                        <td class="col-2"><b>REF</b></td>
                        <td class="col-2"><b>ASET</b></td>
                        <td><b>URAIAN</b></td>
                        <td></td>  
                        <td class="col-2"><b>SALDO</b></td>
                      
                    </tr>
                  </thead>
                  <?php foreach ($transaksi as $row_t){?>
                  <tbody id="myTable">
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="<?php echo $row_t->id_transaksi; ?>" id="check<?php echo $row_t->id_transaksi; ?>">
                        <label for="check<?php echo $row_t->id_transaksi; ?>"></label>
                      </div>
                    </td>
                    <td><a class="btn btn-primary btn-sm" style="color:white;" data-toggle="modal" data-target="#modalForm<?php echo $row_t->id_transaksi;?>">Lihat</a></td>
                    <td class=""><?php echo date('d', strtotime($row_t->tanggal)); ?></td>
                    <?php
                      $align="";
                      if(strpos($row_t->ref,"D") !== false){
                        $align="text-left pl-5";
                      }
                      else {
                        $align="text-right pr-5";
                      }
                    ?>
                    <td class="<?php echo $align; ?>">[ <?php echo $row_t->ref; ?> ]</td>
                    <td class=""><?php echo $row_t->nama_aset ?></td>
                    <td class="text-left"><?php $out = strlen($row_t->uraian) > 50 ? substr($row_t->uraian,0,50)."..." : $row_t->uraian; echo $out;  ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="text-left"><?php echo "Rp. " . number_format($row_t->saldo, 2, ",", "."); ?></td>
                  </tr>
                  <div class="modal fade" id="modalForm<?php echo $row_t->id_transaksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="card card-primary card-outline">
                              <div class="card-header">
                                <h3 class="card-title"><b>| <?php echo $row_t->ref;?> | </b><?php echo date('d F Y', strtotime($row_t->tanggal)); ?></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Kembali</span>
                                </button>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                  <h4><?php echo $row_t->nama_aset; ?></h4>
                                  <h3>DEBIT <b><?php echo "Rp. " . number_format($row_t->saldo, 2, ",", "."); ?></b>
                                    <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span></h3>
                                </div>
                                <div class="mailbox-read-message">
                                  <p><br><?php echo $row_t->uraian;  ?></p>
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
                              <!-- /.card-footer -->
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
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
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
<!-- InputMask -->
<script src="<?php echo base_url();?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
  <script>
  <?php 
                    if(isset($curr_aset)){
                    ?>
                      var bulanaktif = document.getElementById("namaaset<?php echo $curr_aset;?>"); 
                      bulanaktif.className += " btn- active";
                    <?php
                      }
                    ?>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      "searching": false,
      "paging": false,
      "info": false,
      "ordering": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
		<!--
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
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, " ");
});
//input saldo ke php


/* Fungsi formatRupiah */
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
