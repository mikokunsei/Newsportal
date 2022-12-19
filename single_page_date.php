<?php

session_start();


if (isset($_GET['date'])) {
    $date_news = $_GET['date'];
} else {
    die("Error, No Tag Selected !");
}

include "config/connection.php";

// echo $date_news;

$get_news = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_datetime LIKE '$date_news%'");
$data_date = mysqli_fetch_array($get_news);
$date_custom = substr($data_date['c_datetime'], 0, 7);

if ($date_news != $date_custom) {
    header("location:404.php");
} else {

?>



<!DOCTYPE html>
<html>

<head>
    <?php

    $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
    $data_web = mysqli_fetch_array($query_web);

    ?>
    <title><?= $data_web['title'] ?> By Date</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="icon" href="admin/public/image/icon/<?= $data_web['icon'] ?>" type="image/png">

    <!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

    <style>
        .text-paragraph {
            overflow: hidden;
            text-overflow: ellipsis;
            /* multiple ellipse */
            display: -webkit-box !important;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>

</head>

<body>
    <!-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
    <?php include "header.php"; ?>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                        <?php
                        $get_data = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news'");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                            <li><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?= $data['c_canal']; ?></a></li>

                        <?php
                        }
                        ?>
                        <!-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li> -->
                        <!-- <li><a href="contact.php">Contact Us</a></li>
            <li><a href="404.html">404 Page</a></li> -->
                    </ul>
                </div>
            </nav>
        </section>
        <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="latest_newsarea"> <span>Latest News</span>
                        <ul id="ticker01" class="news_sticker">
                            <?php
                            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 10");
                            while ($data = mysqli_fetch_array($get_data)) {
                                // print_r($data);
                            ?>
                                <li><a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><img src="
                                <?php
                                $link = substr($data['c_image'], 0, 4);
                                if ($link != 'http') {
                                    echo 'admin/public/image/' . $data['c_image'];
                                } else {
                                    echo $data['c_image'];
                                }
                                ?>" alt=""><?= $data['title']; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <!-- <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section id="contentSection">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="left_content">
                        <div class="single_page">
                            <?php
                            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_datetime LIKE '%$date_news%'");
                            $data = mysqli_fetch_array($get_data);
                            ?>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="single_page_date.php?date=<?= $date_news ?>">
                                        <?php
                                        $db_tahun = substr($date_news, 0, 4);
                                        $db_bulan = substr($date_news, 5, 2);
                                        $db_tanggal = substr($date_news, 8, 2);
                                        // tambah 10 jam menyesuaikan waktu indonesia
                                        $db_jam = (intval(substr($data['c_datetime'], 12, 1))+10).substr($data['c_datetime'], 13, 7);
                                        switch ($db_bulan) {
                                            case '01':
                                                $db_bulan = "Januari";
                                                break;

                                            case '02':
                                                $db_bulan = "Februari";
                                                break;

                                            case '03':
                                                $db_bulan = "Maret";
                                                break;

                                            case '04':
                                                $db_bulan = "April";
                                                break;

                                            case '05':
                                                $db_bulan = "Mei";
                                                break;

                                            case '06':
                                                $db_bulan = "Juni";
                                                break;

                                            case '07':
                                                $db_bulan = "Juli";
                                                break;

                                            case '08':
                                                $db_bulan = "Agustus";
                                                break;

                                            case '09':
                                                $db_bulan = "September";
                                                break;

                                            case '10':
                                                $db_bulan = "Oktober";
                                                break;

                                            case '11':
                                                $db_bulan = "November";
                                                break;

                                            case '12':
                                                $db_bulan = "Desember";
                                                break;
                                        }
                                        echo "$db_bulan $db_tahun";
                                        ?></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="single_post_content">

                            <h2><span><?= $date_news ?></span></h2>


                            <div class="single_post_content">
                                <ul class="spost_nav">
                                    <?php

                                    $batas = 12;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    // if (empty($halaman) | $halaman < 1) {
                                    //     $posisi = 0;
                                    //     $hahlaman = 1;
                                    // } else {
                                    //     $posisi = ($halaman - 1) * $batas;
                                    // }
                                    $posisi = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;


                                    $get_data_tag = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_datetime LIKE '%$date_news%'");
                                    $jml_data = mysqli_num_rows($get_data_tag);
                                    $jml_halaman = ceil($jml_data / $batas);


                                    $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_datetime LIKE '%$date_news%' ORDER BY c_datetime DESC limit $posisi, $batas ");
                                    while ($data = mysqli_fetch_array($get_data)) {
                                    ?>
                                        <li>
                                            <div class="list-news wow fadeInRight">
                                                <div class="media wow fadeInDown">
                                                    <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="media-left">
                                                        <img alt="" src="
                                                        <?php
                                                        $link = substr($data['c_image'], 0, 4);
                                                        if ($link != 'http') {
                                                            echo 'admin/public/image/' . $data['c_image'];
                                                        } else {
                                                            echo $data['c_image'];
                                                        }
                                                        ?>">
                                                    </a>
                                                    <div class="media-body">
                                                        <span><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                                            <?php
                                                            $db_tahun_2 = substr($data['c_datetime'], 0, 4);
                                                            $db_bulan_2 = substr($data['c_datetime'], 5, 2);
                                                            $db_tanggal_2 = substr($data['c_datetime'], 8, 2);
                                                            // tambah 10 jam menyesuaikan waktu indonesia
                                                            $db_jam_2 = (intval(substr($data['c_datetime'], 12, 1))+10).substr($data['c_datetime'], 13, 7);
                                                            switch ($db_bulan_2) {
                                                                case '01':
                                                                    $db_bulan_2 = "Januari";
                                                                    break;

                                                                case '02':
                                                                    $db_bulan_2 = "Februari";
                                                                    break;

                                                                case '03':
                                                                    $db_bulan_2 = "Maret";
                                                                    break;

                                                                case '04':
                                                                    $db_bulan_2 = "April";
                                                                    break;

                                                                case '05':
                                                                    $db_bulan_2 = "Mei";
                                                                    break;

                                                                case '06':
                                                                    $db_bulan_2 = "Juni";
                                                                    break;

                                                                case '07':
                                                                    $db_bulan_2 = "Juli";
                                                                    break;

                                                                case '08':
                                                                    $db_bulan_2 = "Agustus";
                                                                    break;

                                                                case '09':
                                                                    $db_bulan_2 = "September";
                                                                    break;

                                                                case '10':
                                                                    $db_bulan_2 = "Oktober";
                                                                    break;

                                                                case '11':
                                                                    $db_bulan_2 = "November";
                                                                    break;

                                                                case '12':
                                                                    $db_bulan_2 = "Desember";
                                                                    break;
                                                            }
                                                            echo "$db_tanggal_2 $db_bulan_2 $db_tahun_2 [$db_jam_2]";

                                                            ?></span>
                                                        <h5>
                                                            <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"> <?= $data['title']; ?> </a>
                                                        </h5>
                                                        <p class="text-paragraph">
                                                            <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <ul class="pagination">
                                    <?php if ($jml_halaman > 0) {
                                    ?>
                                        <ul class="pagination">
                                            <?php
                                            $previous = $halaman - 1;
                                            $next = $halaman + 1;

                                            // PREVIOUS
                                            if ($halaman != 1) {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $previous ?>">Previous</a>
                                                </li>
                                            <?php
                                            }

                                            // 1 Halaman dan titik
                                            if ($halaman > 3) {
                                            ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=1">1</a></li>
                                                <?php
                                                if ($halaman > 4) {
                                                ?>
                                                    <li class="page-item"><a>...</a></li>
                                                <?php
                                                }
                                            }

                                            // 2 Halaman
                                            if ($halaman - 2 > 0) {
                                                ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $halaman - 2 ?>"><?= $halaman - 2 ?></a></li>
                                            <?php
                                            }

                                            if ($halaman - 1 > 0) {
                                            ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $halaman - 1 ?>"><?= $halaman - 1 ?></a></li>
                                            <?php
                                            }
                                            ?>

                                            <!-- CURRENT -->
                                            <li class="page-item active"><a><?= $halaman; ?></a></li>

                                            <?php

                                            // 2 Halaman
                                            if ($halaman + 1 < $jml_halaman + 1) {
                                            ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $halaman + 1 ?>"><?= $halaman + 1 ?></a></li>
                                            <?php
                                            }
                                            if ($halaman + 2 < $jml_halaman + 1) {
                                            ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $halaman + 2 ?>"><?= $halaman + 2 ?></a></li>
                                                <?php
                                            }

                                            if ($halaman < $jml_halaman - 2) {
                                                if ($halaman < $jml_halaman - 3) {
                                                ?>
                                                    <li class="page-item"><a>...</a></li>

                                                <?php
                                                }
                                                ?>
                                                <li class="page-item"><a href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $jml_halaman ?>"><?= $jml_halaman ?></a></li>
                                            <?php
                                            }


                                            if ($halaman != $jml_halaman) {
                                            ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="single_page_date.php?date=<?= $date_news ?>&halaman=<?= $next ?>">Next</a>
                                                </li>
                                            <?php
                                            }

                                            // for ($i = 1; $i <= $jml_halaman; $i++)
                                            //     if ($i != $halaman) {
                                            //         echo "<li class='page-item'><a class='page-link' href=\"single_page_tag.php?tag=$tag_news&halaman=$i\">$i</a></li>";
                                            //     } else {
                                            //         echo "<li class='page-item active'><a class='page-link'>$i</a></i>";
                                            //     }

                                            // NEXT

                                            ?>
                                        </ul>
                                    <?php

                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                <?php 
                include "right_side.php";
                ?>
                </div>
            </div>
        </section>

<?php
include "footer.php";

}
?>