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


$query_username = mysqli_query($conn , "SELECT * FROM tb_users WHERE username = '$username'") ;
$check_username = mysqli_num_rows($query_username);

$query_password = mysqli_query($conn , "SELECT * FROM tb_users WHERE password = '$password_encrypted'") ;
$check_password = mysqli_num_rows($query_password);

if ($check_data==1) {
   
    // echo $check_data;
    header('location:dashboard');

    $query = mysqli_fetch_array($get_data);

    // echo $pass_verify = PASSWORD_HASH($password, PASSWORD_DEFAULT);

    $_SESSION['username'] = $query['username'];
    $_SESSION['role'] = $query['role'];

} elseif ($check_username != 1) {
    echo '<script language="javascript" type="text/javascript">alert("Username not found, please check again !")</script>';
    echo '<script>window.location="login-gagal-username"</script>';
    
} elseif ($check_username == 1 AND $check_password != 1) {
    echo '<script language="javascript" type="text/javascript">alert("Wrong password, please check again !")</script>';
    echo '<script>window.location="login-gagal-password"</script>';

} else {
    // header('location:login');
    echo '<script language="javascript" type="text/javascript">alert("Incorrect Username or Password, please check again !")</script>';
    echo '<script>window.location="login.php"</script>';
}
