<?php

include "../config/connection.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="far fa-newspaper  "></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Berita</span>
              <?php

              $sql_total_news = "SELECT COUNT(id) as total_berita FROM news_content WHERE media = 'news' ";
              $query_total = mysqli_query($conn, $sql_total_news);
              $data_total = mysqli_fetch_array($query_total);

              ?>
              <span class="info-box-number">
                <?= $data_total['total_berita']; ?>
                <small>Bertia</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="far fa-comment-dots"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Komentar</span>
              <?php

              $sql_komentar = "SELECT COUNT(komentar)AS jml_komentar FROM tb_comments ";
              $query_komentar = mysqli_query($conn, $sql_komentar);
              $data_komentar = mysqli_fetch_array($query_komentar);

              ?>
              <span class="info-box-number"><?= $data_komentar['jml_komentar']; ?>
                <small>Komentar</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="	fas fa-pencil-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Media</span>
              <?php
              $sql_media = "SELECT COUNT(DISTINCT media_name) AS jml_media FROM news_content WHERE media = 'news' ";
              $query_media = mysqli_query($conn, $sql_media);
              $data_media = mysqli_fetch_array($query_media);
              ?>
              <span class="info-box-number"><?= $data_media['jml_media']; ?>
                <small>Media</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pengguna</span>
              <?php

              $sql_pengguna = "SELECT COUNT(id) AS jml_pengguna FROM tb_users ";
              $query_pengguna = mysqli_query($conn, $sql_pengguna);
              $data_pengguna = mysqli_fetch_array($query_pengguna);

              ?>
              <span class="info-box-number"><?= $data_pengguna['jml_pengguna']; ?>
                <small>Pengguna</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Grafik Berita by Media</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <!-- GRAFIK BERITA by Media -->
        <div class="card-body">
          <!-- CHART BAR -->
          <div class="row">
            <div class="col-md-12">
              <div id="highchart_bar">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Grafik Berita by Kategori</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <!-- GRAFIK BERITA by Kategori -->
        <div class="card-body">
          <!-- CHART PIE -->
          <div class="row">
            <div class="col-md-12">
              <div id="highchart_pie">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Grafik Berita by Kategori</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <!-- COBA CHART ADMINLTE -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-7">
              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Donut Chart</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> -->
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- right -->
            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->
        </div>

      </div>

    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->