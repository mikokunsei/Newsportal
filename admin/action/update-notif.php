<?php

include "../config/connection.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $notif = $_POST['notif'];

    $sql = "UPDATE tb_comments SET notif = '$notif' WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo 'success';
    } else {
        echo 'failed';
    }
} else {
    echo 'cannot get id';
}


?>