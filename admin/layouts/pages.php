<?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'dashboard':
                include "content/dashboard.php";
                break;

            case 'media':
                include "content/media.php";
                break;
            
            case 'kategori':
                include "content/kategori.php";
                break;

            default:
            
                echo "<center><h3>Maaf, Halaman tidak ditemukan !</h3></center>";
                break;
        }
    }else{
		include "content/dashboard.php";
	}

?>

