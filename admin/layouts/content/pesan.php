<div class="wrapper">
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Pesan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pesan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="1%">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/connection.php';
                                        $no = 1;

                                        $get_data = mysqli_query($conn, "SELECT * FROM tb_messages ORDER BY tgl DESC");
                                        while ($data = mysqli_fetch_assoc($get_data)) {
                                            $data_id = $data['id'];
                                        ?>
                                            <tr <?php if ($data['notif'] == 1) {
                                                echo 'style="font-weight: bold ;"';
                                            } ?>>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['email']; ?></td>
                                                <td><?php echo $data['pesan']; ?></td>
                                                <td><?php echo $data['tgl']; ?></td>
                                                <td>
                                                    <div class="container">
                                                        <a href="detailpesan-<?php echo $data['id'] ?>" class="btn btn-primary text-white">Detail</a>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                    </tbody>
                                    <tfoot>
                                        <th scope="col" width="1%">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Action</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>