<?php
include '../config/connection.php';

error_reporting(0);

if ($_SESSION['role'] == 'user') {
    echo "<script>window.location.href = '../alert'</script>";
} elseif (isset($_POST['username'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirmation'];
    $role = $_POST['role'];

    $password_encrypted = md5($password);

    // $sql_check = "SELECT EXISTS(SELECT * FROM tb_users WHERE username = '$username') AS data_tersedia";
    $sql_check = "SELECT * FROM tb_users WHERE username = '$username'";
    $query_check = mysqli_query($conn, $sql_check);
    $data_check = mysqli_num_rows($query_check);

    if ($data_check == 1) {
        echo '<script language="javascript" type="text/javascript" >alert("Username telah digunakan !");</script>';
        echo '<script>window.location= "../tambahpengguna-gagal-username-username-' . $username . '-email-' . $email . '"</script>';
    } else {
        if ($password == $password_confirm) {
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tb_users (username, email, role, password) VALUES ('$username', '$email', '$role', '$password_encrypted')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                // header("location:../pengguna");
                echo '<script language="javascript" type="text/javascript">alert("Berhasil menambahkan pengguna");</script>';
                echo '<script>window.location="../pengguna-ditambahkan"</script>';
            } else {
                // header("location:../pengguna");
                echo '<script language="javascript" type="text/javascript" >alert("Gagal menambahkan pengguna !");</script>';
                echo '<script>window.location= "../tambahpengguna"</script>';
            }
        } else {
            echo '<script language="javascript" type="text/javascript" >alert("Gagal menambahkan pengguna ! \nPassword tidak sesuai");</script>';
            echo '<script>window.location= "../tambahpengguna-gagal-confirm-username-' . $username . '-email-' . $email . '"</script>';
            // echo '<script type="text/javascript">document.getElementById("gagal").style.display = "none";</script>';
        }
    }
}
