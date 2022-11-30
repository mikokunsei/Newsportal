<?php

include '../config/connection.php';


if ($_SESSION['role'] == 'user') {
    echo "<script>window.location.href = '../admin/alert'</script>";
} elseif ($_SESSION['role'] == 'admin' or 'manager') {
    if (isset($_GET['id'])) {
        if ($_GET['id'] != 1 | $_GET['id'] != "") {

            $id = $_GET['id'];

            $query = mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$id' ");

            if ($query) {
                echo '<script language="javascript" type="text/javascript">alert("Data pengguna berhasil di hapus!");</script>';
                echo '<script>window.location.href = "pengguna"</script>';
            } else {
                header("location:pengguna");
            }
        } else {
            echo "<script>window.location.href = '../admin/alert'</script>";
        }
    } else {
        header("location:pengguna");
    }
} else {
    echo "<script>window.location.href = '../admin/alert'</script>";
}
