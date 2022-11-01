<?php
include '../config/connection.php';

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirmation'];
    $role = $_POST['role'];

    $password_encrypted = md5($password);

    if ($password == $password_confirm) {
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO tb_users (username, email, role, password) VALUES ('$username', '$email', '$role', '$password_encrypted')";
        $query = mysqli_query($conn, $sql );

        if ($query) {
            header("location:../pengguna");
            // echo "success";
        } else {
            header("location:../pengguna");
            // echo "failed";
        }
    } else {
        echo 'password tidak sesuai';
    }
}
