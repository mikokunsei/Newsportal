<?php

include 'config/connection.php'


?>
<!DOCTYPE html>
<html>

<head>
<?php

$query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
$data_web = mysqli_fetch_array($query_web);

?>
    <title>Error</title>
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
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <?php 
        include "header.php";
        ?>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
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
                <div class="col-lg-12 col-md-12">
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
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="error_page">
                            <h3>We Are Sorry</h3>
                            <h1>404</h1>
                            <p>Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
                            <span></span> <a href="index.php" class="wow fadeInLeftBig">Go to home page</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="single_sidebar">
                            <h2><span>Popular Post</span></h2>
                            <ul class="spost_nav">
                                <?php
                                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' ORDER BY jml_view DESC LIMIT 5 ");
                                while ($data = mysqli_fetch_array($get_data)) {

                                ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="media-left"> <img alt="" src="
                                        <?php
                                        $link = substr($data['c_image'], 0, 4);
                                        if ($link != 'http') {
                                            echo 'admin/public/image/' . $data['c_image'];
                                        } else {
                                            echo $data['c_image'];
                                        }
                                        ?>"> </a>
                                            <div class="media-header">
                                                <span style="font-size: 13px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                                    <?php

                                                    $db_tahun = substr($data['c_datetime'], 0, 4);
                                                    $db_bulan = substr($data['c_datetime'], 5, 2);
                                                    $db_tanggal = substr($data['c_datetime'], 8, 2);
                                                    $db_jam = substr($data['c_datetime'], 12, 8);
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
                                                    echo "$db_tanggal " . substr($db_bulan, 0, 3) . " $db_tahun"; ?> | views : <?= $data['jml_view']; ?></span>
                                            </div>
                                            <div class="media-body"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"> <?= $data['title']; ?></a> </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
<?php 
include "footer.php";
?>