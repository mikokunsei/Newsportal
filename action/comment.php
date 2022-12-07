<?php 

include "../config/connection.php";

date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d H:i:s");
$news_id = $_POST['news_id'];
$parent_id = $_POST['comment_id'];
$sql = "INSERT INTO tb_comments(nama, email, komentar, tgl, news_id, parent_id) 
            VALUES (
                '$_POST[name]',
                '$_POST[email]',
                '$_POST[comment]',
                '$tgl',
                '$news_id',
                '$parent_id'
            )";
$simpan = mysqli_query($conn, $sql);

if ($simpan) {
    header("location:../pages/single_page.php?id=$news_id");
} else {
    echo "failed";
}

?>