
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Media Berita</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Data Media Berita</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
            <!-- <a href="addmahasiswa" class="btn btn-primary mb-2">Tambah Data</a> -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr style="text-align:center ;">
                      <th scope="col" width="1%">No</th>
                      <th scope="col">Nama Media</th>
                      <th scope="col" width="40%" >Jumlah Berita</th>
                      <!-- <th scope="col">NPM</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Email</th>
                      <th scope="col">No.Hp</th>
                      <th scope="col" width="20%">Foto</th>
                      <th scope="col" width="20%">Alamat</th>
                      <th scope="col" width="20%">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include '../config/connection.php';

                    $no = 1;
                    $get_data = mysqli_query($conn,"SELECT media_name, COUNT(media_name) AS jumlah_media FROM news_content WHERE media = 'news' GROUP BY media_name");
                    while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                      <tr style="text-align:center ;">
                          <td><?= $no++; ?></td>
                          <td><?= $data['media_name'];?></td>
                          <td><?= $data['jumlah_media'].' berita';?></td>
                         
                      </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                  <tr style="text-align:center ;">
                      <th scope="col" width="1%">No</th>
                      <th scope="col">Nama Media</th>
                      <th scope="col">Jumlah Berita</th>
                      <!-- <th scope="col">NPM</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Email</th>
                      <th scope="col">No.Hp</th>
                      <th scope="col" width="20%">Foto</th>
                      <th scope="col" width="20%">Alamat</th>
                      <th scope="col" width="20%">Action</th> -->
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
</div>