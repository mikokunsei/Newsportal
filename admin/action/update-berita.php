<?php

include '../config/connection.php';

if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $kategori_berita = $_POST['kategori'];
        $gambar_nama = $_FILES['image']['name'];
        $gambar_size = $_FILES['image']['size'];
        $isi = $_POST['isi'];
        $media = $_POST['media'];
        $sumber = $_POST['sumber'];
       


        // $sql = "UPDATE tb_comments SET status = '$status' WHERE id = '$id'";
        // $query = mysqli_query($conn, $sql);

        // if ($query) {
        //     header("location:../komentar");
        //     // echo "berhasil";
        // } else {
        //     // header("location:../komentar");
        //     echo "gagal";
        // }
    } else {
        // header("location:../komentar");
        echo "ID tidak ditemukan";
    }

    if ($gambar_size > 2097152) {
        echo "File gambar lebih dari 2MB";
    } else {

        if ($gambar_nama != "") {
            $izin_ekstensi = array('png', 'jpg', 'jpeg');

            $pisah_ekstensi = explode('.', $gambar_nama);
            $ekstensi = strtolower(end($pisah_ekstensi));

            $file_temp = $_FILES['image']['tmp_name'];
            $tanggal = md5(date('Y-m-d h:i:s'));

            $gambar_nama_baru = $tanggal . '-' . $gambar_nama;

            if (in_array($ekstensi, $izin_ekstensi)) {

                $sql_gambar = "SELECT c_image FROM news_content WHERE id='$id'";
                $query_gambar = mysqli_query($conn, $sql_gambar);
                $data_gambar = mysqli_fetch_array($query_gambar);

                unlink("public/image/" . $data_gambar['c_image']);

                move_uploaded_file($file_temp, '../public/image/' . $gambar_nama_baru);

                if ($sumber != "") {

                    $sql = "UPDATE news_content SET title = '$judul', c_canal = '$kategori_berita', c_image = '$gambar_nama_baru', txt = '$isi', media_name = '$media', link = '$sumber' WHERE id = '$id'";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        echo "Berhasil";
                    } else {
                        echo "Gagal";
                    }
                } else {
                    $sql = "UPDATE news_content SET title =  '$judul', c_canal = '$kategori_berita', c_image = '$gambar_nama_baru', txt = '$isi', media_name = '$media' WHERE id = '$id' ";
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

        } else {

            if ($sumber != "") {

                $sql = "UPDATE news_content SET title = '$judul', c_canal = '$kategori_berita', txt = '$isi', media_name = '$media', link = '$sumber' WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "Berhasil";
                } else {
                    echo "Gagal";
                }
            } else {
                $sql = "UPDATE news_content SET title =  '$judul', c_canal = '$kategori_berita', txt = '$isi', media_name = '$media' WHERE id = '$id' ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo "Berhasil";
                } else {
                    echo "Gagal";
                }
            }
        }
    }
}
