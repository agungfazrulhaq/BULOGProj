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
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/pace-progress/themes/black/pace-theme-flat-top.css') ?>">
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
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css') ?>">
</head>
<style>
  .page-item.active .page-link {
    color: white !important;
    background-color: #17a2b8 !important;
    border: 1px solid #17a2b8;
  }

  .page-link {
    color: grey !important;
  }

  .hiddencheck{
    visibility: hidden;
  }

  .pointer {cursor: pointer;}
</style>

<body class="layout-top-nav pace-orange" style="height: auto;">

  <!-- ALL Modal Control -->
  <div class="modal fade bd-example-modal-lg" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="<?php echo site_url('Home/add') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-header">
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
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
              <textarea type="textarea" class="form-control validate" name="uraian" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>

            <div class="md-form mb-2">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
              <select class="form-control select2" style="width: 100%;" name="kategori" required>
                <option selected="selected" value="">Pilih Kategori</option>
                <option class="font-weight-bold" value="saldoawal">SALDO AWAL</option>
                <?php foreach ($allcategory as $K_row__) { ?>
                  <optgroup label="<?php echo strtoupper($K_row__->nama_kat_lr); ?>">
                    <?php foreach ($kategori as $row_k) { ?>
                      <?php
                      $id_kat__1 = $row_k->id_kat_lr_kat;
                      $id_kat__2 = $K_row__->id_kat_laba_rugi;
                      ?>
                      <?php if ($id_kat__1 == $id_kat__2) { ?>
                        <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>

                      <?php } ?>
                    <?php } ?>
                  </optgroup>
                <?php } ?>
              </select>
            </div>

            <div class="md-form mb-2">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Jumlah</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="">Rp.</i></span>
                </div>
                <input type="text" id="rupiah" class="form-control uang" name="saldo" required>
              </div>
            </div>

            <input type="hidden" id="user_add" value="<?php echo $this->session->userdata('user_logged')->id_user;?>" name="user_update">

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-sm" id="modalsaldoawal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generate Saldo Awal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('Home/generatesaldoawal/');?>" method='post'>
          <fieldset>
          <!-- Select Basic -->
          <div class="form-group">
            <label data-error="wrong" data-success="right" for="aset" class="col-md-4 control-label">Aset</label>
                <div class="col-md-12">
                  <select class="form-control" id="selectaset_sa" name="aset" required>
                    <?php foreach ($aset as $row_a) { ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                    <?php } ?>
                  </select>
                </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="bulan">Bulan</label>
            <div class="col-md-12">
              <select id="bulansaldoawal" name="bulan" class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="tahun">Tahun</label>  
            <div class="col-md-12">
            <input id="tahun" name="tahun" type="text" placeholder="ex. 2020" class="form-control input-md" required="">
              
            </div>
          </div>

          </fieldset>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Generate">
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="card card-orange card-outline">
          <div class="card-header font-weight-bold">
            <span class="" id="jen_tranview"></span> [<span id="refview">codeREF</span>] <span id="tanggalview"></span>
            <i class="ml-3 fas fa-bookmark text-info"></i>
            <span class="font-weight-normal">Kategori :[ <span id="name_lr">not_found</span> ]
              <i class="ml-2 fas fa-chevron-circle-right text-info"></i>
              Sub Kategori :[ <span id="namekat">not_found</span> ] </span>
            <button type="button" data-dismiss="modal" data-toggle="modal" class="btn btn-danger pl-3 pr-3 float-right btn-sm" >X</button>
          </div>

          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h3><b>NOMINAL TRANSAKSI : &nbsp;Rp. <span id="saldoview">Saldo</span></b>
                <span class="mailbox-read-time float-right text-right bg-light p-1 pl-2 pr-2 rounded">
                  <code class="text-orange">
                    User : <span id="userupdate"> Unknown </span> <br>
                    <span id="tanggal_update">--:--:--</span> <br>
                    Waktu Pembuatan Laporan (Timestamp)</code>
                </span>
              </h3>
              <h4 class="font-weight-normal pt-1" id="asetview"></h4>
            </div>

            <div class="mailbox-read-message">
              <div class="text-justify font-weight-light p-3 bg-light rounded">
                <h6 class="font-weight-bold">Uraian :</h6>
                <p id="uraianview" class="uraianview_ pl-3">URAIANNYA APA</p>
                <br>
              </div>
            </div>

            <div class="card-footer bg-white">
              <ul id="elemfiles_1" class="mailbox-attachments d-flex align-items-stretch clearfix mb-0">
                <!-- <li id="elemfile1">
                  <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                  <div class="mailbox-attachment-info">
                    <i class="fas fa-paperclip"></i> <span id="nama_file">No_file</span>
                    <span class="mailbox-attachment-size clearfix mt-1">
                      <span id="ukuranfile">1,245 KB</span> KB
                      <a href="#" id="downloadthefile" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                      <a href="#" id="deletethefile" class="btn btn-default btn-sm float-right mr-1 pr-2 pl-2"><i class="fas fa-trash-alt"></i></a>
                    </span>
                  </div>
                </li> -->
              </ul>
            </div>

            <div class="card-footer">
              <label for="">File input</label>
              <div class="row">
                <div class="col-5 mb-0">
                  <form action="<?php echo site_url('Home/upload/') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Tambah Bukti Pembayaran
                        <input type="hidden" name="id_transaksi" id="id_transaksi_file">
                        <input type="file" name="file_transaksi">
                      </div>
                      <button class="btn btn-info">Add</button>
                  </form>
                </div>
              </div>
              <div class="col-8 text-left">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <form action="<?php echo site_url('Home/update/'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Ubah Data [Transaksi]</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-2">
                <div class="md-form mb-2">
                  <input type="hidden" id="id_transaksi" class="form-control validate" name="id_transaksi" value="">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Tanggal</label>
                  <input type="date" id="formupdatetanggal" class="form-control validate" name="tanggal" value="" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                  <select class="form-control" style="width: 100%;" id="selectaset" name="aset" required>
                    <?php foreach ($aset as $row_a) { ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
                  <textarea type="textarea" class="form-control validate" name="uraian" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                  <select class="form-control" id="selectkategori" style="width: 100%;" name="kategori" required>  
                    <?php foreach ($allcategory as $K_row__) { ?>
                      <optgroup label="<?php echo strtoupper($K_row__->nama_kat_lr); ?>">
                        <?php foreach ($kategori as $row_k) { ?>
                          <?php
                          $id_kat__1 = $row_k->id_kat_lr_kat;
                          $id_kat__2 = $K_row__->id_kat_laba_rugi;
                          ?>
                          <?php if ($id_kat__1 == $id_kat__2) { ?>
                            <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>

                          <?php } ?>
                        <?php } ?>
                      </optgroup>
                    <?php } ?>
                    <option class="font-weight-bold" value="saldoawal" id="saldoawalupdateindex">SALDO AWAL</option>
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

                </div>
              </div>
              <input type="hidden" id="user_add" value="<?php echo $this->session->userdata('user_logged')->id_user;?>" name="user_update">
              <div class="modal-footer d-flex justify-content-center">
                <input type="submit" class="btn btn-info" value="Simpan">
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
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Cetak Laporan Keuangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-2">
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="seeAnotherField">Jenis Laporan</label>
                  <select class="form-control custom-select" style="width: 100%;" id="seeAnotherField" name="jenislaporan">
                    <option value="">Pilih Jenis Laporan</option>
                    <option value="mutasi">Laporan Mutasi Kas Aset</option>
                    <option value="laba" >Laporan Laba Rugi</option>
                    <option value="neraca">Laporan Neraca</option>
                  </select>
                </div>
                <div class="md-form mb-2" id="otherFieldDiv">
                  <label data-error="wrong" data-success="right" for="otherField">Date range :</label>
                  <div class="input-group" id="otherField">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-sm bg-info">
                    <span class="p-2" onclick='alertLihat(document.getElementById("seeAnotherField").value)'><i class=" fas fa-file-pdf"></i>&nbsp; LIHAT</span>
                  </button>
                
                <div class="">

                  <span class="btn bg-grey">Export Ke : </span>
                  <button type="button" class="btn btn-sm text-orange"><i class=" fas fa-file-pdf"></i>
                    <span class="" onclick='alertFilter(document.getElementById("jenislaporan").value)'>PDF</span>
                  </button>
                  <button type="button" class="btn text-olive btn-sm"><i class=" fas fa-file-excel"></i>
                    <span class="">EXCEL</span>
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
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"><b>Konfirmasi Hapus Data Transaksi</b></h3>
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
                <td>:&nbsp;&nbsp;Rp.<span id="saldodel"> </span></td>
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
          <form action="<?php echo site_url("Home/del"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_transaksi_dam" name="id_transaksi" value="">
            <input type="submit" style="color:white;" class="btn btn-danger btn-sm" value="Hapus Data">
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($aset as $delaset) { ?>
    <div class="modal fade" id="delaset<?php echo $delaset->id_aset; ?>">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"><b>Konfirmasi Hapus Asset</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h6 class="text-muted ml-3 mt-2">Semua data akan terhapus pada asset :</h6>
          <div class="modal-body text-center">
            <h3><b><?php echo $delaset->nama_aset; ?></b></h3>

          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <form action="<?php echo site_url("Home/asetdel/"); ?>" method="post">
              <input type="hidden" id="id_aset" name="id_aset" value="<?php echo $delaset->id_aset; ?>">
              <input type="submit" style="color:white;" class="btn btn-danger btn-sm" value="Hapus">
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php foreach ($allcategory as $row_kat) { ?>
    <div class="modal fade" id="delkate<?php echo $row_kat->id_kat_laba_rugi; ?>">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"><b>Konfirmasi Hapus Kategori</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h6 class="text-muted ml-3 mt-2">Anda akan menghapus semua data transaksi pada Kategori ini.</h6>
          <div class="modal-body text-center">
            <h3><?php echo strtoupper($row_kat->nama_kat_lr); ?></h3>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <form action="<?php echo site_url("Home/delcat_lr"); ?>" method="post">
              <input type="hidden" id="id_aset" name="id_kategori_lr" value="<?php echo $row_kat->id_kat_laba_rugi; ?>">
              <input type="submit" style="color:white;" class="btn btn-danger btn-sm" value="Hapus Kategori">
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php foreach ($kategori as $row_kat) { ?>
    <div class="modal fade" id="delkat<?php echo $row_kat->id_kategori; ?>">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"><b>Konfirmasi Hapus Kategori</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h6 class="text-muted ml-3 mt-2">Anda akan menghapus semua data transaksi pada Kategori ini.</h6>
          <div class="modal-body text-center">
            <h3><?php echo strtoupper($row_kat->nama_kategori); ?></h3>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <form action="<?php echo site_url("Home/delcat"); ?>" method="post">
              <input type="hidden" id="id_aset" name="id_kategori" value="<?php echo $row_kat->id_kategori; ?>">
              <input type="submit" style="color:white;" class="btn btn-danger btn-sm" value="Hapus Kategori">
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="row">
    <div class="col-md-2">
      <form action="<?php echo site_url("Home/katadd/"); ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="modalkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title font-weight-bold">Buat Kategori Uraian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body mx-2">
                <div class="md-form mb-3">
                  <label data-error="wrong" data-success="right" for="jenislaporan">Kategori Uraian</label>
                  <input type="text" autocomplete="off" class="form-control" type="text" placeholder="" name="nama_kat_lr" list="Category__" required>
                  <datalist id="Category__">
                    <?php foreach ($allcategory as $row_c) { ?>
                      <option value="<?php echo strtoupper($row_c->nama_kat_lr); ?>"></option>
                    <?php } ?>
                  </datalist>
                </div>

                <div class="md-form mb-3">
                  <label data-error="wrong" data-success="right" for="aset">Sub Kategori Uraian</label>
                  <input type="text" class="form-control" type="text" placeholder="" name="nama_kategori" required>
                </div>

                <div class="md-form mb-4">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Jenis Transaksi</label>
                  <select class="custom-select" style="width: 100%;" id="selectJenis" name="jenis_transaksi_kat" required>
                    <option value="">Pilih Jenis Transaksi</option>
                    <option value="D">Debit</option>
                    <option value="K">Kredit</option>
                  </select>
                </div>

                <div class="md-form mb-0">
                  <label data-error="wrong" data-success="right" for="defaultForm-email"><u>Pilih Jenis Laba pada Kategori ini.</u></label>
                  
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="laba" value="kotor">
                    <label for="customRadio1" class="custom-control-label">LABA RUGI KOTOR</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="laba" value="usaha">
                    <label for="customRadio2" class="custom-control-label">LABA RUGI USAHA</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio3" name="laba" value="lain">
                    <label for="customRadio2" class="custom-control-label">LABA RUGI LAIN-LAIN</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio4" name="laba" value="none" checked>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-info">Simpan</button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
  </div>
  <!-- end ALL Modal Control -->

  <div class="wrapper">

    <nav class="navbar navbar-dark py-0 bg-info navbar-expand-lg py-md-0">
      <a class="navbar-brand font-weight-bold" href="#">LAPORAN KEUANGAN UB. OPASET KANTOR WILAYAH SULAWESI SELATAN & BARAT</a>
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="<?php echo base_url(); ?>/upload/profile/<?php echo $this->session->userdata('user_logged')->file_foto;?>" class="rounded-circle mr-1" width="20" height="20" alt="logo">
                    <u><?php echo $this->session->userdata('user_logged')->nama;?></u>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">BIDANG : <?php echo $this->session->userdata('user_logged')->bidang;?></span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <div class="info-box mb-1 p-0">
                <div class="text-right info-box-content font-weight-light" style="font-size:0.8vw;">
                  <span class="info-box-text"><?php echo $this->session->userdata('user_logged')->nama;?></span>
                  <span class="info-box-number">NIP : <?php echo $this->session->userdata('user_logged')->nip;?></span>
                </div>
                <img class="mb-0 p-0 img-fluid rounded" width="27%" src="<?php echo base_url(); ?>/upload/profile/<?php echo $this->session->userdata('user_logged')->file_foto;?>" alt="photo">
              </div>
            </a>
            </div>
        </li>
        <li class="nav-item">
          <span class="nav-link p-0 mt-2">
            <div id="clock"></div>
          </span>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?php echo site_url()?>Login/logout">
            <span class="toastr"  data-toggle="" title="Keluar">Keluar <i class="fas fa-sign-out-alt"></i></span>
          </a>

        </li>

      </ul>
    </nav>

    <div class="content-wrapper">
      

      <section class="content mt-3">
        <div class="row">
          <div class="col-2" style="font-size:1vw;">
          <img class="img-fluid mb-2 shadow-sm bg-white p-2 rounded" width="100%" src="<?php echo base_url("dist/img/logo dash.png"); ?>" alt="Logo Bulog">
            <button type="button" class="btn shadow-sm btn-block btn-info mb-2 font-weight-light" data-toggle="modal" data-target="#modalLoginForm"><span data-toggle="tooltip" title="Tambahkan Data" data-placement="top"> Masukkan Data Transaksi</span></button>
            <button type="button" class="btn shadow-sm btn-block btn-info mb-2 font-weight-light" data-toggle="modal" data-target="#modalsaldoawal"><span data-toggle="tooltip" title="Tambahkan Data" data-placement="top"> Generate Saldo Awal</span></button>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>
                    Optimalisasi Aset</b><br></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus text-orange"></i>
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
                      <div class="nav-link" id="namaaset<?php echo $row_a->id_aset; ?>" style="border-radius:0px;">
                        <a href="<?php echo site_url($link_showaset); ?>" id="" style="color:#343a40;"> <?php echo $row_a->nama_aset; ?></a>
                        <button type="button" class="float-right btn btn-xs" data-toggle="modal" data-target="#delaset<?php echo $row_a->id_aset; ?>"><i class="fas fa-times text-orange"></i></button>
                      </div>
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
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus text-orange"></i>
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
                      <a href="<?php echo site_url($year_filt . $year_row->years); ?>" class="nav-link" style="border-radius:0px; color:#343a40;" id="ftahun<?php echo $year_row->years; ?>">
                        <?php echo $year_row->years; ?>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Daftar Kategori</b></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus text-orange"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <div class="input-group p-1">
                      <button type="button" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#modalkategori"><i class="fas fa-plus mr-1" data-toggle="tooltip" title="Tambah Kategori Uraian" data-placement="top"></i>Tambah Kategori</button>
                    </div>
                  </li>
                  <?php foreach ($allcategory as $row_cat) { ?>
                    <li class="nav-item " data-toggle="collapse" href="#multiCollapseExample<?php echo $row_cat->id_kat_laba_rugi; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                      <div class="nav-link pt-0 pb-0">
                        <b class="text-dark" style="font-size:0.85vw;"><i class="fas fa-bookmark text-info"></i> <?php echo strtoupper($row_cat->nama_kat_lr); ?></b>
                        <button type="button" class="float-right btn btn-xs" data-toggle="modal" data-target="#delkate<?php echo $row_cat->id_kat_laba_rugi; ?>"><i class="fas fa-eraser text-red"></i></button>
                      </div>
                    </li>
                    <?php foreach ($kategori as $row_kt) { ?>
                      <?php
                      $id_kat_lr = $row_cat->id_kat_laba_rugi;
                      $id_kat = $row_kt->id_kat_lr_kat;

                      if ($id_kat_lr == $id_kat) {
                      ?>
                        <li class="nav-item collapse multi-collapse" id="multiCollapseExample<?php echo $row_cat->id_kat_laba_rugi; ?>" id="namaaset">
                          <div class="nav-link bg-white text-dark">
                            <span id=""><?php echo $row_kt->nama_kategori; ?></span>
                            <button type="button" class="float-right btn btn-xs" data-toggle="modal" data-target="#delkat<?php echo $row_kt->id_kategori; ?>"><i class="fas fa-times text-orange"></i></button>
                          </div>
                        </li>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-10">
            <div class="card card-outline card-info">
              <div class="card-header d-flex p-2">
                <h3 class="card-title">
                  <div class="btn-group dropdown"><button type="button" class="btn btn-dark btn-sm">Home</button>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php
                      if (isset($curr_month)) {
                        if ($curr_month == 0) {
                          echo "Bulan";
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
                      } 
                      else {
                        echo "Bulan";
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
                        bulanaktif.className += " font-weight-bold bg-info active";
                      <?php
                      }
                      ?>
                    </script>
                  </div>
                  </b>
                  <a href="<?php echo base_url(); ?>"><button class="btn btn-success btn-sm ml-2" data-toggle="tooltip" title="Perlihatkan Semua Data"><i class="far fa-file-alt mr-1"></i> Lihat Semua </button></a>
                </h3>
                <ul class="nav nav-pills ml-auto p-0">
                  <li class="nav-item pr-1"><a class="btn btn-secondary text-white btn-sm" href="#tab_1" data-toggle="tab"><i class="fas fa-arrow-left" data-toggle="tooltip" title="Kembali"></i></a></li>
                  <li class="nav-item" hidden><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                  <?php
                  if (isset($curr_aset) and isset($curr_year) and isset($curr_month)) {
                    if ($curr_month > 0 and $curr_month < 13 and $curr_aset > 0 and $curr_year > 0) {
                  ?>
                      <li class="nav-item pr-1"><a class="bg-white" href="#tab_3" data-toggle="tab"><button class="btn btn-info btn-sm" onclick="cetaktukar()">Buat Jurnal <i class="far fa-edit"></i></button></a></li>
                  <?php
                    }
                  }
                  ?>
                  <li class="nav-item "></li>
                  <li class="nav-item" id="cetakbtn"><a class=""><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCetak"><span data-toggle="tooltip" title="Laporan Keuangan"><i class="fas fa-print mr-1"></i> Cetak </span>
                      </button></a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1" style="font-size:1vw;">
                    <div class="table-responsive-sm">
                      <table class="table table-hover table-sm" style="width:100%;" id="tbmaster">
                        <thead class="">
                          <tr>
                            <th>AKSI</th>
                            <th class="text-center">TANGGAL</th>
                            <th class="text-center">REF</th>
                            <th class="text-center" style="width:15%">ASET</th>
                            <th class="text-center" "><i class="fas fa-file-archive ml-3" title="BUKTI TRANSAKSI"></i></th>
                            <th class="text-center" style="width:40%">URAIAN</th>
                            <th></th>
                            <th>SALDO</th>
                          </tr>
                        </thead>
                        <tfoot class="">
                          <?php
                          $total_saldo = 0;
                          foreach ($transaksi as $t_row) {
                            if (strpos($t_row->ref, 'K') !== false) {
                              $total_saldo -= $t_row->saldo;
                            } else {
                              $total_saldo += $t_row->saldo;
                            }
                          }
                          ?>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right font-weight-light">Total = </td>
                            <td colspan="2" class="text-left"><b><?php echo "Rp. " . number_format($total_saldo, 2); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  </div>
                  <?php if (isset($curr_aset) and isset($curr_month) and isset($curr_year)) { ?>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">Jurnal <b>
                        <?php 
                        if(isset($curr_aset)){
                          foreach($aset as $rowa){
                            if($rowa->id_aset == $curr_aset){
                              echo $rowa->nama_aset;
                            }
                          }
                        }
                        else{
                          echo "-";
                        }
                        ?></b></h3>

                        <div class="card-tools">
                          <b>
                          <?php
                          if (isset($curr_month)) {
                            if ($curr_month == 0) {
                              echo "Bulan";
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
                          }
                          else{
                            echo "-";
                          }
                          ?>
                          , <?php if(isset($curr_year)) echo $curr_year;?> </b>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="items" data-group="test">
                          <!-- Repeater Content -->
                        </div>
                        <div id="repeater">
                        <!-- Repeater Heading -->
                        <div class="">
                            <button class="btn bg-olive btn-sm" data-toggle="modal" data-target="#addJurnal">
                               <i class="fas fa-plus"></i> Add Jurnal
                            </button>

                            <!-- Jurnal Form -->
                            <div class="modal fade" id="addJurnal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <form class="form-horizontal" action='<?php echo site_url('Home/addjurnal/'.$curr_aset."/".$curr_month."/".$curr_year);?>' method='post' autocomplete="off">
                                      <fieldset>
                                      <!-- Form Name -->
                                      <legend class="" style="margin-bottom:-5px;">Add Jurnal</legend>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="namajurnal">Nama Jurnal</label>  
                                        <div class="col-md-10">
                                        <input id="namajurnal" name="namajurnal" type="text" placeholder="Jurnal untuk pencatatan .." class="form-control input-md" required="">
                                          
                                        </div>
                                      </div>

                                      <!-- Multiple Checkboxes -->
                                      <div class="form-group">
                                        <div class="col-md-4">
                                        <div class="checkbox">
                                            <input type="checkbox" name="pyd_stat" id="pyd_stat" value="1">
                                            PYD
                                          
                                        </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-4">
                                          <label>Jenis Transaksi</label><br>
                                            <input type="radio" name="radioselectjen" id="jen_tran1" value="1" required> DEBIT
                                            <input type="radio" name="radioselectjen" id="jen_tran2" value="0" required> KREDIT
                                        
                                        </div>
                                      </div>

                                      </fieldset>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="bulanjurnal" value="<?php echo $curr_month;?>">
                                    <input type="hidden" name="asetjurnal" value="<?php echo $curr_aset;?>">
                                    <input type="hidden" name="tahunjurnal" value="<?php echo $curr_year;?>">
                                    <input type="submit" class="btn btn-primary" Value="Save changes">
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <br>
                        <!-- Jurnal Update Modal-->
                        <div class="modal fade" id="updateJurnal" tabindex="-1" role="dialog" aria-labelledby="updateJurnalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <form class="form-horizontal" action='<?php echo site_url('Home/updatejurnal/');?>' method='post' autocomplete="off">
                                      <fieldset>
                                      <!-- Form Name -->
                                      <legend class="" style="margin-bottom:-5px;">Update Jurnal</legend>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="namajurnal">Nama Jurnal</label>  
                                        <div class="col-md-10">
                                        <input id="namajurnalupdate" name="namajurnal" type="text" placeholder="Jurnal untuk pencatatan .." class="form-control input-md" required="">
                                          
                                        </div>
                                      </div>

                                      <!-- Multiple Checkboxes -->
                                      <div class="form-group">
                                        <div class="col-md-4">
                                        <div class="checkbox">
                                            <input type="checkbox" name="pyd_stat" id="pyd_stat_update" value="1">
                                            PYD
                                          
                                        </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-4">
                                          <label>Jenis Transaksi</label><br>
                                            <input type="radio" name="radioselectjen" id="jurnalupdate_jen_tran1" value="1" required> DEBIT
                                            <input type="radio" name="radioselectjen" id="jurnalupdate_jen_tran2" value="0" required> KREDIT
                                        
                                        </div>
                                      </div>

                                      </fieldset>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" name="bulanjurnal" value="<?php echo $curr_month;?>">
                                    <input type="hidden" name="asetjurnal" value="<?php echo $curr_aset;?>">
                                    <input type="hidden" name="tahunjurnal" value="<?php echo $curr_year;?>">
                                    <input type="hidden" id="idjurnalupdate" name="idjurnalupdate">
                                    <input type="submit" class="btn btn-primary" Value="Save changes">
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>  

                        <table class="table table-sm" id="accordion">
                          <thead>
                            <tr>
                              <th scope="col">Action</th>
                              <th scope="col">Nama Jurnal</th>
                              <th scope="col">Kas</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $saldoawal_=0;
                          foreach($saldoawalbulan as $saldoawal){
                            $saldoawal_+=$saldoawal->saldo;
                          }?>
                          <?php $total_saldo_jurnal = $saldoawal_;?>
                          <?php foreach($datajurnal as $jurnal){ ?>
                            <tr class="clickable-row pointer" role="button" data-toggle="collapse" data-target="#collapse<?php echo $jurnal->id_jurnal;?>" aria-expanded="false" aria-controls="collapse<?php echo $jurnal->id_jurnal;?>">
                              <td scope="row" rowspan=2>
                              <div class="btn-group">
                              <button type="button" class="btn btn-warning btn-sm data_update" data-toggle="modal" data-target="#updateJurnal" data-id="<?php echo $jurnal->id_jurnal;?>" data-namajurn="<?php echo $jurnal->nama_jurnal;?>" data-pydst="<?php echo $jurnal->pyd_stat;?>" data-jenistrans="<?php echo $jurnal->jenistransaksi_jurnal;?>">
                                <i class="fas fa-edit" style="color:white;" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i>
                              </button>
                              <button type="button" class="btn btn-danger btn-sm deletedata" data-toggle="modal" data-target="#delModalJurnal<?php echo $jurnal->id_jurnal;?>" data-id="$1" data-tanggal="$2" data-aset="$8" data-kategori="$4" data-uraian="$5" data-ref="$6" data-saldo="$7">
                                <i class="fas fa-trash" data-toggle="tooltip" data-placement="right" title="Hapus"></i>
                              </button> </div></td>
                              <div class="modal fade" id="delModalJurnal<?php echo $jurnal->id_jurnal;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="<?php echo base_url("Home/deljurnal/".$jurnal->id_jurnal);?>"  role="button" type="button" class="btn btn-danger">Ya</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                              <td style="border-bottom:hidden;"><?php echo $jurnal->nama_jurnal;?></td>
                                    <?php
                                    $kas = 0;
                                    foreach($datatransaksijurnal as $datajt){
                                      ?>
                                      <?php if($datajt->id_jurnal == $jurnal->id_jurnal){?>
                                        <?php $kas+=$datajt->salds;
                                        } 
                                        ?>
                                    <?php } ?>
                                    <?php
                                    ?>
                              <td style="border-bottom:hidden;"><?php echo "Rp. " . number_format($kas, 2); ?></td>
                              <?php 
                                      if($jurnal->jenistransaksi_jurnal==1){
                                          $total_saldo_jurnal+=$kas;
                                        }
                                        else{
                                          $total_saldo_jurnal-=$kas;
                                        } 
                              ?>
                              <td> </td>
                              
                                
                            </tr>
                            <tr class="">
                                <td>
                                  <div id="collapse<?php echo $jurnal->id_jurnal;?>" style="" class="collapse multi-collapse table-secondary card">
                                  <div class="card-body p-0">
                                  <ul class="list-group p-0">
                                    <?php foreach($datatransaksijurnal as $datajt){?>
                                      <?php if($datajt->id_jurnal == $jurnal->id_jurnal){?>
                                        <div class="modal fade" id="delModalJt<?php echo $datajt->id_jt;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <a href="<?php echo base_url("Home/deljurnaltransaksi/".$datajt->id_jt);?>"  role="button" type="button" class="btn btn-danger">Ya</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                      <?php echo $datajt->nama_jt;?>
                                      <div class="group">
                                      <span class="badge badge-info badge-pill"><?php echo "Rp. " . number_format($datajt->salds, 2);?></span>
                                      <button data-target="#delModalJt<?php echo $datajt->id_jt;?>" type="button" class="btn btn-xs" data-toggle="modal" data-target=""><i class="fas fa-times text-orange"></i></button>
                                      </div>
                                    </li>
                                      <?php } ?>
                                    <?php } ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <form action="<?php echo site_url("Home/addjt/");?>" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                      <div class="form-group input-group col-md-6">
                                        <input type="text" class="form-control" id="inputNamajt" name="namajt">
                                      </div>
                                      <div class="form-group input-group col-md-4">
                                        <select id="inputKatjt" name="kategorijt" class="form-control" style="width:250px;">
                                        <option selected="selected" value="">Pilih Kategori</option>
                                          
                                          <?php foreach ($allcategory as $K_row__) { ?>
                                            <optgroup label="<?php echo strtoupper($K_row__->nama_kat_lr); ?>">
                                              <?php foreach ($kategori as $row_k) { ?>
                                                <?php
                                                $id_kat__1 = $row_k->id_kat_lr_kat;
                                                $id_kat__2 = $K_row__->id_kat_laba_rugi;
                                                ?>
                                                <?php if ($id_kat__1 == $id_kat__2) { ?>
                                                  <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>

                                                <?php } ?>
                                              <?php } ?>
                                            </optgroup>
                                          <?php } ?>
                                        </select>
                                      </div>
                                      <input type="hidden" name="idjurnal" value="<?php echo $jurnal->id_jurnal;?>">
                                      <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i></button>
                                      </div>
                                    </div>
                                    </form>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                                </td>
                            </tr>
                            <?php } ?>
                      </table>
                          

                      <!-- /.card-body -->
                      <div class="card-footer">
                        <?php if($total_saldo_jurnal<0){?>
                        <div class="card-title text-wight-bold">
                          Total saldo Jurnal = (<span id="totalsaldojurnal" class="btn-sm bg-secondary"><?php echo number_format($total_saldo_jurnal, 2); ?>)</span>
                        </div>
                        <?php 
                        }
                        else{
                        ?>
                        <div class="card-title text-wight-bold">
                          Total saldo Jurnal = <span id="totalsaldojurnal" class="btn-sm bg-secondary"><?php echo number_format($total_saldo_jurnal, 2); ?></span>
                        </div>
                        <?php } ?>
                        <br>
                        <br>
                        <?php if($total_saldo<0){?>
                        <div class="card-title text-wight-bold">
                          Total saldo Mutasi = (<span id="totalsaldo" class="btn-sm bg-info"><?php echo number_format($total_saldo, 2); ?>)</span>
                        </div>
                        <?php 
                        }
                        else{
                        ?>
                        <div class="card-title text-wight-bold">
                          Total saldo Mutasi = <span id="totalsaldo" class="btn-sm bg-info"><?php echo number_format($total_saldo, 2); ?></span>
                        </div>
                        <?php } ?>
                        <div class="card-title float-right">
                          <!-- <button class="btn btn-sm bg-info"><i class="fas fa-save"></i> Save</button> -->
                          <a role="button" type="button" href="<?php echo base_url("Home/previewjurnalpdf/".$curr_aset."/".$curr_month."/".$curr_year);?>" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Cetak Jurnal</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
          </div>
      </section>
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
      <!-- date-range-picker -->
      <script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
      <!-- repeater form -->
      <script src="<?php echo base_url(); ?>plugins/repeater/repeater.js"></script>
      <!-- pace-progress -->
      <script src="<?php echo base_url(); ?>plugins/pace-progress/pace.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
      <script>
          $("#seeAnotherField").change(function() {
          if ($(this).val() == "laba") {
          $('#otherFieldDiv').show();
          $('#otherField').attr('required', '');
          $('#otherField').attr('data-error', 'This field is required.');
          } else {
          $('#otherFieldDiv').hide();
          $('#otherField').removeAttr('required');
          $('#otherField').removeAttr('data-error');
          }
          });
          $("#seeAnotherField").trigger("change");
      
          $('#reservation').daterangepicker()
      </script>
      <script type="text/javascript">
        $(function(){

        $("#repeater").createRepeater();

        });
      </script>
      <script type="text/javascript">
        function functionPreviewpdf(jenlap,id_aset,bulan,tahun) {
          if(jenlap=="mutasi"){
            window.open("<?php echo base_url("Home/previewmutasipdf/"); ?>" + id_aset + "/" + bulan + "/" + tahun);
          }
          else if(jenlap=="laba"){
            window.open("<?php echo base_url("Home/previewlabapdf/"); ?>");
          }
        }
      </script>

      <script type="text/javascript">
        function functionRenderpdf(jenlap,id_aset,bulan,tahun) {
          if(jenlap=="mutasi"){
            window.open("<?php echo base_url("Home/pdfmutasirender/"); ?>" + id_aset + "/" + bulan + "/" + tahun);  
          }
          else if(jenlap=="laba"){
            window.open("<?php echo base_url("Home/pdflabarender/"); ?>");  
          }
        }
      </script>
      <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
      </script>

      <script>
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

          <?php if ($this->session->flashdata('faildel')) { ?>
            toastr.error('Tidak dapat Menghapus Data');
          <?php } ?>

          <?php if ($this->session->flashdata('successupdate')) { ?>
            toastr.success('Berhasil Menyimpan Data');
          <?php } ?>

          <?php if ($this->session->flashdata('successaddcat')) { ?>
            toastr.success('Berhasil Menyimpan Kategori');
          <?php } ?>

          <?php if ($this->session->flashdata('successupload')) { ?>
            toastr.success('Berhasil Menyimpan Bukti Transaksi');
          <?php } ?>

          <?php if ($this->session->flashdata('failupload')) { ?>
            toastr.error('Upload Gagal, Cek kembali ukuran dan tipe file');
          <?php } ?>

          $('[data-toggle="tooltip"]').tooltip();
        });

        <?php
        if (isset($curr_year)) {
        ?>
          var tahunaktif = document.getElementById("ftahun<?php echo $curr_year; ?>");
          tahunaktif.className += " font-weight-bold bg-info active";
        <?php
        }
        ?>
      </script>
      <script>
        <?php
        if (isset($curr_aset)) {
        ?>
          var bulanaktif = document.getElementById("namaaset<?php echo $curr_aset; ?>");
          bulanaktif.className += " font-weight-bold bg-info active";
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
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
          thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        document.getElementById('hari').innerHTML = months[month] + ' ' + year;
      </script>
      <script>
        function cetaktukar() {
          document.getElementById("cetakbtn").outerHTML = "";
        }
      </script>
      <script>
        $(document).ready(function() {
          var buttonCommon = {
            exportOptions: {
              format: {
                body: function(data, row, column, node) {
                  // Strip $ from salary column to make it numeric
                  return column === 5 ?
                    data.replace(/[$,]/g, '') :
                    data;
                }
              }
            }
          };

          $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
            "lengthMenu": [
              [15, 25, -1],
              [15, 25, "All"]
            ],
            "fixedColumns": true,
            "scrollCollapse": true,
            "columnDefs": [{
              "targets": [4],
              render: function(data, type, row) {
                return type === 'display' && data.length > 62 ?
                  data.substr(0, 62) + '…' :
                  data;
              }
            }],


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

            ajax: {
              "url": "<?php echo base_url() . $string_url_json; ?>",
              "type": "POST"
            },
            columns: [{
                "data": "view",
                className: "text-center",
                "bSortable": false,
                "bSearchable": false
              },
              {
                "data": "tanggal",
                className: "text-center",
                render: $.fn.dataTable.render.moment('DD MMM YYYY')
              },
              {
                "data": "ref",
                className: "text-left",
                "bSortable": false,
                "bSearchable": false,
                "visible": false
              },
              {
                "data": "nama_aset",
                className: "text-center"
                
              },
              {
                "data": "file_check",
                className: "text-center",
                "bSortable": false,
                "bSearchable": false,
                "visible": false
              },
              {
                "data": "uraian",
                className: "text-left"
              },
              {
                "data": "nama_kategori",
                "bSortable": false,
                "bSearchable": false,
                "visible": false
              },
              {
                "data": "saldo",
                className: "text-left",
                render: $.fn.dataTable.render.number(',', '.', 2, 'Rp.')
              }
              
            ],


            oLanguage: {
              sProcessing: "tunggu..."
            },

            order: [
              [1, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
              var index = iDisplayIndex + 1;
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
            }
          });
          // get Edit Records
          $('#tbmaster').on('click', '.data_update', function() {
            var id_transaksi = $(this).data('id');
            var tanggal = $(this).data('tanggal');
            var aset = $(this).data('aset');
            var kategori = $(this).data('kategori');
            var uraian = $(this).data('uraian');
            var ref = $(this).data('ref');
            var saldo = $(this).data('saldo');

            $('#modalUpdate').modal('show');
            $('[name="id_transaksi"]').val(id_transaksi);
            $('[name="uraian"]').val(uraian);
            $('[name="saldo"]').val(saldo);
            $('[name="tanggal"]').val(tanggal);
            if(kategori==1){
              document.getElementById("saldoawalupdateindex").disabled= false;
              document.getElementById("saldoawalupdateindex").selected= true;
            }
            else{
              document.getElementById("saldoawalupdateindex").disabled= true;
            }
            localStorage.setItem("Select1", aset);
            $('#selectaset').find('option').each(function(i, e) {
              if ($(e).val() == localStorage.getItem("Select1")) {
                $('#selectaset').prop('selectedIndex', i);
              }
            });
            localStorage.setItem("Select2", kategori);
            $('#selectkategori').find('option').each(function(i, e) {
              if ($(e).val() == localStorage.getItem("Select2")) {
                $('#selectkategori').prop('selectedIndex', i);
              }
            });

            localStorage.setItem("Select3", ref.charAt(0));
            $('#selectJenis').find('option').each(function(i, e) {
              if ($(e).val() == localStorage.getItem("Select3")) {
                $('#selectJenis').prop('selectedIndex', i);
              }
            });
          });
          $('#tbmaster').on('click', '.viewdata', function() {
            var id_transaksi = $(this).data('id');
            var tanggal = $(this).data('tanggal');
            var aset = $(this).data('aset');
            var kategori = $(this).data('kategori');
            var uraian = $(this).data('uraian');
            var ref = $(this).data('ref');
            var saldo = $(this).data('saldo');
            var tanggalupdate = $(this).data('time');
            var name_lr = $(this).data('lr');
            var name_kat = $(this).data('nkat');
            var nama_file = $(this).data('namfile');
            var ukuran_file = $(this).data('sizefile');
            var nama_user = $(this).data('user');
            var float_ukuran = parseFloat(ukuran_file);
            var size_file = float_ukuran / 1024;
            var jenistransaksi = "";
            if (ref.includes("K")) {
              jenistransaksi = "KREDIT";
            } else {
              jenistransaksi = "DEBIT";
            }
            var jenis_tranc = "";
            if (ref.includes("D")) {
              jenis_tranc = "DEBIT";
            } else {
              jenis_tranc = "KREDIT";
            }
            var dateOptions = {
              weekday: 'long',
              year: 'numeric',
              month: 'long',
              day: 'numeric'
            };
            var nd = new Date(tanggal);
            var t = tanggalupdate.split(/[- :]/);
            var newest__ = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5]));
            var weekday = new Array(7);
            weekday[0] = "Minggu";
            weekday[1] = "Senin";
            weekday[2] = "Selasa";
            weekday[3] = "Rabu";
            weekday[4] = "Kamis";
            weekday[5] = "Jum'at";
            weekday[6] = "Sabtu";

            
            $('[name="id_transaksi"]').val(id_transaksi);
            $('#modalview').modal('show');
              if(ukuran_file>0){
                document.getElementById("elemfiles_1").innerHTML = "<li id='elemfile1'><span class='mailbox-attachment-icon'><i class='far fa-file-pdf'></i></span><div class='mailbox-attachment-info'><i class='fas fa-paperclip'></i> <span id='nama_file'>"+nama_file+"</span><span class='mailbox-attachment-size clearfix mt-1'><span id='ukuranfile'>"+size_file.toFixed(2)+"</span> KB<a href='<?php echo base_url("Home/download_file/"); ?>"+id_transaksi+"' id='downloadthefile' class='btn btn-default btn-sm float-right'><i class='fas fa-cloud-download-alt'></i></a><a href='<?php echo base_url("Home/delfile/"); ?>" + id_transaksi+"' id='deletethefile' class='btn btn-default btn-sm float-right mr-1 pr-2 pl-2'><i class='fas fa-trash-alt'></i></a></span></div></li>";
                // document.getElementById("nama_file").innerHTML = nama_file;
                // document.getElementById("ukuranfile").innerHTML = size_file.toFixed(2);
              }
              else{
                document.getElementById("elemfiles_1").innerHTML = "";
              }
              document.getElementById("tanggal_update").innerHTML = weekday[newest__.getDay()] + ", " + tanggalupdate;
              document.getElementById("jen_tranview").innerHTML = jenis_tranc;
              document.getElementById("refview").innerHTML = ref;
              document.getElementById("namekat").innerHTML = name_kat;
              document.getElementById("userupdate").innerHTML = nama_user;
              document.getElementById("tanggalview").innerHTML = weekday[nd.getDay()] + ", " + nd.getDate() + "-" + (nd.getMonth() + 1) + "-" + nd.getFullYear();
              document.getElementById("asetview").innerHTML = aset;
              document.getElementById("saldoview").innerHTML = (saldo).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
              document.getElementById("uraianview").innerHTML = uraian;
              document.getElementById("name_lr").innerHTML = name_lr.toUpperCase();
              // document.getElementById("downloadthefile").href = "<?php echo base_url("Home/download_file/"); ?>" + id_transaksi;
              // document.getElementById("deletethefile").href = "<?php echo base_url("Home/delfile/"); ?>" + id_transaksi;
              document.getElementById("jenistransaksiview").innerHTML = jenistransaksi;
              
              document.getElementById("id_transaksi_file").value = id_transaksi;

              
          });
          $('#tbmaster').on('click', '.deletedata', function() {
            var id_transaksi = $(this).data('id');
            var tanggal = $(this).data('tanggal');
            var aset = $(this).data('aset');
            var kategori = $(this).data('kategori');
            var uraian = $(this).data('uraian');
            var ref = $(this).data('ref');
            var saldo = $(this).data('saldo');
            $('[name="id_transaksi"]').val(id_transaksi);
            $('#modaldel').modal('show');
            document.getElementById("data_id").innerHTML = "record_id(" + id_transaksi + ")";
            document.getElementById("refdel").innerHTML = ref;
            document.getElementById("tanggaldel").innerHTML = tanggal;
            document.getElementById("asetdel").innerHTML = aset;
            document.getElementById("saldodel").innerHTML = saldo;
          });
          
        });
      </script>
      <script type="text/javascript">
        function alertFilter(jenlap) {
          if(jenlap=="mutasi"){
            alert("filter sebelum melakukan percetakan");
          }
          else if(jenlap=="laba"){
            window.open("<?php echo base_url("Home/pdflabarender/"); ?>");
          }
        }
        function alertLihat(jenlap) {
          if(jenlap=="mutasi"){
            <?php 
            if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){ 
            ?>
            window.open("<?php echo base_url("Home/previewmutasipdf/".$curr_aset."/".$curr_month."/".$curr_year); ?>");
            <?php
            }
            else{
            ?>
            alert("Lakukan filter terlebih dahulu");
            <?php
            }
            ?>
          }
          else if(jenlap=="laba"){
            var reservation = document.getElementById("reservation").value;
            var getreserv = reservation.split('/').join('').split(' ').join('');
            window.open("<?php echo base_url("Home/previewlabapdf/"); ?>"+getreserv);
          }
        }
      </script>
      <script>
      <?php if($total_saldo==$total_saldo_jurnal){?>
        document.getElementById('totalsaldojurnal').classList.remove("bg-secondary");
        document.getElementById('totalsaldojurnal').classList.add("bg-info");
      <?php } ?>
      </script>
      <script>
        $('#updateJurnal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var idjurnal = button.data('id');
          var namajurn = button.data('namajurn');
          var jentran = button.data('jenistrans');
          var pydstat = button.data('pydst'); // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          document.getElementById("namajurnalupdate").value=namajurn;
          if(jentran==1){
            document.getElementById("jurnalupdate_jen_tran1").checked=true;
          }
          else{
            document.getElementById("jurnalupdate_jen_tran2").checked=true;
          }

          if(pydstat == 1){
            document.getElementById("pyd_stat_update").checked=true;
          }

          document.getElementById("idjurnalupdate").value=idjurnal;


        });
      </script>
</body>

</html>