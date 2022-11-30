<div class="wrapper">
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
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
                                <h3 class="card-title">Data Pengguna</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php if (isset($_GET['pesan'])) {
                                    if ($_GET['pesan'] == 'ditambahkan') { ?>
                                        <div class="alert alert-success" role="alert">
                                            Pengguna Berhasil ditambahkan
                                        </div>
                                    <?php } elseif ($_GET['pesan'] == 'gagal') { ?>
                                        <div class="alert alert-success" role="alert">
                                            Gagal Menambahkan Pengguna
                                        </div>
                                <?php }
                                }
                                ?>
                                <?php if ($_SESSION['role'] == 'user') { ?>
                                <?php } else { ?>
                                    <a href="tambahpengguna" class="btn btn-primary mb-2">Tambah Pengguna</a>
                                <?php } ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <?php if ($_SESSION['role'] == 'user') { ?>
                                            <tr>
                                                <th scope="col" width="1%">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <th scope="col" width="1%">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        <?php } ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/connection.php';
                                        $no = 1;

                                        if ($_SESSION['role'] == 'user') {
                                            $get_data = mysqli_query($conn, "SELECT * FROM tb_users WHERE id != 1");
                                        } else {
                                            $get_data = mysqli_query($conn, "SELECT * FROM tb_users");
                                        }
                                        while ($data = mysqli_fetch_assoc($get_data)) {
                                            $data_id = $data['id'];
                                        ?>
                                            <tr>
                                                <?php if ($_SESSION['role'] == 'user') { ?>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['username']; ?></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo ucfirst($data['role']); ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['username']; ?></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo ucfirst($data['role']); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($_SESSION['role'] == 'manager' and $data['role'] == 'admin') {
                                                            // echo "Limited Access";
                                                        ?>
                                                            <i>Not Allowed</i>
                                                        <?php } elseif ($_SESSION['role'] == 'admin' or 'manager') { ?>
                                                            <div class="container">
                                                                <a href="editpengguna-<?php echo $data_id ?>" class="btn btn-warning text-white">Edit</a>
                                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $data_id ?>">Delete</a>
                                                                <div class="modal fade" id="modal_delete<?php echo $data_id ?>">
                                                                    <div class="modal-dialog modal-md">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title">Modal Heading</h6>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5 style="text-align:center;">Yakin ingin menghapus data ?</h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <div class="row">
                                                                                    <div class="col" style="text-align:center ;">
                                                                                        <a href="deletepengguna-<?php echo $data_id ?>" class="btn btn-danger" id="delete_user">Hapus</a>
                                                                                        <a href="" class="btn btn-primary" data-dismiss="modal">Kembali</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <?php if ($_SESSION['role'] == 'user') { ?>
                                            <tr>
                                                <th scope="col" width="1%">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <th scope="col" width="1%">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        <?php } ?>
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