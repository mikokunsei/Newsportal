<?php

include "../config/connection.php";

// if (isset($_POST['view'])) {
//     if ($_POST['view'] != '') {

//         $update_query = mysqli_query($conn, "UPDATE tb_comments SET notif = 0 WHERE notif = 1");
//     }

//     $query_komentar = mysqli_query($conn, "SELECT * FROM tb_comments ORDER BY tgl DESC LIMIT 4 ");
//     $jml_komentar = mysqli_num_rows($query_komentar);
//     $output = '';

//     if ($jml_komentar > 0) {

//         while ($data = mysqli_fetch_array($query_komentar)) {
//             $output .= '
//                 <li>
//                 <a href="#" class="dropdown-item"><div class="media"><div class="media-body"><h3 class="dropdown-item-title">' .
//                 $data['nama'] . '<span class="float-right text-sm text-danger"></span></h3><p class="text-sm">' .
//                 $data['komentar'] . '</p><p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>' .
//                 $data['tgl'] . '"</p></div></div></a><div class="dropdown-divider"></div>
//                 </li>
//                 ';
//         }
//     } else {
//         $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
//     }

//     $query_notif = mysqli_query($conn, "SELECT * FROM tb_comments WHERE notif = 1");
//     $jml_notif = mysqli_num_rows($query_notif);

//     $data = array(
//         'komentar' => $output,
//         'notif' => $jml_notif
//     );

//     echo json_encode($data);
// }

if (isset($_POST['view'])) {

    // $con = mysqli_connect("localhost", "root", "", "notif");

    if ($_POST["view"] != '') {
        $update_query = "UPDATE tb_comments SET notif = 0 WHERE notif=1";
        mysqli_query($conn, $update_query);
    }

    $query = "SELECT * FROM tb_comments ORDER BY tgl DESC LIMIT 5";
    $result = mysqli_query($conn, $query);
    $output = '';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            $output .= '
            <li style="list-style-type:none;">
            <a href="#" class="dropdown-item"><div class="media"><div class="media-body"><h3 class="dropdown-item-title">' .
                $row['nama'] . '<span class="float-right text-sm text-danger"></span></h3><p class="text-sm">' .
                $row['komentar'] . '</p><p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>' .
                $row['tgl'] . '"</p></div></div></a><div class="dropdown-divider"></div>
            </li>

  ';
        }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification</a></li>';
    }

    $status_query = "SELECT * FROM tb_comments WHERE notif = 1";
    $result_query = mysqli_query($conn, $status_query);
    $count = mysqli_num_rows($result_query);

    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );

    echo json_encode($data);
}
