<?php
session_start();

include "../config/connection.php";

$email = $_POST['email'];
$password = $_POST['password'];

$password_encrypted = md5($password);

$query = mysqli_query($conn, "SELECT * FROM tb_visitors WHERE email = '$email' AND password = '$password_encrypted'");
$check_data = mysqli_num_rows($query);

if ($check_data == 1) {
    // header('location:../index.php');
    echo '<script>history.go(-2);</script>';

    $data = mysqli_fetch_array($query);

    $_SESSION['nama'] = $data['nama'];
    $_SESSION['id'] = $data['id'];
    
} else {
    echo '<script language="javascript" type="text/javascript">alert("Incorrect Username or Password, please check again !")</script>';
    echo '<script>window.location="../login.php"</script>';
}



?>