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
                                <?php
                                if (isset($_GET['pesan'])) { ?>
                                    <?php if ($_GET['pesan'] == 'berhasil') { ?>
                                        <div class="alert alert-success" role="alert">
                                            Berhasil Menambahkan Berita
                                        </div>
                                    <?php } elseif ($_GET['pesan'] == 'hapus') { ?>
                                        <div class="alert alert-success" role="alert">
                                            Berita Berhasil dihapus
                                        </div>
                                    <?php } ?>
                                <?php
                                }
                                ?>
                                <div class="row mb-2">
                                    <div class="col-sm-12 col-md-6">
                                        <a href="tambahberita" class="btn btn-primary mb-2">Tambah Berita</a>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <form class="row" action="index.php" method="GET">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>By : </label>
                                                <select class="form-control form-control-sm" name="kolom" id="">
                                                    <option value="title" default selected>--Select--</option>
                                                    <option value="id">ID</option>
                                                    <option value="title">Judul</option>
                                                    <option value="media_name">Media</option>
                                                    <option value="c_canal">Kategori</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Search:</label>
                                                <input name="page" value="berita" type="hidden">
                                                <input name="halaman" value="1" type="hidden">
                                                <input type="search" id="myInput" name="search" class="form-control form-control-sm" placeholder="Type..." aria-controls="example1">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-bordered table-striped">
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


                                        $limit = 10;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $search = isset($_GET['search']) ? $_GET['search'] : "";
                                        $kolom = isset($_GET['kolom']) ? $_GET['kolom'] : "";
                                        // $search = isset($_GET['search']);

                                        $start = ($halaman > 1) ? ($halaman * $limit) - $limit : 0;

                                        if ($search) {
                                            // $search = $_GET['search'];
                                            $get_data_hal = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND $kolom LIKE '%$search%'");
                                        } else {
                                            $get_data_hal = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'");
                                        }
                                        $jml_data = mysqli_num_rows($get_data_hal);
                                        $jml_halaman = ceil($jml_data / $limit);

                                        // echo "jumlah data : " . $jml_data . '<br>';
                                        // echo "jumlah halaman : " . $jml_halaman . '<br>';
                                        // echo "posisi halaman ke : " . $halaman . '<br>';
                                        // echo "mencari : " . $search;


                                        $no = $start + 1;


                                        if ($search) {
                                            // $search = $_GET['search'];
                                            $sql = "SELECT * FROM news_content WHERE media = 'news' AND $kolom LIKE '%$search%' ORDER BY id DESC LIMIT $start, $limit";
                                        } else {
                                            $sql = "SELECT * FROM news_content WHERE media = 'news' ORDER BY id DESC LIMIT $start, $limit";
                                        }

                                        $query = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $data_id = $data['id'];
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <?= $data['id']; ?>
                                                </td>
                                                <td>
                                                    <a href="../pages/single_page.php?id=<?= $data['id'] ?>" target="_blank"><?= $data['title']; ?></a>
                                                </td>
                                                <td><?= $data['media_name']; ?></td>
                                                <td><?= $data['c_canal']; ?></td>
                                                <td>
                                                    <a href="<?= $data['link']; ?>" target="_blank"><?= $data['link']; ?></a>
                                                </td>
                                                <td><?= $data['jml_view']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['role'] == 'admin' or 'manager') {
                                                    ?>
                                                        <div class="container">
                                                            <a href="editberita-<?= $data_id ?>" style="width: 70px ;" class="btn btn-warning">Edit</a>
                                                            <?php
                                                            if ($_SESSION['role'] != 'user') {
                                                            ?>
                                                                <a href="" style="width: 70px ;" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?= $data_id ?>">Delete</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="modal fade" id="modal_delete<?= $data_id ?>">
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
                                                                                    <a href="deleteberita-<?= $data_id ?>" class="btn btn-danger" id="delete_berita">Hapus</a>
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
                                            <th scope="col">ID</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Media</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" width="5%">Sumber</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pagination mt-3">
                                    <?php if ($jml_halaman > 0) {
                                    ?>
                                        <ul class="pagination">
                                            <?php
                                            $previous = $halaman - 1;
                                            $next = $halaman + 1;

                                            // PREVIOUS
                                            if ($halaman != 1) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman - 1 ?>&search=<?= $search ?>">Previous</a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman - 1 ?>">Previous</a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }

                                            // 1 Halaman dan titik
                                            if ($halaman > 3) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=1&search=<?= $search ?>&kolom=<?= $kolom ?>">1</a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-1">1</a>
                                                    <?php } ?>
                                                </li>
                                                <?php
                                                if ($halaman > 4) {
                                                ?>
                                                    <li class="page-item"><a class="page-link">...</a></li>
                                                <?php
                                                }
                                            }

                                            // 2 Halaman
                                            if ($halaman - 2 > 0) {
                                                ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman - 1 ?>&search=<?= $search ?>&kolom=<?= $kolom ?>"><?= $halaman - 2 ?></a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman - 2 ?>"><?= $halaman - 2 ?></a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }

                                            if ($halaman - 1 > 0) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman - 1 ?>&search=<?= $search ?>&kolom=<?= $kolom ?>"><?= $halaman - 1 ?></a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman - 1 ?>"><?= $halaman - 1 ?></a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                            <!-- CURRENT -->
                                            <li class="page-item active"><a class="page-link"><?= $halaman; ?></a></li>

                                            <?php

                                            // 2 Halaman
                                            if ($halaman + 1 < $jml_halaman + 1) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman + 1 ?>&search=<?= $search ?>&kolom=<?= $kolom ?>"><?= $halaman + 1 ?></a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman + 1 ?>"><?= $halaman + 1 ?></a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }
                                            if ($halaman + 2 < $jml_halaman + 1) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman + 2 ?>&search=<?= $search ?>&kolom=<?= $kolom ?>"><?= $halaman + 2 ?></a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman + 2 ?>"><?= $halaman + 2 ?></a>
                                                    <?php } ?>
                                                </li>
                                                <?php
                                            }

                                            if ($halaman < $jml_halaman - 2) {
                                                if ($halaman < $jml_halaman - 3) {
                                                ?>
                                                    <li class="page-item"><a class="page-link">...</a></li>

                                                <?php
                                                }
                                                ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $jml_halaman ?>&search=<?= $search ?>&kolom=<?= $kolom ?>"><?= $jml_halaman ?></a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $jml_halaman ?>"><?= $jml_halaman ?></a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }


                                            if ($halaman != $jml_halaman) {
                                            ?>
                                                <li class="page-item">
                                                    <?php if ($search) {
                                                        $search = $_GET['search'];
                                                    ?>
                                                        <a class="page-link" href="index.php?page=berita&halaman=<?= $halaman + 1 ?>&search=<?= $search ?>&kolom=<?= $kolom ?>">Next</a>
                                                    <?php } else { ?>
                                                        <a class="page-link" href="berita-halaman-<?= $halaman + 1 ?>">Next</a>
                                                    <?php } ?>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>