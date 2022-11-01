<?php 

include '../config/connection.php';

if (isset($_POST['id'])){
    if ($_POST['id'] != "") {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirmation'];
        
        $password_encrypted = md5($password);
    
    } else {
        header("location:../pengguna");
    }
    
    if ($password == "") {
        $query = mysqli_query($conn, "UPDATE tb_users SET username = '$username', email = '$email', role = '$role' WHERE id = '$id'");
        
        if ($query) {
            header("location:../pengguna");
        } else {
            header("location:../pengguna");
        }
    
    } elseif($password_confirm == $password) {
        $query = mysqli_query($conn, "UPDATE tb_users SET username = '$username', email = '$email', role = '$role', password = '$password_encrypted' WHERE id = '$id' ");

        if ($query) {
            header("location:../pengguna");
        } else {
            header("location:../pengguna");
        }
    } else {
        echo "Password tidak sesuai";
    }
    
} else {
    // header("location:../dashboard");
    echo "Failed";
}

?>