<?php 

include '../config/connection.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] != ""){

        $id = $_GET['id'];

        $sql = "SELECT * FROM tb_comments WHERE id = '$id'";
        $get_comment = mysqli_query($conn, $sql);
        $data_comment = mysqli_fetch_array($get_comment);

    } else {
        header("location:komentar");
    }
} else {
    header("location:komentar");
}

if ($_SESSION['role'] == 'admin' OR 'manager') {

?>

<div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="komentar">Komentar</a></li>
                                <li class="breadcrumb-item active">Edit Komentar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="col-lg-11">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Form Edit Komentar</h5>
                                    </div>

                                    <div class="card-body">
                                        <form action="action/update-komentar.php" method="POST" enctype="multipart/form-data">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label for="role" class="col-sm-3 col-form-label">
                                                        Status Komentar :
                                                    </label>
                                                    <div>
                                                        <input type="hidden" class="form-control" name="id" value="<?php echo $data_comment['id']; ?>" id="">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                                            <option value="" selected disabled hidden>Pilih Status</option>
                                                            <option value="aktif" <?php if ($data_comment['status'] == 'aktif') {
                                                                                        echo 'selected';
                                                                                    } ?>>Aktif</option>
                                                            <option value="nonaktif" <?php if ($data_comment['status'] == 'nonaktif') {
                                                                                        echo 'selected';
                                                                                    } ?>>Nonaktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


<?php 
    }
?>