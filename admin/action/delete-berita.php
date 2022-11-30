<?php

include '../config/connection.php';


if ($_SESSION['role'] == 'user') {
    echo "<script>window.location.href = '../admin/alert'</script>";
} elseif ($_SESSION['role'] == 'admin' or 'manager') {
    if (isset($_GET['id'])) {
        if ($_GET['id'] != "") {
    
            $id = $_GET['id'];
    
            $sql_gambar = "SELECT c_image FROM news_content WHERE id='$id'";
            $query_gambar = mysqli_query($conn, $sql_gambar);
            $data_gambar = mysqli_fetch_array($query_gambar);
    
            unlink("public/image/" . $data_gambar['c_image']);
    
            $query_berita = mysqli_query($conn, "DELETE FROM news_content WHERE id = '$id' ");
            if ($query_berita) {
                $query_komentar = mysqli_query($conn, "DELETE FROM tb_comments WHERE news_id = '$id'");
                echo '<script language="javascript" type="text/javascript">alert("Data berita berhasil di hapus !");</script>';
                echo '<script>window.location.href = "berita"</script>';
            } else {
                // header("location:berita");
                echo '<script language="javascript" type="text/javascript">alert("Gagal menghapus data berita !")</script>';
                echo '<script>window.location.href = "berita"</script>';
            }
        }
    } else {
        // header("location:berita");
        echo '<script language="javascript" type="text/javascript">alert("Gagal ID tidak ditemukan !")</script>';
        echo '<script>window.location.href = "berita"</script>';
    }    
} else {
    echo "<script>window.location.href = '../admin/alert'</script>";
}

