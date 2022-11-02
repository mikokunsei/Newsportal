<?php 

include '../config/connection.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {
        
        $id = $_GET['id'];

        $sql = "DELETE FROM tb_comments WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            
            echo '<script>window.location.href = "http://localhost/newsportal/admin/komentar"</script>';
        } else {
            // header("location:komentar");
            echo 'gagal query';
        }
    } else {
        echo 'gagal id kosong';
    }
} else {
    echo 'gagal id tidak ada';
}

?>