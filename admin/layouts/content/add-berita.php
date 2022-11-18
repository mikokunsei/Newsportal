<?php

include "../config/connection.php";

if ($_SESSION['role'] == 'admin' or 'manager') {
?>

    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="berita">Tabel Berita</a></li>
                                <li class="breadcrumb-item active">Tambah Berita</li>
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
                                        <h5 class="card-title">Form Tambah Berita</h5>
                                    </div>

                                    <div class="card-body">
                                        <form action="action/insert-berita.php" method="POST" enctype="multipart/form-data">
                                            <div class="container">
                                                <input type="hidden" class="form-control" name="news" value="news">
                                                <div class="form-group row">
                                                    <label for="judul" class="col-sm-2 col-form-label">
                                                        Judul
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="judul" id="" placeholder="Masukkan Judul" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kategori" class="col-sm-2 col-form-label">
                                                        Kategori Berita
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="kategori" id="kategori" required>
                                                            <option value="" selected disabled hidden>Pilih Kategori</option>
                                                            <?php
                                                            $sql_kategori = "SELECT c_canal FROM news_content WHERE media = 'news' GROUP BY c_canal";
                                                            $query_kategori = mysqli_query($conn, $sql_kategori);
                                                            while ($category = mysqli_fetch_array($query_kategori)) {
                                                            ?>
                                                                <option value="<?php echo $category['c_canal'] ?>"><?php echo $category['c_canal'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="image" class="col-sm-2 col-form-label">
                                                        Gambar
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <div class="imgWrap" style="margin-bottom: 25px ;">
                                                            <img src="https://via.placeholder.com/200x150.png?text=image" style="width : 350px ; height: 250px;" id="imgView" class="img img-fluid" >
                                                        </div>
                                                        <input type="file" name="image" id="inputFile" class="form-control" accept="image/*" >
                                                        <!-- <label class="custom-file-label" for="inputFile">Choose file</label> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="isi" class="col-sm-2 col-form-label">
                                                        Isi Berita
                                                    </label>
                                                    <div id="editor" class="col-sm-10">
                                                        <textarea class="form-control" name="isi" id="isi" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="media" class="col-sm-2 col-form-label">
                                                        Media
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="media" id="" placeholder="Masukkan media" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sumber" class="col-sm-2 col-form-label">
                                                        Sumber
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="sumber" id="" placeholder="Masukkan sumber" >
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