<?php 

include '../config/connection.php';

if (isset($_POST['id'])){
    if ($_POST['id'] != "") {
        $id = $_POST['id'];
        $status = $_POST['status'];


        $sql = "UPDATE tb_comments SET status = '$status' WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '1';
            // echo "berhasil";
        } else {
            // header("location:../komentar");
            echo '0';
        }

    } else {
        // header("location:../komentar");
        echo '0';
    }
}

?>