<?php

include "../config/connection.php";

if ($_SESSION['role'] == 'user') {
?>
    <script>
        window.location.href = "../admin/alert"
    </script>
<?php } elseif ($_SESSION['role'] == 'admin' or 'manager') { ?>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="pengguna">Pengguna</a></li>
                                <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                                        <h5 class="card-title">Form Tambah Pengguna</h5>
                                    </div>

                                    <div class="card-body">
                                        <!-- <div class="alert alert-danger" id="gagal" role="alert" style="display:none;">
                                            Gagal 
                                        </div> -->
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
                                        if (isset($_GET['username']) and isset($_GET['email'])) {
                                            $username = 'value="' . $_GET['username'] . '"';
                                            $email = 'value="' . $_GET['email'] . '"';
                                        } else {
                                            $username = "";
                                            $email = "";
                                        }
                                        ?>
                                        <form action="action/insert-user.php" method="POST" enctype="multipart/form-data">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label for="username" class="col-sm-2 col-form-label">
                                                        Username
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="username" id="" <?= $username; ?> placeholder="Masukkan Username" required>
                                                        <?= $pesan_username; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">
                                                        Email
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email" id="" <?= $email; ?> placeholder="Masukkan Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">
                                                        Password
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="password" id="" placeholder="Masukkan Password" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-sm-2 col-form-label">
                                                        Confirm Password
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Konfirmasi Password" required>
                                                        <?= $pesan_confirm; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="role" class="col-sm-2 col-form-label">
                                                        User Role Type
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                                            <option value="" selected disabled hidden>Pilih Role</option>
                                                            <option value="manager">Manager</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                    </div>
                                                </div>
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
<?php } ?>