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
                                            <!-- <th scope="col">ID</th> -->
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" width="25%">Komentar</th>
                                            <th scope="col" width="10%">Tanggal</th>
                                            <th scope="col" width="10%">Status</th>
                                            <th scope="col" width="25%">Berita</th>
                                            <th scope="col" width="17%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config/connection.php';

                                        $no = 1;
                                        $sql = "SELECT tb_comments.id, tb_comments.nama, tb_comments.email, 
                                                    tb_comments.komentar, tb_comments.tgl, tb_comments.status, tb_comments.notif,
                                                    news_content.id AS news_id, news_content.title AS news_title
                                                    FROM tb_comments
                                                    JOIN news_content
                                                    ON tb_comments.news_id = news_content.id
                                                    ORDER BY tb_comments.id DESC";
                                        $get_comment = mysqli_query($conn, $sql);
                                        while ($data_comment = mysqli_fetch_assoc($get_comment)) {
                                            $data_id = $data_comment['id'];
                                        ?>
                                            <tr id="data-komentar-<?= $data_comment['id']; ?>" <?php
                                                if ($data_comment['notif'] == 1) {
                                                ?> style="font-weight: bold ;" <?php
                                                                            }
                                                                                ?>>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td><?php echo $data_comment['nama']; ?></td>
                                                <td><?php echo $data_comment['email']; ?></td>
                                                <td>
                                                    <?php
                                                    $komentar =  $data_comment['komentar'];

                                                    if (str_word_count($komentar) < 10) {
                                                        echo $komentar;
                                                    } else {
                                                        echo implode(' ', array_slice(explode(' ', $komentar), 0, 10)) . "...";
                                                    }
                                                    ?></td>
                                                <td><?php echo $data_comment['tgl']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['role'] != 'user') {
                                                    ?>
                                                        <select class="form-control " id="datastatus" name="status" data-id="<?php echo $data_comment['id'] ?>">
                                                            <?php
                                                            $sql_status = "SELECT status FROM tb_comments GROUP BY status";
                                                            $query_status = mysqli_query($conn, $sql_status);
                                                            while ($status = mysqli_fetch_array($query_status)) {
                                                            ?>
                                                                <option value="<?php echo $status['status'] ?>" <?php if ($status['status'] == $data_comment['status']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>><?php echo $status['status'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                        echo $data_comment['status'];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="../pages/single_page.php?id=<?= $data_comment['news_id'] ?>" target="_blank"><?php echo $data_comment['news_title']; ?></a>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($_SESSION['role'] != 'user') {
                                                    ?>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $data_id ?>">Delete</a>
                                                                </div>
                                                                <div class="col" style="display: flex;justify-content: center;align-items: center;">
                                                                    <br>
                                                                    <input type="checkbox" name="notif" id="notif" style="width: 25px ; height:25px;" data-id="<?= $data_comment['id']; ?>" 
                                                                    <?php
                                                                    if ($data_comment['notif'] != 1) {
                                                                        
                                                                    ?>
                                                                    checked
                                                                    <?php
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?>
                                                                    >
                                                                </div>
                                                            </div>
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
                                            <!-- <th scope="col">ID</th> -->
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