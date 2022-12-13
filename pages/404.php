<?php

include '../config/connection.php'


?>
<!DOCTYPE html>
<html>

<head>
    <title>NewsFeed | Pages | Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <link rel="icon" href="../admin/public/image/icon/vitech_asia.png" type="image/png">

    <!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="header_top_left">
                            <ul class="top_nav">
                                <li><a href="../index.php">Home</a></li>
                                <li>
                                    <div class="dropdown">
                                        <a href="" class=" dropdown-toggle" type="button" data-toggle="dropdown">News by Date
                                            <span class=""></span></a>
                                            <ul class="dropdown-menu">
                                            <?php

                                            $query_date = mysqli_query($conn, "SELECT DISTINCT (SUBSTR(c_datetime, 1,7)) AS data_date FROM news_content WHERE media = 'news' GROUP BY c_datetime");
                                            while ($data_date = mysqli_fetch_array($query_date)) {
                                            ?>
                                                <li>
                                                    <a href="single_page_date.php?date=<?= $data_date['data_date'] ?>">
                                                        <?php

                                                        $date_bulan = substr($data_date['data_date'], 5, 2);
                                                        $date_tahun = substr($data_date['data_date'], 0, 4);

                                                        switch ($date_bulan) {
                                                            case '01':
                                                                $date_bulan = "Januari";
                                                                break;

                                                            case '02':
                                                                $date_bulan = "Februari";
                                                                break;

                                                            case '03':
                                                                $date_bulan = "Maret";
                                                                break;

                                                            case '04':
                                                                $date_bulan = "April";
                                                                break;

                                                            case '05':
                                                                $date_bulan = "Mei";
                                                                break;

                                                            case '06':
                                                                $date_bulan = "Juni";
                                                                break;

                                                            case '07':
                                                                $date_bulan = "Juli";
                                                                break;

                                                            case '08':
                                                                $date_bulan = "Agustus";
                                                                break;

                                                            case '09':
                                                                $date_bulan = "September";
                                                                break;

                                                            case '10':
                                                                $date_bulan = "Oktober";
                                                                break;

                                                            case '11':
                                                                $date_bulan = "November";
                                                                break;

                                                            case '12':
                                                                $date_bulan = "Desember";
                                                                break;
                                                        }

                                                        echo "$date_bulan $date_tahun" ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="" class=" dropdown-toggle" type="button" data-toggle="dropdown">News by Media
                                            <span class=""></span></a>
                                        <ul class="dropdown-menu">
                                            <?php

                                            $query_media = mysqli_query($conn, "SELECT media_name FROM news_content WHERE media = 'news' GROUP BY media_name");
                                            while ($data_media = mysqli_fetch_array($query_media)) {
                                            ?>
                                                <li>
                                                    <a href="single_page_media.php?media=<?= $data_media['media_name'] ?>"><?= $data_media['media_name'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div class="header_top_right">
                            <p>
                                <?php

                                $hari = date('l');
                                // echo $hari . "<br/>"; //akan menampilkan nama hari sekarang dalam bahasa inggris
                                $bulan = date('m');


                                switch ($hari) {
                                    case "Sunday":
                                        $hari = "Minggu";
                                        break;
                                    case "Monday":
                                        $hari = "Senin";
                                        break;
                                    case "Tuesday":
                                        $hari = "Selasa";
                                        break;
                                    case "Wednesday":
                                        $hari = "Rabu";
                                        break;
                                    case "Thursday":
                                        $hari = "Kamis";
                                        break;
                                    case "Friday":
                                        $hari = "Jumat";
                                        break;
                                    case "Saturday":
                                        $hari = "Sabtu";
                                        break;
                                }

                                switch ($bulan) {
                                    case "1":
                                        $bulan = "Januari";
                                        break;
                                    case "2":
                                        $bulan = "Februari";
                                        break;
                                    case "3":
                                        $bulan = "Maret";
                                        break;
                                    case "4":
                                        $bulan = "April";
                                        break;
                                    case "5":
                                        $bulan = "Mei";
                                        break;
                                    case "6":
                                        $bulan = "Juni";
                                        break;
                                    case "7":
                                        $bulan = "Juli";
                                        break;
                                    case "8":
                                        $bulan = "Agustus";
                                        break;
                                    case "9":
                                        $bulan = "September";
                                        break;
                                    case "10":
                                        $bulan = "Oktober";
                                        break;
                                    case "11":
                                        $bulan = "November";
                                        break;
                                    case "12":
                                        $bulan = "Desember";
                                        break;
                                }
                                //menampilkan format hari dalam bahasa indonesia
                                // echo "<br/>" . $hari;
                                $tanggal = date('d');
                                $tahun = date('Y');
                                //menampilkan hari tanggal bulan dan tahun
                                echo "$hari, $tanggal  $bulan  $tahun";
                                ?>
                            </p>
                            <form class="search" style="width:100% ;" action="../action/search.php" method="GET">
                                <input type="search" name="search" class="form-control-sm-3" style="margin-top:10px; margin-right:20px ; padding:5px;" placeholder="Cari Berita...">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area"><a href="../index.php" class="logo"><img src="../admin/public/image/icon/logo-vta.png" alt=""></a></div>
                        <!-- <div class="add_banner"><a href="#"><img src="../images/purple_panorama.jpg" style="width: 745 px;" alt=""></a></div> -->
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        <li class="active"><a href="../index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
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
                                    echo '../admin/public/image/' . $data['c_image'];
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
                            <span></span> <a href="../index.php" class="wow fadeInLeftBig">Go to home page</a>
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
                                            echo '../admin/public/image/' . $data['c_image'];
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
        <footer id="footer">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInLeftBig">
                            <h2>Flickr Images</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInDown">
                            <h2>Category</h2>
                            <ul class="tag_nav">
                                <?php
                                $get_data = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news' ");
                                while ($data = mysqli_fetch_array($get_data)) {
                                    $canal = $data['c_canal'];
                                ?>
                                    <li><a href="single_page_cat.php?c_canal=<?= $canal ?>"><?= ucfirst($canal) ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="footer_widget wow fadeInRightBig">
                            <h2>Contact</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <address>
                                Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p class="copyright">Copyright &copy; 2045 <a href="../index.php">NewsFeed</a></p>
                <p class="developer">Developed By Wpfreeware</p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="../assets/js/jquery.newsTicker.min.js"></script>
    <script src="../assets/js/jquery.fancybox.pack.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/tambahan.js"></script>
</body>

</html>