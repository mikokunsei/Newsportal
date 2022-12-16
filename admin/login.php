<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
  <!-- Icon Logo -->
  <link rel="icon" href="public/image/icon/logo_icon_vta.png" type="image/png">
</head>



<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Admin</b></a>
      </div>
      <div class="card-body">
        <?php


        $pesan_password = "";
        $pesan_username = "";
        $pesan_captcha = "";

        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == 'gagal-password') {
            $pesan_password = "<span style='color:red;'>Wrong Password</span>";
          } elseif ($_GET['pesan'] == 'gagal-username') {
            $pesan_username = "<span style='color:red;'>Invalid Username</span>";
          } elseif ($_GET['pesan'] == 'gagal-captcha') {
            $pesan_captcha = "<span style='color:red;'>Incorrect Captcha !</span>";
          }
        }
        ?>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="authentification.php" method="POST">
          <?= $pesan_username; ?>
          <div class="input-group mb-3">
            <input type="username" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= $pesan_password ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group">
            <div class="captcha">
              <?php

              session_start();

              $char = strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 4));
              $str = rand(1, 7) . rand(1, 7) . $char;

              $_SESSION['captcha_id'] = $str;
              
              echo "<h3>" . $_SESSION['captcha_id'] . "</h3>";
              ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="captcha" class="text-info">Captcha : <?= $pesan_captcha; ?>
              <input type="text" class="form-control" name="captcha" id="captcha" placeholder="type here..." required>
            </label>
          </div>
          <div class="row">
            <!-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> -->
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="template/dist/js/adminlte.min.js"></script>
</body>

</html>