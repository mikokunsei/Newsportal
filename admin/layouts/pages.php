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

            case 'pengguna':
                include "content/pengguna.php";
                break;

            case 'tambahpengguna':
                include "content/add-pengguna.php";
                break;

            case 'editpengguna':
                include "content/edit-pengguna.php";
                break;

            case 'deletepengguna':
                include "action/delete-user.php";
                break;

            case 'komentar':
                include "content/komentar.php";
                break;

            case 'editkomentar':
                include "content/edit-komentar.php";
                break;

            case 'deletekomentar':
                include "action/delete-komentar.php";
                break;


            default:
            
                echo "<center><h3>Maaf, Halaman tidak ditemukan !</h3></center>";
                break;
        }
    }else{
		include "content/dashboard.php";
	}

?>

