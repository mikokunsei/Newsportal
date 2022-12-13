<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("location: login");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin News</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">

  <!-- Highchart CDN -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- icon -->
  <link rel="icon" href="../public/image/icon/vitech_asia.png" type="image/png">

  <style>
    #editor {
      width: 1000px;
      margin: 20px auto;
    }

    .ck-editor__editable[role="textbox"] {
      /* editing area */
      min-height: 200px;
    }

    .ck-content .image {
      /* block images */
      max-width: 80%;
      margin: 20px auto;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img src="../assets/css/images/purple_loading.gif" style="border-radius: 50%; width: 150px; height:150px;" alt="loading">
    </div>
    <!-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" target="_blank" class="nav-link">Berita</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- New Comments -->
        <li class="nav-item dropdown show">
          <a class="nav-link" data-toggle="dropdown" id="dropdown" href="#" aria-expanded="true">
            <i class="comments far fa-comments"></i>
            <span class="badge badge-danger navbar-badge notif" id="notif"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <ul class="coba">
            </ul>
            <a href="komentar" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>

        </li>
        <!-- Notification -->
        <li class="nav-item dropdown">
          <?php
          include "../config/connection.php";

          $query_msg = mysqli_query($conn, "SELECT COUNT(notif) as jml_message FROM tb_messages WHERE notif = 1");
          $data_msg = mysqli_fetch_array($query_msg);

          $query_comment = mysqli_query($conn, "SELECT COUNT(notif) as jml_comment FROM tb_comments WHERE notif = 1");
          $data_comment = mysqli_fetch_array($query_comment);


          ?>
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <?php
            $jml_notif = ($data_msg['jml_message'] + $data_comment['jml_comment']);

            if ($jml_notif > 0) {
            ?>
              <span class="badge badge-danger navbar-badge" style="size: 100px ;">
                <?= $jml_notif; ?>
              </span>
            <?php } ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">
              <?= $jml_notif; ?>
              Notifications
            </span>
            <div class="dropdown-divider"></div>
            <a href="pesan" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i>
              <?= $data_msg['jml_message']; ?>
              new messages
              <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="komentar" class="dropdown-item">
              <i class="fas fa-comments mr-2"></i>
              <?= $data_comment['jml_comment']; ?>
              comments
              <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
            </a>
            <!-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->