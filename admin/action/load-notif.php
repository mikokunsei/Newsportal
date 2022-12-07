<?php

include "../config/connection.php";

$query = mysqli_query($conn, "SELECT COUNT(notif) AS jml_notif FROM tb_comments WHERE notif = 1");
$data = mysqli_fetch_array($query);

if ($data['jml_notif'] > 0) {
    echo json_encode(array('jumlah' => $data['jml_notif']));
} else {
    echo json_encode(array('jumlah' => ""));
}



?>