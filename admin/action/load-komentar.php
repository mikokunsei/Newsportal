<?php 

include "../config/connection.php";

$query = mysqli_query($conn,"SELECT * FROM tb_comments WHERE notif = 1 ORDER BY tgl DESC LIMIT 3");
$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}


echo json_encode(array("result" => $data));

