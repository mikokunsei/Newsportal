  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <?php 
      include "../config/connection.php";

      $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
      $data_web = mysqli_fetch_array($query_web);

      ?>
      <img src="public/image/icon/<?= $data_web['icon'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $data_web['title'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          <i class="fa fa-user-circle" style="font-size: 45px; color:grey;"></i>
        </div>
        <div class="info">
          <a href="dashboard" class="d-block"><b><?php echo ucfirst($_SESSION['role']); ?> | <?php echo ucfirst($_SESSION['username']); ?></b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Berita
                <i class="right fas fa-angle-left"></i>
                <?php
                

                $query_comment = mysqli_query($conn, "SELECT COUNT(notif) as jml_comment FROM tb_comments WHERE notif = 1");
                $data_comment = mysqli_fetch_array($query_comment);

                if ($data_comment['jml_comment'] == 0) {
                  # code...
                } else {
                ?>
                  <span class="badge badge-info right"><?= $data_comment['jml_comment'] ?></span>
                <?php } ?>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="media" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="berita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="komentar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komentar</p>
                  <?php 
                  if ($data_comment['jml_comment'] == 0) {
                    # code...
                  } else {
                  ?>
                    <span class="badge badge-info right"><?= $data_comment['jml_comment'] ?></span>
                  <?php } ?>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Utilitas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pengguna" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pesan" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pesan
                <?php


                $query_msg = mysqli_query($conn, "SELECT COUNT(notif) as jml_message FROM tb_messages WHERE notif = 1");
                $data_msg = mysqli_fetch_array($query_msg);

                if ($data_msg['jml_message'] == 0) {
                  # code...
                } else {
                ?>
                  <span class="badge badge-info right"><?= $data_msg['jml_message'] ?></span>
                <?php } ?>
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pengaturan" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>