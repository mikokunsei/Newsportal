<?php

include '../config/connection.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        $id = $_GET['id'];

        $sql = "DELETE FROM tb_comments WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '<script language="javascript" type="text/javascript">alert("Data komentar berhasil di hapus!");</script>';
            echo '<script>window.location.href = "komentar"</script>';
        } else {
            // header("location:komentar");
            echo '<script language="javascript" type="text/javascript">alert("Gagal menghapus data komentar !")</script>';
            echo '<script>window.location.href = "komentar"</script>';
        }
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Gagal ID tidak ditemukan !")</script>';
        echo '<script>window.location.href = "komentar"</script>';
    }
} else {
    echo '<script language="javascript" type="text/javascript">alert("Gagal ID tidak ditemukan !")</script>';
    echo '<script>window.location.href = "komentar"</script>';
}
