<?php

include "../config/connection.php";

date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d H:i:s");
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];

$password_encrypted = md5($password);

if ($retype_password == $password) {

    $query = mysqli_query($conn, "INSERT INTO tb_visitors (nama, email, password, created_at) VALUES ('$nama', '$email', '$password_encrypted', '$tgl')");

    if ($query) {
        echo '<script language="javascript" type="text/javascript">alert("Pendaftaran Berhasil, Silahkan Login.. ");</script>';
        echo '<script>window.location="../login.php"</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Query Gagal !");</script>';
        echo '<script>window.location="../register.php"</script>';
    }
} else {
    echo '<script language="javascript" type="text/javascript">alert("Password tidak sesuai !");</script>';
    echo '<script>window.location="../register.php"</script>';
}
