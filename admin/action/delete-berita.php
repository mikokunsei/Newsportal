<?php

include '../config/connection.php';


if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        $id = $_GET['id'];

        $sql_gambar = "SELECT c_image FROM news_content WHERE id='$id'";
        $query_gambar = mysqli_query($conn, $sql_gambar);
        $data_gambar = mysqli_fetch_array($query_gambar);

        unlink("public/image/". $data_gambar['c_image']);

        $query_berita = mysqli_query($conn, "DELETE FROM news_content WHERE id = '$id' ");
        if ($query_berita) {
            $query_komentar = mysqli_query($conn, "DELETE FROM tb_comments WHERE news_id = '$id'");
            echo '<script language="javascript" type="text/javascript">alert("Data berhasil di hapus!");</script>';
            echo '<script>window.location.href = "http://localhost/newsportal/admin/berita"</script>';
        } else {
            // header("location:berita");
            echo "Gagal menghapus data";
        }
    }
} else {
    // header("location:berita");
    echo "ID tidak ditemukan !";
}
