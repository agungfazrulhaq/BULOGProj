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
          <div class="col-sm-6">
            <h1>Mutasi Kas Opaset</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><div id="clock"></div></li>
            </ol>
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
                  <h4 class="modal-title w-100 font-weight-bold">Masukkan Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Tanggal</label>
                    <input type="date" id="defaultForm-email" class="form-control validate" name="tanggal">
                  </div>

                  <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Aset</label>
                    <select class="form-control select2" style="width: 100%;" name="aset">
                      <option selected="selected" value="null">Pilih Unit</option>
                      <!-- <option>BARUGA LAPPO ASE</option>
                      <option>WISMA LAPPO ASE</option>
                      <option>GEDUNG OLAH RAGA (GOR)</option>
                      <option>MESS MALINO</option>
                      <option>RUKO DAN LAHAN</option>
                      <option>SUB DIVRE PARE</option>
                      <option>SUB DIVRE PLP</option>
                      <option>SUB DIVRE MKSR</option>
                      <option>DIVRE SULSEL</option> -->
                      <?php foreach ($aset as $row_a){ ?>
                      <option value="<?php echo $row_a->id_aset; ?>"><?php echo $row_a->nama_aset; ?></option>
                      <?php }?>
                    </select>
                  </div>

                  <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Kategori</label>
                    <select class="form-control select2" style="width: 100%;" name="kategori">
                      <option selected="selected" value="null">Pilih Kategori</option>
                      <!-- <option>Sewa Assets</option>
                      <option>Sewa Assets dari PYD/Hotel</option>
                      <option>Biaya Operasional</option>
                      <option>Harga Pokok Penjualan</option>
                      <option>Biaya Pegawai</option>
                      <option>Biaya Kantor, ATK</option>
                      <option>Biaya Listrik/Telp/Air</option>
                      <option>Biaya Perjalanan Dinas</option>
                      <option>Biaya Perbaikan/Pemeliharaan</option>
                      <option>Biaya PPN</option>
                      <option>Biaya Pajak PPh Pasal 4(2)</option>
                      <option>Biaya Pajak PPh Pasal 21</option>
                      <option>Biaya Pajak Restoran & Hotel</option>
                      <option>PBB</option>
                      <option>Biaya Lain-lain</option>
                      <option>Pendapatan Bunga Bank</option>
                      <option>Pendapatan Lain-Lain</option>
                      <option>Biaya Bank</option>
                      <option>Biaya Admin</option>
                      <option>Biaya Penyusutan</option> -->
                      <?php foreach($kategori as $row_k){?>
                      <option value="<?php echo $row_k->id_kategori; ?>"> <?php echo $row_k->nama_kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Uraian</label>
                    <textarea type="textarea" class="form-control validate" name="uraian"></textarea>
                  </div>

                  <div class="md-form mb-3">
                    <button class="btn btn-default">Unggah</button>
                  </div>
                  

                  <div class="md-form mb-3">
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
                  
                  <div class="md-form mb-3">
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
                </form>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modalLoginForm">Tambah</button>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
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
                  <a href="" class="nav-link"> <?php echo $row_a->nama_aset; ?></a>
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
              <h3 class="card-title">Dashboard <b>[ Bulan : <span id="hari"></span> ]</b></h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
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
                <table class="table table-hover table-bordered table-sm"  style="text-align: center;" id="example1">
                    <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
                    <!-- <form action="<?php echo site_url('Home/deletechecked') ?>" method="post" enctype="multipart/form-data" id="checkdeleteform"> -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm" id="btn-delete-check"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload()"><i class="fas fa-sync-alt"></i></button>
                    <div class="float-right">
                      
                      </div>
                      <!-- /.btn-group -->
                    </div>
                    <!-- /.float-right -->
                  </div>
                  <thead class="" >
                    <tr>
                      <b>
                        <td></td>
                        <td></td>
                        <td>TANGGAL</td>
                        <td>REF</td>
                        <td>URAIAN</td>
                        <td></td>  
                        <td>SALDO</td>
                      </b>
                    </tr>
                  </thead>
                  <?php foreach ($transaksi as $row_t){?>
                  <tbody id="myTable">
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="<?php echo $row_t->id_transaksi; ?>" id="check<?php echo $row_t->id_transaksi; ?>" name="checkdel[]">
                        <label for="check<?php echo $row_t->id_transaksi; ?>"></label>
                      </div>
                    </td>
                  </form>
                    <td><a class="btn btn-primary btn-sm" style="color:white;" data-toggle="modal" data-target="#modalForm<?php echo $row_t->id_transaksi;?>">Lihat</a></td>
                    <td class="mailbox-star"><?php echo date('d', strtotime($row_t->tanggal)); ?></td>
                    <td class="mailbox-star"><?php echo $row_t->ref; ?></a></td>
                    <td class="mailbox-subject"><?php $out = strlen($row_t->uraian) > 75 ? substr($row_t->uraian,0,75)."..." : $row_t->uraian; echo $out;  ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo "Rp. " . number_format($row_t->saldo, 2, ",", "."); ?></td>
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
                                <a href="<?php echo site_url('Home/del/'.$row_t->id_transaksi);?>"><button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> HAPUS</button></a>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
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
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + " " + a_p;
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
