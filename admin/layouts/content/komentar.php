<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Komentar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data Komentar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="1%">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" width="40%">Komentar</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Berita</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/connection.php';

                                        $no = 1;
                                        $sql = "SELECT tb_comments.id, tb_comments.nama, tb_comments.email, 
                                                    tb_comments.komentar, tb_comments.tgl, tb_comments.status, news_content.id AS news_id
                                                    FROM tb_comments
                                                    JOIN news_content
                                                    ON tb_comments.news_id = news_content.id
                                                    ORDER BY tb_comments.id DESC";
                                        $get_comment = mysqli_query($conn, $sql);
                                        while ($data_comment = mysqli_fetch_array($get_comment)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data_comment['nama']; ?></td>
                                                <td><?php echo $data_comment['email']; ?></td>
                                                <td><?php echo $data_comment['komentar']; ?></td>
                                                <td><?php echo $data_comment['tgl']; ?></td>
                                                <td><?php echo ucfirst($data_comment['status']); ?></td>
                                                <td>
                                                    <a href="../pages/single_page.php?id=<?= $data_comment['news_id'] ?>"><?php echo $data_comment['news_id']; ?></a>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['role'] == 'admin' or 'manager') {
                                                    ?>
                                                        <a href="editkomentar-<?php echo $data_comment['id']; ?>" class="btn btn-warning">Edit</a>
                                                        <a href="deletekomentar-<?php echo $data_comment['id']; ?>" class="btn btn-danger">Delete</a>
                                                    <?php
                                                    } else { ?>
                                                        <i>Not Allowed</i>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col" width="1%">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Komentar</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Berita</th>
                                            <th scope="col">Action</th>
                                        </tr>
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