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
                                <a href="tambahpengguna" class="btn btn-primary mb-2">Tambah Pengguna</a>
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
                                        $get_data = mysqli_query($conn, "SELECT * FROM tb_users WHERE role != 'admin'");
                                        while ($data = mysqli_fetch_array($get_data)) {
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
                                                        if ($data['role'] == 'admin') {
                                                            // echo "Limited Access";
                                                        ?>
                                                            <i>Not Allowed</i>
                                                        <?php } elseif ($_SESSION['role'] == 'user') { ?>
                                                            <a href="editpengguna-<?php echo $data['id']; ?>" class="btn btn-warning text-white disabled">Edit</a>
                                                            <a href="deletepengguna-<?php echo $data['id']; ?>" class="btn btn-danger disabled">Delete</a>
                                                        <?php } else { ?>
                                                            <a href="editpengguna-<?php echo $data['id']; ?>" class="btn btn-warning text-white">Edit</a>
                                                            <a href="deletepengguna-<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
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