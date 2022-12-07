<?php

include "../config/connection.php";

if (isset($_POST['id']) && !empty($_POST['id'])) {
    if ($_POST['id'] != "") {
        $id_news = $_POST['id'];

        $update_viewer = mysqli_query($conn, "UPDATE news_content SET jml_view = jml_view+1 WHERE id = '$id_news'");

        if ($update_viewer) {
            echo "Berhasil";
            // header("location:./single_page.php?id=$id_news");
        } else {
            echo "Gagal";
        }
    } else {
        echo "Gagal";
    }
}
