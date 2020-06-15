<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    #splash {
      width: 100%;
      height: auto;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1;
      animation: moment-on 0s linear 5s;
      animation-fill-mode: forwards;
    }

    #wrapper {
      opacity: 0;
      animation: moment-off 4s linear 8s;
      animation-fill-mode: forwards;
      text-align: center;
      color: #555;
      border: 1px solid #aaa;
      border-radius: 10px;
      margin: 20px 20px;
      height: 450px;
      background-color: #fff;
    }

    h1 {
      text-shadow: 0 1.5px 0 rgba(0, 0, 0, 0.3);
    }

    .one-edge-shadow {
      -webkit-box-shadow: 0 8px 6px -6px black;
        -moz-box-shadow: 0 8px 6px -6px black;
              box-shadow: 0 8px 6px -6px black;
    }


    @keyframes moment-on {
      from {opacity: 1;} 
      0% {opacity: 0.1;}
      to {opacity: 0;}
    }

    @keyframes moment-off {
      from {opacity: 0;} 
      to {opacity: 1;}
    }
</style>
</head>
<body class="hold-transition login-page">
<img id="splash" src="dist/img/Final.gif"  alt="Logo Bulog">
<div class="login-box">
  <div class="login-logo">
  <img class="img-fluid" src="dist/img/BULOG.png"  alt="Logo Bulog">
    <a href="../../index2.html"><b>BULOG </b>DIVRE SULSELBAR</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukkan Akun Anda</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" data-toggle="tooltip" data-placement="left" title="Masukkan NOMOR INDUK PEGAWAI" placeholder="NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" data-toggle="tooltip" data-placement="left" title="Masukkan Password Anda" placeholder="Password">
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>
</body>
</html>
