<?php 

include "../config/connection.php";

$tgl = date("Y-m-d");
$news_id = $_POST['news_id'];
$sql = "INSERT INTO tb_comments(nama, email, komentar, tgl, news_id) 
            VALUES (
                '$_POST[name]',
                '$_POST[email]',
                '$_POST[comment]',
                '$tgl',
                '$news_id'
            )";
$simpan = mysqli_query($conn, $sql);

if ($simpan) {
    header("location:./single_page.php?id=$news_id");
} else {
    echo "failed";
}

?>