<?php 

session_start();

include 'config/connection.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$password_encrypted = md5($password);

// $sql = "SELECT * FROM tb_users WHERE username = '$username' and password = '$password_encrypted' ";
$sql = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password_encrypted' ";
$get_data = mysqli_query($conn, $sql);
$check_data = mysqli_num_rows($get_data);

if ($check_data==1) {
   
    // echo $check_data;
    header('location:dashboard');

    $query = mysqli_fetch_array($get_data);

    // echo $pass_verify = PASSWORD_HASH($password, PASSWORD_DEFAULT);

    $_SESSION['username'] = $query['username'];
    $_SESSION['role'] = $query['role'];

} else {
    header('location:login');
}
