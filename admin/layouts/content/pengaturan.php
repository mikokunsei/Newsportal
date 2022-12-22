<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Pengaturan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Pengaturan</h5>
                                </div>
                                <div class="card-body">
                                    <form action="action/update-web.php" method="POST" enctype="multipart/form-data">
                                        <div class="container">
                                            <?php
                                            include "../config/connection.php";

                                            $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1 ");
                                            $data_web = mysqli_fetch_assoc($query_web);

                                            ?>
                                            <div class="form-group row">
                                                <label for="title" class="col-sm-3 col-form-label">
                                                    Title
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="title" id="" value="<?= $data_web['title'] ?>" placeholder="Masukkan Judul" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="logo" class="col-sm-3 col-form-label">
                                                    Logo
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="imgWrap" style="margin-bottom: 25px ;">
                                                        <img src="../admin/public/image/logo/<?= $data_web['logo'] ?>" style="width : 150px ; height: 100px;" id="imgView" class="img img-fluid">
                                                    </div>
                                                    <span>* Ekstensi file <?= strtoupper($data_web['ekstensi']) ?> max <?= $data_web['size_file'] ?>MB</span>
                                                    <input type="file" class="form-control" id="inputFile" name="logo" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="icon" class="col-sm-3 col-form-label">
                                                    Icon
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="imgWrap2" style="margin-bottom: 25px ;">
                                                        <img src="../admin/public/image/icon/<?= $data_web['icon'] ?>" style="width : 150px ; height: 100px;" id="imgView2" class="img img-fluid">
                                                    </div>
                                                    <span>* Ekstensi file <?= strtoupper($data_web['ekstensi']) ?> max <?= $data_web['size_file'] ?>MB</span>
                                                    <input type="file" class="form-control" id="inputFile2" name="icon" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-3 col-form-label">
                                                    Alamat
                                                </label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="5" placeholder="Masukkan Alamat" required><?= $data_web['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="email" id="" value="<?= $data_web['email'] ?>" placeholder="Masukkan Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telp" class="col-sm-3 col-form-label">
                                                    No. Telp
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" name="telp" id="" value="<?= $data_web['no_telp'] ?>" placeholder="Masukkan Nomor Telpon" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="copyright" class="col-sm-3 col-form-label">
                                                    Copyright
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="copyright" id="" value="<?= $data_web['copyright'] ?>" placeholder="Masukkan Copyright" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tahun" class="col-sm-3 col-form-label">
                                                    Tahun
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="tahun" id="" value="<?= $data_web['tahun'] ?>" placeholder="Masukkan Tahun" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="size_file" class="col-sm-3 col-form-label">
                                                    Ukuran File
                                                </label>
                                                <div class="col-sm-1">
                                                    <input type="number" class="form-control" min="1" max="10" name="size_file" id="sizeFile" value="<?= $data_web['size_file'] ?>" placeholder="0" required>
                                                </div>
                                                <label for="size_file" class="col-sm-2 col-form-label">
                                                    MB <span>(max 10 MB)</span>
                                                </label>
                                            </div>

                                            <div class="form-group row">
                                                <label for="ekstensi" class="col-sm-3 col-form-label">
                                                    Ekstensi File Gambar
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="ekstensi" id="ekstensi" value="<?= $data_web['ekstensi'] ?>" placeholder="Masukkan Ekstensi" >
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <div class="submit col-sm-4 d-block mr-0 ml-auto">
                                                    <button type="submit" class="btn btn-info">Simpan</button>
                                                </div>
                                            </div>
                                            <hr>
                                    </form>
                                    <div class="form-group row">
                                        <label class="col-sm-3">
                                            Dark Mode
                                        </label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <!-- <input type="checkbox"> -->
                                                <input type="checkbox" id="switch_mode" onclick="toggleDark()">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
</div>