<?php 

include '../config/connection.php';


if (isset($_GET['id'])){
    if ($_GET['id'] != "") {
        
        $id = $_GET['id'];

        $query = mysqli_query($conn, "DELETE FROM tb_users WHERE id = '$id' ");

        if ($query) {
            echo '<script>window.location.href = "http://localhost/newsportal/admin/pengguna"</script>' ;
        } else {
            header("location:pengguna");
        }
    }
} else {
    header("location:pengguna");
}
?>
