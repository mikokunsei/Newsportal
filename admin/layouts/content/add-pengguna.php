<?php
if ($_SESSION['role'] == 'admin' OR 'manager') {
?>

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
                                        <form action="action/insert-user.php" method="POST" enctype="multipart/form-data">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label for="username" class="col-sm-2 col-form-label">
                                                        Username
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="username" id="" placeholder="Masukkan Username" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">
                                                        Email
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email" required>
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
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="role" class="col-sm-2 col-form-label">
                                                        User Role Typle
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

<?php
} else { ?>
    <div class="wrapper">
        <div class="content-wrapper" style="text-align:center;">
            <section class="content">
                <i>Not Allowed</i>
            </section>
        </div>
    </div>
<?php } ?>