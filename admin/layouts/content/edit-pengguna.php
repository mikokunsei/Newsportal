<?php

include '../config/connection.php';


if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM tb_users WHERE id = '$id'");
        $row = mysqli_fetch_array($query);
    } else {
        header("location:pengguna");
    }
} else {
    header("location:pengguna");
}

if ($_SESSION['role'] == 'user' and $id == 1) { ?>

    <script>
        window.location.href = "../admin/alert"
    </script>

<?php
} elseif ($_SESSION['role'] == 'user') { ?>
    <script>
        window.location.href = "../admin/alert"
    </script>
<?php
} elseif ($_SESSION['role'] == 'manager' and $id == 1) { ?>
    <script>
        window.location.href = "../admin/alert"
    </script>
    <?php
} elseif ($_SESSION['role'] == 'admin' or 'manager') {

    if ($_GET['id'] == $row['id']) {
    ?>
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="pengguna">Pengguna</a></li>
                                    <li class="breadcrumb-item active">Edit Pengguna</li>
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
                                            <h5 class="card-title">Form Edit Pengguna</h5>
                                        </div>

                                        <div class="card-body">
                                            <?php
                                            $pesan_username = "";
                                            $pesan_confirm = "";
                                            if (isset($_GET['pesan'])) {
                                                if ($_GET['pesan'] == 'gagal-username') {
                                                    $pesan_username = "<span style='color:red;'>Username telah digunakan</span>";
                                                } elseif ($_GET['pesan'] == 'gagal-confirm') {
                                                    $pesan_confirm = "<span style='color:red;'>Password tidak sesuai</span>";
                                                }
                                            }

                                            // echo $_GET['pesan'];

                                            ?>
                                            <form action="action/update-user.php" method="POST" enctype="multipart/form-data">
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-2 col-form-label">
                                                            Username
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <?php if ($_SESSION['role'] == 'manager') { ?>
                                                                <input type="text" class="form-control" name="username" id="" disabled value="<?= $row['username'] ?>">
                                                            <?php } else { ?>
                                                                <input type="text" class="form-control" name="username" id="" value="<?= $row['username'] ?>">
                                                            <?php } ?>
                                                            <input type="hidden" name="id" class="form-control" value="<?= $row['id']; ?>" id="">
                                                            <?= $pesan_username; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-2 col-form-label">
                                                            Email
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email" id="" value="<?= $row['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password" class="col-sm-2 col-form-label">
                                                            Password
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="password" id="" placeholder="Masukkan Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password_confirmation" class="col-sm-2 col-form-label">
                                                            Confirm Password
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Konfirmasi Password">
                                                            <?= $pesan_confirm; ?>
                                                        </div>
                                                    </div>
                                                    <?php if ($_SESSION['username'] != $row['username']) { ?>
                                                        <div class="form-group row">
                                                            <label for="role" class="col-sm-2 col-form-label">
                                                                User Role Type
                                                            </label>
                                                            <div class="col-sm-2">
                                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                    <option value="" selected disabled hidden>Pilih Role</option>
                                                                    <option value="manager" <?php if ($row['role'] == 'manager') {
                                                                                                echo 'selected';
                                                                                            } ?>>Manager</option>
                                                                    <option value="user" <?php if ($row['role'] == 'user') {
                                                                                                echo 'selected';
                                                                                            } ?>>User</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-info">Submit</button>
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
    <?php } else { ?>
        <script>
            window.location.href = "../admin/alert"
        </script>
    <?php }
} else { ?>
    <script>
        window.location.href = "../admin/alert"
    </script>
<?php } ?>