<?php 

session_start();

include 'config/connection.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$get_data = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password' ");
$check_data = mysqli_num_rows($get_data);

if ($check_data==1) {
   
    header('location:dashboard');

    $query = mysqli_fetch_array($get_data);


    $_SESSION['username'] = $query['username'];
    $_SESSION['role'] = $query['role'];

} else {
    header('location:login');
}

?>