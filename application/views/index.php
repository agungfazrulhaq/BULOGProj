<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OPASET KANWIL SULSELBAR</title>
  <link rel="icon" href="<?php echo base_url('dist/img/Logo.png') ?>" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css') ?>">
</head>
<style>
  .page-item.active .page-link {
    background-color: #17a2b8 !important;
    border: 1px solid #17a2b8;
  }

  .page-link {
    color: black !important;
  }

  
</style>

<body class="layout-top-nav" style="height: auto;">

  <!-- ALL Modal Control -->
  <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="card card-info card-outline">
          <div class="card-header">
            <span id="refview"><b> REF </b></span> | <span id="tanggalview">Tanggal</span>
          </div>

          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h3><span id="jenistransaksiview">DEBIT</span> <b>&nbsp;Rp. <span id="saldoview">Saldo</span></b>
                <span class="mailbox-read-time float-right text-right text-info">
                  Dibuat oleh => User : Muhammad Fachrizal Ramdani <br>
                  Tanggal => 15 Feb. 2015 <br>
                  Jam => 11:03 PM
                  Ket => Tanggal Pembuatan Laporan (Timestamp)
                </span>
              </h3>
              <h4 id="asetview">ASETNYA APA</h4>
            </div>

            <div class="mailbox-read-message">
              <p id="uraianview">&emsp;&emsp;URAIANNYA APA</p>
              <br>
            </div>

            <div class="card-footer bg-white">
              <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> File yang di sertakan.pdf</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                      <span>1,245 KB</span>
                      <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
                  </div>
                </li>
              </ul>
            </div>

            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <form action="<?php echo site_url('Home/update/') ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Ubah Data [Transaksi]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-2">
                <div class="md-form mb-2">
                  <input type="hidden" id="id_transaksi" class="form-control validate" name="id_transaksi">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Tanggal</label>
                  <input type="date" id="formupdatetanggal" class="form-control validate" name="tanggal" value="" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                  <select class="form-control custom-select" style="width: 100%;" id="selectaset" name="aset" required>
                    <?php foreach ($aset as $row_a) { ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                  <select class="form-control custom-select" style="width: 100%;" id="selectkategori" name="kategori" required>
                    <?php foreach ($kategori as $row_k) { ?>
                      <?php ?>
                      <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
                  <textarea type="textarea" class="form-control validate" name="uraian" value="" required></textarea>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Jenis Transaksi</label>
                  <select class="custom-select" style="width: 100%;" id="selectJenis" name="customRadio" required>
                    <option value="D">Debit</option>
                    <option value="K">Kredit</option>
                  </select>
                </div>

                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Jumlah</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="">Rp.</i></span>
                    </div>
                    <input type="number" id="rupiahupdate" class="form-control rupiah" name="saldo" value="" step="0.0001">
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
                <input type="submit" class="btn btn-info" value="simpan">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Cetak Laporan Keuangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-2">
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="jenislaporan">Jenis Laporan</label>
                  <select class="form-control custom-select" style="width: 100%;" id="jenislaporan" name="customRadio" required>
                    <option value="null" selected>Pilih Jenis Laporan</option>
                    <option value="mutasi" >Laporan Mutasi Kas Aset</option>
                    <option value="mutasi">Jurnal Laporan Mutasi Kas Aset</option>
                    <option value="laba">Laporan Laba Rugi</option>
                    <option value="neraca">Laporan Neraca</option>
                  </select>
                </div>
              <div id="UB">
                <div class="md-form mb-2">
                <label data-error="wrong" data-success="right" for="aset">Unit Bisnis</label>
                  <select class="form-control custom-select" id="aset" style="width: 100%;" name="aset" required>
                  <option selected="selected" value="">Pilih Unit</option>
                  <?php foreach ($aset as $row_a) { ?>
                           <option value='<?php echo $row_a->id_aset; ?>'><?php echo $row_a->nama_aset; ?></option>
                          <?php } ?>
                  </select>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="bulan">Bulan</label>
                  <select class="form-control select2" style="width: 100%;" id="bulan" name="customRadio" required>
                    <option value="">Pilih Bulan</option>
                    <option value="">1 Tahun</option>
                    <option value="">Januari</option>
                    <option value="">Februari</option>
                    <option value="">Maret</option>
                    <option value="">April</option>
                    <option value="">Mei</option>
                    <option value="">Juni</option>
                    <option value="">Juli</option>
                    <option value="">Agustus</option>
                    <option value="">September</option>
                    <option value="">Oktober</option>
                    <option value="">Nopember</option>
                    <option value="">Desember</option>
                  </select>
                </div>
                </div>
            <div id="BL">
              <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="bulanL">Bulan</label>
                  <select class="form-control select2" style="width: 100%;" id="bulanL" name="customRadio" required>
                    <option value="">Pilih Bulan</option>
                    <option value="">1 Tahun</option>
                    <option value="">Akumulasi</option>
                    <option value="">Januari</option>
                    <option value="">Februari</option>
                    <option value="">Maret</option>
                    <option value="">April</option>
                    <option value="">Mei</option>
                    <option value="">Juni</option>
                    <option value="">Juli</option>
                    <option value="">Agustus</option>
                    <option value="">September</option>
                    <option value="">Oktober</option>
                    <option value="">Nopember</option>
                    <option value="">Desember</option>
                  </select>
                </div>
            </div>
              </div>
            
              <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-sm btn-default" >
                  <span class="p-2">LIHAT</span>
                </button>
              <div class="btn-group">
              
              <span class="btn btn-dark disabled">Export Ke : </span>
              
                <button type="button" class="btn btn-sm btn-warning" >
                  <span class="p-2">PDF</span>
                </button>
                <button type="button" class="btn btn-sm btn-success" >
                  <span class="p-1">EXCEL</span>
                </button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>

  <div class="modal fade" id="modaldel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><b>Konfimasi Hapus Data Transaksi</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body text-left">
          <code id="data_id">dataID = ()</code>
          <table class="table table-hover table-sm ">
            <thead>
              <tr>
                <td>NOMOR REF</td>
                <td>:&nbsp;&nbsp;<span id="refdel"> </span></td>
                <td></td>
              </tr>
              <tr>
                <td>TANGGAL</td>
                <td>:&nbsp;&nbsp;<span id="tanggaldel"> </span></td>
                <td></td>
              </tr>
              <tr>
                <td>ASET</td>
                <td>:&nbsp;&nbsp;<span id="asetdel"></span></td>
                <td></td>
              </tr>
              <tr>
                <td>SALDO</td>
                <td>:&nbsp;&nbsp;<span id="saldodel"> </span></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </thead>
          </table>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
          <form action="<?php echo site_url("Home/del") ?>" method="post">
            <input type="hidden" id="id_transaksi" name="id_transaksi">
            <input type="submit" style="color:white;" class="btn btn-danger btn-sm" value="Hapus Data">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end ALL Modal Control -->


  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3">
              <img class="img-fluid" src="<?php echo base_url("dist/img/BULOG.png"); ?>" alt="Logo Bulog">
            </div>
            <div class="col-6">
              <div class="pt-3 text-center">
                <h1><b>Laporan Keuangan UB. OPASET <br>KANTOR WILAYAH SULAWESI SELATAN & BARAT</b></h1>
              </div>
            </div>
            <div class="col-3">
              <div class="info-box mb-0">
                <div class="info-box-content">
                  <span class="info-box-text">Muhammad Fachrizal Ramdani</span>
                  <span class="info-box-number">NIP : 1103174125</span>
                </div>
                <img class="img-fluid rounded" width="90" height="90" src="<?php echo base_url(); ?>/dist/img/pict.jpg" alt="photo">
              </div>
            </div>
          </div>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-2">
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="<?php echo site_url('Home/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header text-center">
                      <h4 class="modal-title font-weight-bold">Masukkan Data [Transaksi]</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-2">
                      <div class="md-form mb-2">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Tanggal</label>
                        <input type="date" id="formaddTanggal" class="form-control validate" name="tanggal" required>
                      </div>
                      <div class="md-form mb-2">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                        <select class="form-control select2" style="width: 100%;" name="aset" required>
                          <option selected="selected" value="">Pilih Unit</option>
                          <?php foreach ($aset as $row_a) { ?>
                            <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="md-form mb-2">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                        <select class="form-control select2" style="width: 100%;" name="kategori" required>
                          <option selected="selected" value="">Pilih Kategori</option>
                          <?php foreach ($kategori as $row_k) { ?>
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
                          <input type="text" id="rupiah" class="form-control uang" name="saldo">
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

                  </form>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-info btn-block mb-3" data-toggle="modal" data-target="#modalLoginForm">Masukkan Data Transaksi</button>
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
                  <?php foreach ($aset as $row_a) { ?>
                    <?php
                    $link_showaset = "Home/showaset/";
                    if (isset($curr_month) and isset($curr_year)) {
                      $link_showaset .= $row_a->id_aset . "/" . $curr_month . "/" . $curr_year;
                    } else if (isset($curr_month)) {
                      $link_showaset .= $row_a->id_aset . "/" . $curr_month . "/0";
                    } else {
                      $link_showaset .= $row_a->id_aset . "/0/0";
                    }
                    ?>
                    <li class="nav-item">
                      <a href="<?php echo site_url($link_showaset); ?>" id="namaaset<?php echo $row_a->id_aset; ?>" style="border-radius:0px;" class="nav-link"> <?php echo $row_a->nama_aset; ?></a>
                    </li>
                  <?php } ?>
                  <li class="nav-item">
                  <form action="<?php echo site_url("Home/addaset"); ?>" method="post" enctype="multipart/form-data">
                <div class="input-group p-1">
                  <input type="text" class="form-control" type="text" placeholder="Tambah Aset" name="nama_aset" required>
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
                  </span>
                </div>
                </li>
              </form>
            </ul>
          </div>
              
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Rekap Tahun</b></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <?php
                  $year_filt = "Home/showaset/";
                  if (isset($curr_aset) and isset($curr_month)) {
                    $year_filt .= $curr_aset . "/" . $curr_month . "/";
                  } else if (isset($curr_month)) {
                    $year_filt .= "0/" . $curr_month . "/";
                  } else {
                    $year_filt .= "0/0/";
                  }
                  ?>
                  <?php foreach ($datatahun as $year_row) { ?>
                    <li class="nav-item">
                      <a href="<?php echo site_url($year_filt . $year_row->years); ?>" class="nav-link" style="border-radius:0px;" id="ftahun<?php echo $year_row->years; ?>">
                        <?php echo $year_row->years; ?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-10">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-dark btn-sm">Dashboard</button>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php
                      if (isset($curr_month)) {
                        if ($curr_month == 0) {
                          echo "BULAN";
                        } else if ($curr_month == 1) {
                          echo "Januari";
                        } else if ($curr_month == 2) {
                          echo "Februari";
                        } else if ($curr_month == 3) {
                          echo "Maret";
                        } else if ($curr_month == 4) {
                          echo "April";
                        } else if ($curr_month == 5) {
                          echo "Mei";
                        } else if ($curr_month == 6) {
                          echo "Juni";
                        } else if ($curr_month == 7) {
                          echo "Juli";
                        } else if ($curr_month == 8) {
                          echo "Agustus";
                        } else if ($curr_month == 9) {
                          echo "September";
                        } else if ($curr_month == 10) {
                          echo "Oktober";
                        } else if ($curr_month == 11) {
                          echo "November";
                        } else if ($curr_month == 12) {
                          echo "Desember";
                        }
                      } else {
                        echo "BULAN";
                      }
                      ?>
                    </button>
                    <div class="dropdown-menu">
                      <?php if (isset($curr_aset) and isset($curr_year)) { ?>
                        <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/1/" . $curr_year); ?>">Januari</a>
                        <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/2/" . $curr_year); ?>">Februari</a>
                        <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/3/" . $curr_year); ?>">Maret</a>
                        <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/4/" . $curr_year); ?>">April</a>
                        <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/5/" . $curr_year); ?>">Mei</a>
                        <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/6/" . $curr_year); ?>">Juni</a>
                        <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/7/" . $curr_year); ?>">Juli</a>
                        <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/8/" . $curr_year); ?>">Agustus</a>
                        <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/9/" . $curr_year); ?>">September</a>
                        <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/10/" . $curr_year); ?>">Oktober</a>
                        <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/11/" . $curr_year); ?>">November</a>
                        <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/12/" . $curr_year); ?>">Desember</a>
                      <?php } else if (isset($curr_aset)) {
                      ?>
                        <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/1/0"); ?>">Januari</a>
                        <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/2/0"); ?>">Februari</a>
                        <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/3/0"); ?>">Maret</a>
                        <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/4/0"); ?>">April</a>
                        <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/5/0"); ?>">Mei</a>
                        <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/6/0"); ?>">Juni</a>
                        <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/7/0"); ?>">Juli</a>
                        <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/8/0"); ?>">Agustus</a>
                        <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/9/0"); ?>">September</a>
                        <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/10/0"); ?>">Oktober</a>
                        <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/11/0"); ?>">November</a>
                        <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/" . $curr_aset . "/12/0"); ?>">Desember</a>
                      <?php
                      } else {
                      ?>
                        <a class="dropdown-item" id="month1" href="<?php echo site_url("Home/showaset/0/1/0"); ?>">Januari</a>
                        <a class="dropdown-item" id="month2" href="<?php echo site_url("Home/showaset/0/2/0"); ?>">Februari</a>
                        <a class="dropdown-item" id="month3" href="<?php echo site_url("Home/showaset/0/3/0"); ?>">Maret</a>
                        <a class="dropdown-item" id="month4" href="<?php echo site_url("Home/showaset/0/4/0"); ?>">April</a>
                        <a class="dropdown-item" id="month5" href="<?php echo site_url("Home/showaset/0/5/0"); ?>">Mei</a>
                        <a class="dropdown-item" id="month6" href="<?php echo site_url("Home/showaset/0/6/0"); ?>">Juni</a>
                        <a class="dropdown-item" id="month7" href="<?php echo site_url("Home/showaset/0/7/0"); ?>">Juli</a>
                        <a class="dropdown-item" id="month8" href="<?php echo site_url("Home/showaset/0/8/0"); ?>">Agustus</a>
                        <a class="dropdown-item" id="month9" href="<?php echo site_url("Home/showaset/0/9/0"); ?>">September</a>
                        <a class="dropdown-item" id="month10" href="<?php echo site_url("Home/showaset/0/10/0"); ?>">Oktober</a>
                        <a class="dropdown-item" id="month11" href="<?php echo site_url("Home/showaset/0/11/0"); ?>">November</a>
                        <a class="dropdown-item" id="month12" href="<?php echo site_url("Home/showaset/0/12/0"); ?>">Desember</a>

                      <?php
                      }
                      ?>
                    </div>
                    <script>
                      <?php
                      if (isset($curr_month)) {
                      ?>
                        var bulanaktif = document.getElementById("month<?php echo $curr_month; ?>");
                        bulanaktif.className += " active";
                      <?php
                      }
                      ?>
                    </script>
                  </div>
                  </b>
                </h3>
                <a href="<?php echo base_url(); ?>"><button class="btn btn-info btn-sm ml-2" data-toggle="tooltip" title="Perlihatkan Semua Data">View All</button></a>
                
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCetak"><span data-toggle="tooltip" title="Laporan Keuangan">
                Cetak </span>
              </button>
              
                <div class="card-tools">
                  <div class="input-group input-group-sm mt-0">
                    <span class="btn btn-dark btn-sm breadcrumb-item mr-1">
                      <div id="clock"></div>
                    </span>
                    <span class="btn btn-danger btn-sm toastrDefaultError mr-1" data-toggle="tooltip" data-placement="bottom" title="Keluar">Log Out</span>

                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <div class="card-body">
                    <table class="table table-hover table-sm" style="text-align: center;" id="tbmaster">
                      <thead class="">
                        <tr>
                          <th><b>AKSI</b></th>
                          <th><b>TANGGAL</b></th>
                          <th><b>TRANSAKSI</b></th>
                          <th><b>ASET</b></th>
                          <th><b>URAIAN</b></th>
                          <th></th>
                          <th><b>SALDO</b></th>
                        </tr>
                      </thead>
                      <tfoot class="">
                        <?php
                        $total_saldo = 0; 
                        foreach($transaksi as $t_row){
                          if($t_row->ref == "Debit"){
                            $total_saldo += $t_row->saldo;
                          }
                          else{
                            $total_saldo -= $t_row->saldo;
                          }
                        }
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class=""></td>

                          <td><b>Total Saldo = </b></td>
                          <td class="text-left"><b><?php echo "Rp. ".number_format($total_saldo, 2);?></b></td>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="card-footer p-0">
                    </div>
                  </div>
                </div>
              </div>
      </section>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jquery-mask/jquery.mask.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables/datetime.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?php echo base_url(); ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
		}
	</script>

  <script>
    
        $('#UB').hide();
        $("#jenislaporan").change(function() {
        if ($(this).val() == "mutasi") {
          $('#UB').show();
          $('#aset', '#bulan').attr('required', '');
          $('#aset', '#bulan').attr('data-error', 'This field is required.');
        } else {
          $('#UB').hide();
          $('#aset', '#bulan').removeAttr('required');
          $('#aset', '#bulan').removeAttr('data-error');
        }
        });

        $('#BL').hide();
        $("#jenislaporan").change(function() {
        if ($(this).val() == "laba") {
          $('#BL').show();
          $('#bulanL').attr('required', '');
          $('#bulanL').attr('data-error', 'This field is required.');
        } else {
          $('#BL').hide();
          $('#bulanL').removeAttr('required');
          $('#bulanL').removeAttr('data-error');
        }
      });


    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('.toastrDefaultError').click(function() {
      toastr.error('Data Gagal Di Tambahkan ')
    });

    $(document).ready(function() {
      <?php if ($this->session->flashdata('success')) { ?>
        toastr.success('Data Berhasil Di Tambahkan');
      <?php } ?>

      <?php if ($this->session->flashdata('successdel')) { ?>
        toastr.success('Berhasil Menghapus Data');
      <?php } ?>

      <?php if ($this->session->flashdata('successupdate')) { ?>
        toastr.success('Berhasil Menyimpan Data');
      <?php } ?>

      $('[data-toggle="tooltip"]').tooltip();
    });

    <?php
    if (isset($curr_year)) {
    ?>
      var tahunaktif = document.getElementById("ftahun<?php echo $curr_year; ?>");
      tahunaktif.className += " btn-secondary active";
    <?php
    }
    ?>
  </script>
  <script>
    <?php
    if (isset($curr_aset)) {
    ?>
      var bulanaktif = document.getElementById("namaaset<?php echo $curr_aset; ?>");
      bulanaktif.className += " btn-secondary  active";
    <?php
    }
    ?>
  </script>


  <script>
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
      document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
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
    </script>
        
    <script>
        $(document).ready(function(){
          var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                    return column === 5 ?
                        data.replace( /[$,]/g, '' ) :
                        data;
                }
            }
        }
    };

          $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
          {
              return {
                  "iStart": oSettings._iDisplayStart,
                  "iEnd": oSettings.fnDisplayEnd(),
                  "iLength": oSettings._iDisplayLength,
                  "iTotal": oSettings.fnRecordsTotal(),
                  "iFilteredTotal": oSettings.fnRecordsDisplay(),
                  "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                  "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
              };
          };
          $('#tbmaster').DataTable({
            "responsive": true,
            "autoWidth": true,
            "searching": true,
            "paging": true,
            "info": true,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "lengthMenu": [[-1, 50, 25], ["All", 50, 25]],
             "fixedColumns":   true,
             "scrollCollapse": true,

            initComplete: function() {
                  var api = this.api();
                  $('#tbmaster_filter input')
                      .off('.DT')
                      .on('input.DT', function() {
                          api.search(this.value).draw();
                  });
            },
                oLanguage: {
                sProcessing: "tunggu..."
            },
            <?php
            if (isset($curr_aset) and isset($curr_month) and isset($curr_year)) {
              $string_url_json = 'index.php/Home/' . $json_url;
            } else {
              $string_url_json = 'index.php/Home/getTransaksiJson';
            }
            ?>
                  ajax: {"url": "<?php echo base_url() . $string_url_json; ?>", "type": "POST"},
                        columns: [
                            {"data": "view",  className: "text-center", "bSortable": false, "bSearchable": false},
                            {"data": "tanggal" , className: "text-left", render: $.fn.dataTable.render.moment( 'DD MMM YYYY' )},
                            {"data": "ref" , className: "text-left"},
                            {"data": "nama_aset" , className: "text-left"},
                            {"data": "uraian", className: "text-left"},
                            {"data": "nama_kategori"},
                            {"data": "saldo", className: "text-left", render: $.fn.dataTable.render.number(',', '.', 2 , 'Rp.')}
                      ],
                      
                    
                oLanguage: {
                sProcessing: "tunggu..."
            },

                  order: [[1, 'asc']],
                  rowCallback: function(row, data, iDisplayIndex) {
                  var info = this.fnPagingInfo();
                  var page = info.iPage;
                  var length = info.iLength;
                  $('td:eq(0)', row).html();
              }
          });
          // get Edit Records
          $('#tbmaster').on('click','.data_update',function(){
            var id_transaksi=$(this).data('id');
                        var tanggal=$(this).data('tanggal');
                        var aset=$(this).data('aset');
                        var kategori=$(this).data('kategori');
                        var uraian=$(this).data('uraian');
                        var ref=$(this).data('ref');
                        var saldo=$(this).data('saldo');

            $('#modalUpdate').modal('show');
            $('[name="id_transaksi"]').val(id_transaksi);
                        $('[name="uraian"]').val(uraian);
                        $('[name="saldo"]').val(saldo);
                        $('[name="tanggal"]').val(tanggal);
                        localStorage.setItem("Select1", aset);
                            $('#selectaset').find('option').each(function(i,e){
                                if($(e).val() == localStorage.getItem("Select1")){
                                  $('#selectaset').prop('selectedIndex',i);
                                }
                            });
                        localStorage.setItem("Select2", kategori);
                            $('#selectkategori').find('option').each(function(i,e){
                                if($(e).val() == localStorage.getItem("Select2")){
                                  $('#selectkategori').prop('selectedIndex',i);
                                }
                            });
                        
                        localStorage.setItem("Select3", ref.charAt(0));
                            $('#selectJenis').find('option').each(function(i,e){
                                if($(e).val() == localStorage.getItem("Select3")){
                                  $('#selectJenis').prop('selectedIndex',i);
                                }
                            });
          });
          $('#tbmaster').on('click','.deletedata',function(){
              var id_transaksi=$(this).data('id');
                        var tanggal=$(this).data('tanggal');
                        var aset=$(this).data('aset');
                        var kategori=$(this).data('kategori');
                        var uraian=$(this).data('uraian');
                        var ref=$(this).data('ref');
                        var saldo=$(this).data('saldo');
              $('[name="id_transaksi"]').val(id_transaksi);
              $('#modaldel').modal('show');
              document.getElementById("data_id").innerHTML = "record_id("+id_transaksi+")";
              document.getElementById("refdel").innerHTML = ref;
              document.getElementById("tanggaldel").innerHTML = tanggal;
              document.getElementById("asetdel").innerHTML = aset;
              document.getElementById("saldodel").innerHTML = saldo;
          });
          $('#tbmaster').on('click','.viewdata',function(){
              var id_transaksi=$(this).data('id');
                        var tanggal=$(this).data('tanggal');
                        var aset=$(this).data('aset');
                        var kategori=$(this).data('kategori');
                        var uraian=$(this).data('uraian');
                        var ref=$(this).data('ref');
                        var saldo=$(this).data('saldo');
              $('[name="id_transaksi"]').val(id_transaksi);
              $('#modalView').modal('show');
              var jenistransaksi = "";
              if(ref.includes("D")){
                jenistransaksi="Debit";
              }
              else{
                jenistransaksi="Kredit";
              }
              document.getElementById("refview").innerHTML = ref;
              document.getElementById("tanggalview").innerHTML = tanggal;
              document.getElementById("asetview").innerHTML = aset;
              document.getElementById("saldoview").innerHTML = (saldo).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
              document.getElementById("uraianview").innerHTML = uraian;
              document.getElementById("jenistransaksiview").innerHTML = jenistransaksi;
          });
        });
    </script>
</body>
</html>