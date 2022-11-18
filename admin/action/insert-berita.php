<?php
include '../config/connection.php';

if (isset($_POST['judul'])) {

    $judul = $_POST['judul'];
    $kategori_berita = $_POST['kategori'];
    $gambar_nama = $_FILES['image']['name'];
    $gambar_size = $_FILES['image']['size'];
    $isi = $_POST['isi'];
    $media = $_POST['media'];
    $sumber = $_POST['sumber'];
    $news = $_POST['news'];


    if ($gambar_size > 2097152) {
        echo "File gambar lebih dari 2MB";
    } else {
        $izin_ekstensi = array('png', 'jpg', 'jpeg');

        $pisah_ekstensi = explode('.', $gambar_nama);
        $ekstensi = strtolower(end($pisah_ekstensi));

        $file_temp = $_FILES['image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));

        $gambar_nama_baru = $tanggal . '-' . $gambar_nama;
        
        if (in_array($ekstensi, $izin_ekstensi)) {

            move_uploaded_file($file_temp, '../public/image/' . $gambar_nama_baru);

            if ($sumber != "") {

                $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, link, media) VALUES ('$judul', '$kategori_berita', '$gambar_nama_baru', '$isi', '$media', '$sumber', '$news') ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "Berhasil";
                } else {
                    echo "Gagal";
                }
            } else {
                $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, media) VALUES ('$judul', '$kategori_berita', '$gambar_nama_baru', '$isi', '$media', '$news') ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "Berhasil";
                } else {
                    echo "Gagal";
                }
            }
        } else {
            echo "Ekstensi tidak sesuai";
        }
    }

    // $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, link) VALUES ('$judul', '$kategori_berita', '$gambar', '$isi', '$media', '$sumber') ";
    // $query = mysqli_query($conn, $sql);

    // if ($query) {
    //     header("location:../dashboard");
    // } else {
    //     echo "Gagal menambahkan berita";
    // }

}
