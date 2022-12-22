<?php

require "../config/connection.php";

class Testing
{

    // protected $koneksi;

    // public function __construct($key=null,$conn)
    // {
    //     if ($key == null || $key == '' ) {
    //         echo "Anda tidak memiliki akses";
    //     } else {
    //         $this->koneksi = $conn;
    //     }
    // }

    public function canal()
    {
        global $conn;
        $query = "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news'";

        $data = array();
        // $result = mysqli_query($this->koneksi, $query);
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = array(
            'result' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function media()
    {
        global $conn;
        $query = "SELECT media_name FROM news_content WHERE media = 'news' GROUP BY media_name";

        $data = array();
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = array(
            'result' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }

}
