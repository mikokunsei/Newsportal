<?php

include '../config/connection.php';

if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirmation'];

        $password_encrypted = md5($password);

        $sql_check = "SELECT COUNT(username) AS data_tersedia FROM tb_users WHERE username = '$username'";
        $query_check = mysqli_query($conn, $sql_check);
        $data_check = mysqli_fetch_assoc($query_check);

        // echo "<span>" . $data_check['data_tersedia'] . "</span>";

        if ($_SESSION['role'] == 'admin') {
            if ($password == "") {

                $query = mysqli_query($conn, "UPDATE tb_users SET username = '$username', email = '$email', role = '$role' WHERE id = '$id'");

                if ($query) {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Data pengguna berhasil diubah !");</script>';
                    echo '<script>window.location=("../pengguna")</script>';
                } else {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data pengguna !");</script>';
                    echo '<script>window.location=("../editpengguna-' . $id . '")</script>';
                }
            } elseif ($password_confirm == $password) {

                $query = mysqli_query($conn, "UPDATE tb_users SET username = '$username', email = '$email', role = '$role', password = '$password_encrypted' WHERE id = '$id' ");

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Data pengguna berhasil diubah !");</script>';
                    echo '<script>window.location=("../pengguna")</script>';
                } else {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data pengguna !");</script>';
                    echo '<script>window.location=("../editpengguna-' . $id . '")</script>';
                }
            } else {
                echo '<script>alert("Password tidak sesuai !")</script>';
                echo '<script>window.location=("../editpengguna-' . $id . '-pesan-gagal-confirm")</script>';
            }
        } else {
            if ($password == "") {

                $query = mysqli_query($conn, "UPDATE tb_users SET email = '$email', role = '$role' WHERE id = '$id'");

                if ($query) {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Data pengguna berhasil diubah !");</script>';
                    echo '<script>window.location=("../pengguna")</script>';
                } else {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data pengguna !");</script>';
                    echo '<script>window.location=("../editpengguna-' . $id . '")</script>';
                }
            } elseif ($password_confirm == $password) {

                $query = mysqli_query($conn, "UPDATE tb_users SET email = '$email', role = '$role', password = '$password_encrypted' WHERE id = '$id' ");

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Data pengguna berhasil diubah !");</script>';
                    echo '<script>window.location=("../pengguna")</script>';
                } else {
                    // header("location:../pengguna");
                    echo '<script language="javascript" type="text/javascript">alert("Gagal mengubah data pengguna !");</script>';
                    echo '<script>window.location=("../editpengguna-' . $id . '")</script>';
                }
            } else {
                echo '<script>alert("Password tidak sesuai !")</script>';
                echo '<script>window.location=("../editpengguna-' . $id . '-pesan-gagal-confirm")</script>';
            }
        }
    } else {
        header("location:../pengguna");
    }
}
