<?php
if (isset($_GET['tag']) || ($_GET['halaman'])) {
    $tag_news = $_GET['tag'];
} else {
    die("Error, No Tag Selected !");
}

include "../config/connection.php";

// echo $tag_news;

// $query = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND tag LIKE '$tag_news'");
// $data = mysqli_fetch_array($query);


?>


<!DOCTYPE html>
<html>

<head>
    <title>Pages by tag : <?php echo $tag_news; ?></title>
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
    <!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
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

                                                        echo "$date_bulan $date_tahun" ?>
                                                    </a>
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
                                                    <a href="single_page_media.php?media=<?= $data_media['media_name'] ?>"><?php echo $data_media['media_name'] ?></a>
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
                                echo "<br/>$hari, $tanggal  $bulan  $tahun";
                                ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="logo_area"><a href="../index.php" class="logo"><img src="../images/logo.jpg" alt=""></a></div>
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
                        <li><a href="../index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                        <?php
                        $get_data = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news'");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                            <li><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?php echo $data['c_canal']; ?></a></li>

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
                                <li><a href="single_page.php?id=<?= $data['id'] ?>"><img src="
                                <?php
                                $link = substr($data['c_image'], 0, 4);
                                if ($link != 'http') {
                                    echo '../admin/public/image/' . $data['c_image'];
                                } else {
                                    echo $data['c_image'];
                                }
                                ?>" alt=""><?php echo $data['title']; ?></a></li>
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
                            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND tag LIKE '%$tag_news%'");
                            $data = mysqli_fetch_array($get_data);
                            ?>
                            <ol class="breadcrumb">
                                <li><a href="../index.php">Home</a></li>
                                <li class="active"><a href="single_page_tag.php?tag=<?php echo $tag_news ?>"><?php echo ucfirst($tag_news); ?></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="single_post_content">

                            <h2><span><?php echo $tag_news ?></span></h2>


                            <div class="single_post_content">
                                <ul class="spost_nav">
                                    <?php

                                    $batas = 12;
                                    $halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? $_GET['halaman'] : 1;
                                    // if (empty($halaman)) {
                                    //     $posisi = 0;
                                    //     $hahlaman = 1;
                                    // } else {
                                    //     $posisi = ($halaman - 1) * $batas;
                                    //     echo "<b>$posisi</b> </br>";
                                    // }
                                    $posisi = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $get_data_tag = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND tag LIKE '%$tag_news%'");
                                    $jml_data = mysqli_num_rows($get_data_tag);
                                    $jml_halaman = ceil($jml_data / $batas);

                                    $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND tag LIKE '%$tag_news%' ORDER BY c_datetime DESC limit $posisi, $batas ");
                                    while ($data = mysqli_fetch_array($get_data)) {

                                    ?>
                                        <li>
                                            <div class="list-news wow fadeInRight">
                                                <div class="media wow fadeInDown">
                                                    <a href="single_page.php?id=<?= $data['id'] ?>" class="media-left">
                                                        <img alt="" src="
                                                    <?php
                                                    $link = substr($data['c_image'], 0, 4);
                                                    if ($link != 'http') {
                                                        echo '../admin/public/image/' . $data['c_image'];
                                                    } else {
                                                        echo $data['c_image'];
                                                    }
                                                    ?>">
                                                    </a>
                                                    <div class="media-body">
                                                        <span><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?php echo $data['media_name'] ?></a></b> |
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
                                                            echo "$db_tanggal $db_bulan $db_tahun [$db_jam]";
                                                            ?></span>
                                                        <h5>
                                                            <a href="single_page.php?id=<?= $data['id'] ?>" class="catg_title"> <?php echo $data['title']; ?> </a>
                                                        </h5>
                                                        <p class="text-paragraph">
                                                            <?php echo strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
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

                                <?php
                                // echo "jumlah halaman : " . $jml_halaman . "</br>";
                                // echo "jumlah data : " . $jml_data . "</br>";
                                // echo "halaman : " . $halaman . "</br>";
                                // echo "posisi data ke : " . $posisi . "</br>";
                                ?>

                            </div>
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
                                            <a class="page-link" href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $previous ?>">Previous</a>
                                        </li>
                                    <?php
                                    }

                                    // 1 Halaman dan titik
                                    if ($halaman > 3) {
                                    ?>
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=1">1</a></li>
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
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $halaman - 2 ?>"><?php echo $halaman - 2 ?></a></li>
                                    <?php
                                    }

                                    if ($halaman - 1 > 0) {
                                    ?>
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $halaman - 1 ?>"><?php echo $halaman - 1 ?></a></li>
                                    <?php
                                    }
                                    ?>

                                    <!-- CURRENT -->
                                    <li class="page-item active"><a><?php echo $halaman; ?></a></li>

                                    <?php

                                    // 2 Halaman
                                    if ($halaman + 1 < $jml_halaman + 1) {
                                    ?>
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $halaman + 1 ?>"><?php echo $halaman + 1 ?></a></li>
                                    <?php
                                    }
                                    if ($halaman + 2 < $jml_halaman + 1) {
                                    ?>
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $halaman + 2 ?>"><?php echo $halaman + 2 ?></a></li>
                                        <?php
                                    }

                                    if ($halaman < $jml_halaman - 2) {
                                        if ($halaman < $jml_halaman - 3) {
                                        ?>
                                            <li class="page-item"><a>...</a></li>

                                        <?php
                                        }
                                        ?>
                                        <li class="page-item"><a href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $jml_halaman ?>"><?php echo $jml_halaman ?></a></li>
                                    <?php
                                    }


                                    if ($halaman != $jml_halaman) {
                                    ?>
                                        <li class="page-item">
                                            <a class="page-link" href="single_page_tag.php?tag=<?= $tag_news ?>&halaman=<?= $next ?>">Next</a>
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
                                        <div class="media wow fadeInDown"> <a href="single_page.php?id=<?= $data['id'] ?>" class="media-left"> <img alt="" src="
                                        <?php
                                        $link = substr($data['c_image'], 0, 4);
                                        if ($link != 'http') {
                                            echo '../admin/public/image/' . $data['c_image'];
                                        } else {
                                            echo $data['c_image'];
                                        }
                                        ?>"> </a>
                                            <div class="media-header">
                                                <span style="font-size: 13px;"><?php echo '<b>' . $data['media_name'] . '</b>' ?> |
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
                                                    echo "$db_tanggal_2 " . substr($db_bulan_2, 0, 3) . " $db_tahun_2"; ?> | views : <?php echo $data['jml_view']; ?></span>
                                            </div>
                                            <div class="media-body"> <a href="single_page.php?id=<?= $data['id'] ?>" class="catg_title"><?php echo $data['title']; ?></a> </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="single_sidebar">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                                <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                                <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="category">
                                    <ul>
                                        <?php
                                        $get_data = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news' ");
                                        while ($data = mysqli_fetch_array($get_data)) {
                                            $canal = $data['c_canal'];
                                        ?>
                                            <li class="cat-item"><a href="single_page_cat.php?c_canal=<?= $canal ?>"><?php echo ucfirst($canal); ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="video">
                                    <div class="vide_area">
                                        <!-- Insert this tag where you want the widget to render -->
                                        <iframe width="100%" height="250" src="https://cybermap.kaspersky.com/en/widget/dynamic/dark" frameborder="0"></iframe>
                                        <!-- <iframe width="100%" height="250" src="https://www.youtube.com/embed/_Kyq0T3qe4w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                        <!-- <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe> -->
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="comments">
                                    <!-- <div id="prev-button"><i class="fa fa-chevron-up"></i></div> -->
                                    <ul class="spost_nav">
                                        <?php
                                        $sql_comment = "SELECT * FROM tb_comments WHERE status = 'aktif' ORDER BY rand() DESC LIMIT 3";
                                        $get_comment = mysqli_query($conn, $sql_comment);

                                        while ($data_comment = mysqli_fetch_array($get_comment)) {

                                        ?>
                                            <li>
                                                <!-- <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                        <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                      </div> -->
                                                <div class="media wow fadeInRight">
                                                    <div class="media-body">
                                                        <h4>
                                                            <a href="mailto:<?php echo $data_comment['email']; ?>">
                                                                <?php echo $data_comment['nama']; ?>
                                                            </a>
                                                            <br>
                                                        </h4>
                                                        <?php echo $data_comment['komentar']; ?> [<?php echo $data_comment['tgl']; ?>]
                                                        <hr>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <!-- <div id="next-button"><i class="fa  fa-chevron-down"></i></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>Sponsor</span></h2>
                            <a class="sideAdd" href="https://pocarisweat.id/bintangsma/" target="_blank"><img src="../images/bintang_sma.jpg" alt=""></a>
                        </div>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>PORTAL NEWS</span></h2>
                            <ul class="wow fadeInDown ">
                                <?php
                                $query = mysqli_query($conn, "SELECT DISTINCT media_name, link FROM news_content WHERE media = 'news' GROUP BY media_name ORDER BY media_name ASC ");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <li class="cat-item"><a href="https://<?= parse_url($data['link'], PHP_URL_HOST); ?>" target="_blank" style="max-width: 105px ; max: height 50px; height: 50px;">
                                            <center><img class="img-responsive mx-auto d-block" src="../images/logo_other_portal/<?= $data['media_name']; ?>.png" alt=""></center>
                                        </a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>Category Archive</span></h2>
                            <ul>
                                <?php
                                $get_cat_ar = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news' ");
                                while ($data_cat_ar = mysqli_fetch_array($get_cat_ar)) {
                                    $canal = $data_cat_ar['c_canal'];
                                ?>
                                    <li><a href="single_page_cat.php?c_canal=<?= $data_cat_ar['c_canal'] ?>"><?php echo ucfirst($canal) ?></a></li>
                                <?php
                                }
                                ?>
                                <!-- <li><a href="#">Blog</a></li>
                <li><a href="#">Rss Feed</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Life &amp; Style</a></li> -->
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
                            <h2>Flicker Images</h2>
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
                                    <li><a href="single_page_cat.php?c_canal=<?= $canal ?>"><?php echo ucfirst($canal) ?></a></li>
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
</body>

</html>