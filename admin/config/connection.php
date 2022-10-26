<?php 
    $servername = "localhost";
    $database = "news_portal";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection Failed !". mysqli_connect_error());
    }

