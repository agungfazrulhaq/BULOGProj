<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <link rel = "icon" href ="dist/img/Logo.png"  type = "image/x-icon"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css') ?>">
  <style>
    body {
  margin: 0;
  background: #000; 
}
video { 
    position: fixed;
    top: 40%;
    left: 38%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 background: url('<?php echo base_url();?>dist/img/FinalOutput.webm') no-repeat;
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: white;
  padding: 2rem;
  width: 33%;
  margin:2rem;
  float: right;
  font-size: 1.2rem;
}
h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 80%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 400px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 700px) {
  html { background: url(dist/img/FinalOutput.webm) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}
  </style>
</head>
<body class="hold-transition login-page">
  <video poster="<?php echo base_url();?>dist/img/FinalOutput.webm" id="bgvid" playsinline autoplay muted loop>
  <source src="<?php echo base_url();?>dist/img/FinalOutput.webm" type="video/webm">

</video>

<div class="login-box">
  <div class="card">
  <div class="card-body login-card-body">
  <div class="login-logo">
  <img class="img-fluid" width="120" height="120" src="<?php echo base_url();?>dist/img/Logo.png"  alt="Logo Bulog">
  <h2 class="text-dark"><b>BULOG <br>KANWIL SULSELBAR</b></h2>
  </div>
      <p class="login-box-msg">Masukkan Akun Anda</p>

      <form action="<?php echo site_url("Login/")?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" data-toggle="tooltip" data-placement="left" title="Masukkan NOMOR INDUK PEGAWAI" placeholder="NIP" name="nip">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" data-toggle="tooltip" data-placement="left" title="Masukkan Password Anda" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <!-- /.col -->
          <div class=" float-center">
            <button type="submit" class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="bottom" title="Kehalaman Dasboard">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>
<script>
$(document).ready(function(){
   <?php if ($this->session->flashdata('successlogout')) { ?>
      toastr.success('Berhasil Log out');
   <?php } ?>

   <?php if ($this->session->flashdata('failedlogin')) { ?>
      toastr.error('Gagal Log in');
   <?php } ?>
});
</script>

<script>
  var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    
}

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
// only functional if "loop" is removed 
vid.pause();
// to capture IE10
vidFade();
}); 



</script>
</body>
</html>
