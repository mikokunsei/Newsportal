<?php 

include "../config/connection.php";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    
    $search = $_GET['search'] ;
    $query = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND title LIKE '%$search%' ORDER BY c_datetime DESC");

    if ($query) {
        // echo "Mencari ".$search;
        header("location:../pages/single_page_search.php?search=".$search);
    } else {
        echo "Error Query";
    }
} else {
    echo "Not Found";
}


?>
