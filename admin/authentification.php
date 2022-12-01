<?php 

session_start();

include 'config/connection.php'; 

$username = $_POST['username'];
$password = $_POST['password'];
$captcha = $_POST['captcha'];

// echo $captcha;

$password_encrypted = md5($password);

$captcha_session = $_SESSION['captcha_id'];

// $captcha = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0,6);
// $_SESSION['captcha']=$captcha;

// $pic = imagecreate(60,20);
// $box_color = imagecolorallocate($pic, 217, 217, 217);
// $text_color = imagecolorallocate($pic, 0, 0, 0);
// imagefilledrectangle($pic, 0, 0, 50, 20, $box_color);
// imagestring($pic, 10, 3, 3, $captcha, $text_color);
// imagejpeg($pic);

// function generate()
// {
// 	$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
// 	return substr(str_shuffle($char), 0, 5);	
// }

// $sql = "SELECT * FROM tb_users WHERE username = '$username' and password = '$password_encrypted' ";
$sql = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password_encrypted' ";
$get_data = mysqli_query($conn, $sql);
$check_data = mysqli_num_rows($get_data);


$query_username = mysqli_query($conn , "SELECT * FROM tb_users WHERE username = '$username'") ;
$check_username = mysqli_num_rows($query_username);

$query_password = mysqli_query($conn , "SELECT * FROM tb_users WHERE username = 'admin123'") ;
$check_password = mysqli_fetch_array($query_password);


if ($check_data==1 AND $captcha == $captcha_session ) {
   
    // echo $check_data;
    header('location:dashboard');

    $query = mysqli_fetch_array($get_data);

    // echo $pass_verify = PASSWORD_HASH($password, PASSWORD_DEFAULT);

    $_SESSION['username'] = $query['username'];
    $_SESSION['role'] = $query['role'];

} elseif ($check_username != 1) {
    echo '<script language="javascript" type="text/javascript">alert("Username not found, please check again !")</script>';
    echo '<script>window.location="login-gagal-username"</script>';
    
} elseif ($check_username == 1 AND $password_encrypted != $check_password['PASSWORD'] ) {
    echo '<script language="javascript" type="text/javascript">alert("Wrong password, please check again !")</script>';
    echo '<script>window.location="login-gagal-password"</script>';
    // echo "GAGAL";
    // echo $check_password['PASSWORD'];

} elseif ($check_data == 1 AND $captcha != $captcha_session ) {
    echo '<script language="javascript" type="text/javascript">alert("Incorrect Captcha !")</script>';
    echo '<script>window.location="login-gagal-captcha"</script>';

} else {
    // header('location:login');
    echo '<script language="javascript" type="text/javascript">alert("Incorrect Username or Password, please check again !")</script>';
    echo '<script>window.location="login.php"</script>';
}
