<?php

include '../config/connection.php';

// error_reporting(0);

if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $kategori_berita = $_POST['kategori'];
        $gambar_nama = $_FILES['image']['name'];
        $gambar_size = $_FILES['image']['size'];
        $isi = htmlspecialchars(htmlentities($_POST['isi']));
        $media = $_POST['media'];
        $tag = $_POST['tag'];
        $tanggal_berita = $_POST['tanggal'];
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
        echo '<script language="javascript" type="text/javascript">alert("Gagal ID tidak ditemukan !")</script>';
        echo '<script>window.location.href = "berita"</script>';
    }

    $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
    $data_web = mysqli_fetch_assoc($query_web);
    
    // size file dari database dikali 1MB atau 1.048.576  Byte
    $size_file = $data_web['size_file'] * 1048576 ;

    if ($gambar_size > $size_file) {
        echo '<script language="javascript" type="text/javascript">alert("Ukuran file gambar lebih dari '. $data_web['size_file'] .'MB !")</script>';
        echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
    } else {

        if ($gambar_nama != "") {
            // ekstensi ambil dari database

            $izin_ekstensi = explode(',', $data_web['ekstensi']);

            $pisah_ekstensi = explode('.', $gambar_nama);
            $ekstensi = strtolower(end($pisah_ekstensi));

            $file_temp = $_FILES['image']['tmp_name'];
            $tanggal = md5(date('Y-m-d h:i:s'));

            $gambar_nama_baru = $tanggal . '-' . $gambar_nama;

            if (in_array($ekstensi, $izin_ekstensi)) {

                $sql_gambar = "SELECT c_image FROM news_content WHERE id='$id'";
                $query_gambar = mysqli_query($conn, $sql_gambar);
                $data_gambar = mysqli_fetch_array($query_gambar);

                unlink("../public/image/" . $data_gambar['c_image']);

                move_uploaded_file($file_temp, '../public/image/' . $gambar_nama_baru);

                if ($sumber != "") {

                    $sql = "UPDATE news_content SET title = '$judul', c_canal = '$kategori_berita', c_image = '$gambar_nama_baru', txt = '$isi', media_name = '$media', tag = '$tag', c_datetime = '$tanggal_berita', link = '$sumber' WHERE id = '$id'";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        echo '<script language="javascript" type="text/javascript">alert("Data berita berhasil diubah !")</script>';
                        echo '<script>window.location.href = "../berita"</script>';
                    } else {
                        echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data berita !")</script>';
                        echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
                    }
                } else {
                    $sql = "UPDATE news_content SET title =  '$judul', c_canal = '$kategori_berita', c_image = '$gambar_nama_baru', txt = '$isi', media_name = '$media', tag = '$tag', c_datetime = '$tanggal_berita'  WHERE id = '$id' ";
                    $query = mysqli_query($conn, $sql);

                    if ($query) {
                        echo '<script language="javascript" type="text/javascript">alert("Data berita berhasil diubah !")</script>';
                        echo '<script>window.location.href = "../berita"</script>';
                    } else {
                        echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data berita !")</script>';
                        echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
                    }
                }
            } else {
                echo '<script language="javascript" type="text/javascript">alert("Ekstensi gambar tidak sesuai !")</script>';
                echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
            }
        } else {

            if ($sumber != "") {

                $sql = "UPDATE news_content SET title = '$judul', c_canal = '$kategori_berita', txt = '$isi', media_name = '$media', tag = '$tag', c_datetime = '$tanggal_berita', link = '$sumber' WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Data berita berhasil diubah !")</script>';
                    echo '<script>window.location.href = "../berita"</script>';
                } else {
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data berita !")</script>';
                    echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
                }
            } else {
                $sql = "UPDATE news_content SET title =  '$judul', c_canal = '$kategori_berita', txt = '$isi', media_name = '$media', c_datetime = '$tanggal_berita' WHERE id = '$id' ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Data berita berhasil diubah !")</script>';
                    echo '<script>window.location.href = "../berita"</script>';
                } else {
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data berita !")</script>';
                    echo '<script>window.location.href = "../editberita-' . $id . '"</script>';
                }
            }
        }
    }
}
