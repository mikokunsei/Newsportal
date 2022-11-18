<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Tabel Berita</li>
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
                                <h3 class="card-title">Tabel Berita</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php if ($_SESSION['role'] == 'user') { ?>
                                <?php } else { ?>
                                    <a href="tambahberita" class="btn btn-primary mb-2">Tambah Berita</a>
                                <?php } ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="1%">No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Media</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" width="5%">Sumber</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/connection.php';

                                        $no = 1;
                                        $sql = "SELECT * FROM news_content WHERE media = 'news' ORDER BY id DESC";
                                        $query = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $data_id = $data['id'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>
                                                    <a href="../pages/single_page.php?id=<?= $data['id'] ?>"><?php echo $data['id']; ?></a>
                                                </td>
                                                <td><?php echo $data['title']; ?></td>
                                                <td><?php echo $data['media_name']; ?></td>
                                                <td><?php echo $data['c_canal']; ?></td>
                                                <td><?php echo $data['link']; ?></td>
                                                <td><?php echo $data['jml_view']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['role'] == 'admin' or 'manager') {
                                                    ?>
                                                        <div class="container">
                                                            <a href="editberita-<?php echo $data_id ?>" style="width: 70px ;" class="btn btn-warning">Edit</a>
                                                            <a href="" style="width: 70px ;" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $data_id ?>">Delete</a>
                                                            <div class="modal fade" id="modal_delete<?php echo $data_id ?>">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Pesan</h6>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5 style="text-align:center;">Yakin ingin menghapus data ?</h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="row">
                                                                                <div class="col" style="text-align:center ;">
                                                                                    <a href="deleteberita-<?php echo $data_id ?>" class="btn btn-danger" id="delete_berita">Hapus</a>
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