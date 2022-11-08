<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
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
                                <h3 class="card-title">Data Komentar</h3>
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
                                            <th scope="col"  width="14%">Action</th>
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
                                        while ($data_comment = mysqli_fetch_assoc($get_comment)) {
                                            $data_id = $data_comment['id'] ;
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
                                                        <div class="container">
                                                            <a href="editkomentar-<?php echo $data_id; ?>" class="btn btn-warning">Edit</a>
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
                                                                                    <a href="deletekomentar-<?php echo $data_id ?>" class="btn btn-danger" id="delete_user">Hapus</a>
                                                                                    <a href="" class="btn btn-primary" data-dismiss="modal">Kembali</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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