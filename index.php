<?php

include 'config/connection.php';

session_start();


?>


<!DOCTYPE html>
<html>

<head>
  <?php
  include "config/connection.php";

  $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
  $data_web = mysqli_fetch_array($query_web);

  ?>
  <title><?= $data_web['title'] ?></title>
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

  <link rel="shortcut icon" href="admin/public/image/icon/<?= $data_web['icon'] ?>" type="image/png">
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

    .text-paragraph p {
      background: none repeat scroll 0 0 rgba(0, 0, 0, 0.4);
      color: #fff;
      padding: 3px;
      display: inline-block;

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
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">
    <?php include "header.php" ?>
    <section id="navArea">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav main_nav" id="canal-top">
            
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
          <div class="latest_newsarea">
            <span>Latest News</span>
            <ul id="ticker01" class="news_sticker">
              <?php
              $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 10");
              while ($data = mysqli_fetch_array($get_data)) {
                // print_r($data);
              ?>
                <li><a href="#" onclick="updateViews('<?= $data['id'] ?>')"><img src="
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
    <section id="sliderSection">
      <div class="row" style="margin-bottom: 30px ;">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="slick_slider">
            <?php
            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 4");
            while ($data = mysqli_fetch_array($get_data)) {
              // print_r($data);
              $date_news = $data['c_datetime'];
            ?>
              <div class="single_iteam"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"> <img src="
              <?php
              $link = substr($data['c_image'], 0, 4);
              if ($link != 'http') {
                echo 'admin/public/image/' . $data['c_image'];
              } else {
                echo $data['c_image'];
              }
              ?>" alt=""></a>
                <div class="slider_article">
                  <h2><a class="slider_tittle" href="single_page.php?id=<?= $data['id'] ?>"><?= $data['title']; ?></a></h2>
                  <p class="text-paragraph">
                    <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                  </p>
                  <p>
                    <a href="single_page_media.php?media=<?= $data['media_name'] ?>" style="color:#fff;"><?= $data['media_name'] ?></a>
                    |
                  </p>
                  <p>
                    <?php
                    $db_tahun = substr($data['c_datetime'], 0, 4);
                    $db_bulan = substr($data['c_datetime'], 5, 2);
                    $db_tanggal = substr($data['c_datetime'], 8, 2);
                    // tambah 10 jam menyesuaikan waktu indonesia
                    $db_jam = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
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
                    ?>
                  </p>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="latest_post">
            <h2><span>Latest post</span></h2>
            <div class="latest_post_container">
              <ul class="latest_postnav">
                <div id="prev-button"><i class="fa fa-chevron-up"></i></div>

                <?php
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' ORDER BY c_datetime DESC LIMIT 5");
                while ($data = mysqli_fetch_array($get_data)) {
                  // print_r($data);
                ?>
                  <li>
                    <div class="media">
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
                        <div class="media-header">
                          <span style="font-size: 14px;"> <b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                            <?php
                            $db_tahun_2 = substr($data['c_datetime'], 0, 4);
                            $db_bulan_2 = substr($data['c_datetime'], 5, 2);
                            $db_tanggal_2 = substr($data['c_datetime'], 8, 2);
                            // tambah 10 jam menyesuaikan waktu indonesia
                            $db_jam_2 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
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
                            echo "$db_tanggal_2 $db_bulan_2 $db_tahun_2"; ?></span>
                        </div>
                        <h5>
                          <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                        </h5>
                      </div>
                    </div>
                  </li>
                <?php
                }
                ?>
                <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
            <div class="single_post_content">
              <h2><span>News</span></h2>
              <div class="single_post_content_left">
                <?php
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'news' ORDER BY rand() LIMIT 1");
                while ($data = mysqli_fetch_array($get_data)) {
                ?>
                  <ul class="news_catgnav  wow fadeInDown">
                    <li>
                      <figure class="bsbig_fig"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="featured_img"> <img alt="" src="
                      <?php
                      $link = substr($data['c_image'], 0, 4);
                      if ($link != 'http') {
                        echo 'admin/public/image/' . $data['c_image'];
                      } else {
                        echo $data['c_image'];
                      }
                      ?>"> <span class="overlay"></span> </a>
                        <figcaption> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a> </figcaption>
                        <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                          <?php
                          $db_tahun_3 = substr($data['c_datetime'], 0, 4);
                          $db_bulan_3 = substr($data['c_datetime'], 5, 2);
                          $db_tanggal_3 = substr($data['c_datetime'], 8, 2);
                          // tambah 10 jam menyesuaikan waktu indonesia
                          $db_jam_3 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                          switch ($db_bulan_3) {
                            case '01':
                              $db_bulan_3 = "Januari";
                              break;

                            case '02':
                              $db_bulan_3 = "Februari";
                              break;

                            case '03':
                              $db_bulan_3 = "Maret";
                              break;

                            case '04':
                              $db_bulan_3 = "April";
                              break;

                            case '05':
                              $db_bulan_3 = "Mei";
                              break;

                            case '06':
                              $db_bulan_3 = "Juni";
                              break;

                            case '07':
                              $db_bulan_3 = "Juli";
                              break;

                            case '08':
                              $db_bulan_3 = "Agustus";
                              break;

                            case '09':
                              $db_bulan_3 = "September";
                              break;

                            case '10':
                              $db_bulan_3 = "Oktober";
                              break;

                            case '11':
                              $db_bulan_3 = "November";
                              break;

                            case '12':
                              $db_bulan_3 = "Desember";
                              break;
                          }
                          echo "$db_tanggal_3 $db_bulan_3 $db_tahun_3 [$db_jam_3]"; ?></span>
                        <p class="text-paragraph">
                          <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                        </p>
                      </figure>
                    </li>
                  </ul>
                <?php
                }
                ?>
              </div>
              <div class="single_post_content_right">
                <ul class="spost_nav">
                  <?php
                  $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'news' ORDER BY rand() LIMIT 4");
                  while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                    <li>
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
                          <div class="media-header">
                            <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                              <?php
                              $db_tahun_4 = substr($data['c_datetime'], 0, 4);
                              $db_bulan_4 = substr($data['c_datetime'], 5, 2);
                              $db_tanggal_4 = substr($data['c_datetime'], 8, 2);
                              // tambah 10 jam menyesuaikan waktu indonesia
                              $db_jam_4 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                              switch ($db_bulan_4) {
                                case '01':
                                  $db_bulan_4 = "Januari";
                                  break;

                                case '02':
                                  $db_bulan_4 = "Februari";
                                  break;

                                case '03':
                                  $db_bulan_4 = "Maret";
                                  break;

                                case '04':
                                  $db_bulan_4 = "April";
                                  break;

                                case '05':
                                  $db_bulan_4 = "Mei";
                                  break;

                                case '06':
                                  $db_bulan_4 = "Juni";
                                  break;

                                case '07':
                                  $db_bulan_4 = "Juli";
                                  break;

                                case '08':
                                  $db_bulan_4 = "Agustus";
                                  break;

                                case '09':
                                  $db_bulan_4 = "September";
                                  break;

                                case '10':
                                  $db_bulan_4 = "Oktober";
                                  break;

                                case '11':
                                  $db_bulan_4 = "November";
                                  break;

                                case '12':
                                  $db_bulan_4 = "Desember";
                                  break;
                              }
                              echo "$db_tanggal_4 $db_bulan_4 $db_tahun_4"; ?></span>
                          </div>
                          <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                        </div>
                      </div>
                    </li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
            <ul class="main-news">
              <li>
                <div class="fashion_technology_area">
                  <div class="fashion">
                    <div class="single_post_content">
                      <h2><span>Hukum</span></h2>
                      <ul class="news_catgnav wow fadeInDown">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'hukum' ORDER BY rand() LIMIT 1");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
                            <figure class="bsbig_fig"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="featured_img"> <img alt="" src="
                        <?php
                          $link = substr($data['c_image'], 0, 4);
                          if ($link != 'http') {
                            echo 'admin/public/image/' . $data['c_image'];
                          } else {
                            echo $data['c_image'];
                          }
                        ?>"> <span class="overlay"></span> </a>
                              <figcaption> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a> </figcaption>
                              <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                <?php
                                $db_tahun_5 = substr($data['c_datetime'], 0, 4);
                                $db_bulan_5 = substr($data['c_datetime'], 5, 2);
                                $db_tanggal_5 = substr($data['c_datetime'], 8, 2);
                                // tambah 10 jam menyesuaikan waktu indonesia
                                $db_jam_5 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                switch ($db_bulan_5) {
                                  case '01':
                                    $db_bulan_5 = "Januari";
                                    break;

                                  case '02':
                                    $db_bulan_5 = "Februari";
                                    break;

                                  case '03':
                                    $db_bulan_5 = "Maret";
                                    break;

                                  case '04':
                                    $db_bulan_5 = "April";
                                    break;

                                  case '05':
                                    $db_bulan_5 = "Mei";
                                    break;

                                  case '06':
                                    $db_bulan_5 = "Juni";
                                    break;

                                  case '07':
                                    $db_bulan_5 = "Juli";
                                    break;

                                  case '08':
                                    $db_bulan_5 = "Agustus";
                                    break;

                                  case '09':
                                    $db_bulan_5 = "September";
                                    break;

                                  case '10':
                                    $db_bulan_5 = "Oktober";
                                    break;

                                  case '11':
                                    $db_bulan_5 = "November";
                                    break;

                                  case '12':
                                    $db_bulan_5 = "Desember";
                                    break;
                                }
                                echo "$db_tanggal_5 $db_bulan_5 $db_tahun_5 [$db_jam_5]"; ?></span>
                              </span>
                              <p class="text-paragraph">
                                <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                              </p>
                            </figure>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                      <ul class="spost_nav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'hukum' ORDER BY rand() LIMIT 4");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
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
                                <div class="media-header">
                                  <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                    <?php
                                    $db_tahun_6 = substr($data['c_datetime'], 0, 4);
                                    $db_bulan_6 = substr($data['c_datetime'], 5, 2);
                                    $db_tanggal_6 = substr($data['c_datetime'], 8, 2);
                                    // tambah 10 jam menyesuaikan waktu indonesia
                                    $db_jam_6 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                    switch ($db_bulan_6) {
                                      case '01':
                                        $db_bulan_6 = "Januari";
                                        break;

                                      case '02':
                                        $db_bulan_6 = "Februari";
                                        break;

                                      case '03':
                                        $db_bulan_6 = "Maret";
                                        break;

                                      case '04':
                                        $db_bulan_6 = "April";
                                        break;

                                      case '05':
                                        $db_bulan_6 = "Mei";
                                        break;

                                      case '06':
                                        $db_bulan_6 = "Juni";
                                        break;

                                      case '07':
                                        $db_bulan_6 = "Juli";
                                        break;

                                      case '08':
                                        $db_bulan_6 = "Agustus";
                                        break;

                                      case '09':
                                        $db_bulan_6 = "September";
                                        break;

                                      case '10':
                                        $db_bulan_6 = "Oktober";
                                        break;

                                      case '11':
                                        $db_bulan_6 = "November";
                                        break;

                                      case '12':
                                        $db_bulan_6 = "Desember";
                                        break;
                                    }
                                    echo "$db_tanggal_6 $db_bulan_6 $db_tahun_6"; ?></span>
                                </div>
                                <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                              </div>
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                  <div class="technology">
                    <div class="single_post_content">
                      <h2><span>Politik</span></h2>
                      <ul class="news_catgnav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'politik' ORDER BY rand() LIMIT 1");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
                            <figure class="bsbig_fig wow fadeInDown"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="featured_img"> <img alt="" src="
                        <?php
                          $link = substr($data['c_image'], 0, 4);
                          if ($link != 'http') {
                            echo 'admin/public/image/' . $data['c_image'];
                          } else {
                            echo $data['c_image'];
                          }
                        ?>"> <span class="overlay"></span> </a>
                              <figcaption> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a> </figcaption>
                              <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                <?php
                                $db_tahun_7 = substr($data['c_datetime'], 0, 4);
                                $db_bulan_7 = substr($data['c_datetime'], 5, 2);
                                $db_tanggal_7 = substr($data['c_datetime'], 8, 2);
                                // tambah 10 jam menyesuaikan waktu indonesia
                                $db_jam_7 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                switch ($db_bulan_7) {
                                  case '01':
                                    $db_bulan_7 = "Januari";
                                    break;

                                  case '02':
                                    $db_bulan_7 = "Februari";
                                    break;

                                  case '03':
                                    $db_bulan_7 = "Maret";
                                    break;

                                  case '04':
                                    $db_bulan_7 = "April";
                                    break;

                                  case '05':
                                    $db_bulan_7 = "Mei";
                                    break;

                                  case '06':
                                    $db_bulan_7 = "Juni";
                                    break;

                                  case '07':
                                    $db_bulan_7 = "Juli";
                                    break;

                                  case '08':
                                    $db_bulan_7 = "Agustus";
                                    break;

                                  case '09':
                                    $db_bulan_7 = "September";
                                    break;

                                  case '10':
                                    $db_bulan_7 = "Oktober";
                                    break;

                                  case '11':
                                    $db_bulan_7 = "November";
                                    break;

                                  case '12':
                                    $db_bulan_7 = "Desember";
                                    break;
                                }
                                echo "$db_tanggal_7 $db_bulan_7 $db_tahun_7 [$db_jam_7]"; ?></span>
                              <p class="text-paragraph">
                                <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                              </p>
                            </figure>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                      <ul class="spost_nav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'politik' ORDER BY rand() LIMIT 4");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
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
                                <div class="media-header">
                                  <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                    <?php
                                    $db_tahun_8 = substr($data['c_datetime'], 0, 4);
                                    $db_bulan_8 = substr($data['c_datetime'], 5, 2);
                                    $db_tanggal_8 = substr($data['c_datetime'], 8, 2);
                                    // tambah 10 jam menyesuaikan waktu indonesia
                                    $db_jam_8 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                    switch ($db_bulan_8) {
                                      case '01':
                                        $db_bulan_8 = "Januari";
                                        break;

                                      case '02':
                                        $db_bulan_8 = "Februari";
                                        break;

                                      case '03':
                                        $db_bulan_8 = "Maret";
                                        break;

                                      case '04':
                                        $db_bulan_8 = "April";
                                        break;

                                      case '05':
                                        $db_bulan_8 = "Mei";
                                        break;

                                      case '06':
                                        $db_bulan_8 = "Juni";
                                        break;

                                      case '07':
                                        $db_bulan_8 = "Juli";
                                        break;

                                      case '08':
                                        $db_bulan_8 = "Agustus";
                                        break;

                                      case '09':
                                        $db_bulan_8 = "September";
                                        break;

                                      case '10':
                                        $db_bulan_8 = "Oktober";
                                        break;

                                      case '11':
                                        $db_bulan_8 = "November";
                                        break;

                                      case '12':
                                        $db_bulan_8 = "Desember";
                                        break;
                                    }
                                    echo "$db_tanggal_8 $db_bulan_8 $db_tahun_8"; ?></span>
                                </div>
                                <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                              </div>
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="fashion_technology_area">
                  <div class="fashion">
                    <div class="single_post_content">
                      <h2><span>Nasional</span></h2>
                      <ul class="news_catgnav wow fadeInDown">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'nasional' ORDER BY rand() LIMIT 1");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
                            <figure class="bsbig_fig"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="featured_img"> <img alt="" src="
                        <?php
                          $link = substr($data['c_image'], 0, 4);
                          if ($link != 'http') {
                            echo 'admin/public/image/' . $data['c_image'];
                          } else {
                            echo $data['c_image'];
                          }
                        ?>"> <span class="overlay"></span> </a>
                              <figcaption> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a> </figcaption>
                              <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                <?php
                                $db_tahun_5 = substr($data['c_datetime'], 0, 4);
                                $db_bulan_5 = substr($data['c_datetime'], 5, 2);
                                $db_tanggal_5 = substr($data['c_datetime'], 8, 2);
                                // tambah 10 jam menyesuaikan waktu indonesia
                                $db_jam_5 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                switch ($db_bulan_5) {
                                  case '01':
                                    $db_bulan_5 = "Januari";
                                    break;

                                  case '02':
                                    $db_bulan_5 = "Februari";
                                    break;

                                  case '03':
                                    $db_bulan_5 = "Maret";
                                    break;

                                  case '04':
                                    $db_bulan_5 = "April";
                                    break;

                                  case '05':
                                    $db_bulan_5 = "Mei";
                                    break;

                                  case '06':
                                    $db_bulan_5 = "Juni";
                                    break;

                                  case '07':
                                    $db_bulan_5 = "Juli";
                                    break;

                                  case '08':
                                    $db_bulan_5 = "Agustus";
                                    break;

                                  case '09':
                                    $db_bulan_5 = "September";
                                    break;

                                  case '10':
                                    $db_bulan_5 = "Oktober";
                                    break;

                                  case '11':
                                    $db_bulan_5 = "November";
                                    break;

                                  case '12':
                                    $db_bulan_5 = "Desember";
                                    break;
                                }
                                echo "$db_tanggal_5 $db_bulan_5 $db_tahun_5 [$db_jam_5]"; ?></span>
                              </span>
                              <p class="text-paragraph">
                                <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                              </p>
                            </figure>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                      <ul class="spost_nav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'nasional' ORDER BY rand() LIMIT 4");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
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
                                <div class="media-header">
                                  <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                    <?php
                                    $db_tahun_6 = substr($data['c_datetime'], 0, 4);
                                    $db_bulan_6 = substr($data['c_datetime'], 5, 2);
                                    $db_tanggal_6 = substr($data['c_datetime'], 8, 2);
                                    // tambah 10 jam menyesuaikan waktu indonesia
                                    $db_jam_6 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                    switch ($db_bulan_6) {
                                      case '01':
                                        $db_bulan_6 = "Januari";
                                        break;

                                      case '02':
                                        $db_bulan_6 = "Februari";
                                        break;

                                      case '03':
                                        $db_bulan_6 = "Maret";
                                        break;

                                      case '04':
                                        $db_bulan_6 = "April";
                                        break;

                                      case '05':
                                        $db_bulan_6 = "Mei";
                                        break;

                                      case '06':
                                        $db_bulan_6 = "Juni";
                                        break;

                                      case '07':
                                        $db_bulan_6 = "Juli";
                                        break;

                                      case '08':
                                        $db_bulan_6 = "Agustus";
                                        break;

                                      case '09':
                                        $db_bulan_6 = "September";
                                        break;

                                      case '10':
                                        $db_bulan_6 = "Oktober";
                                        break;

                                      case '11':
                                        $db_bulan_6 = "November";
                                        break;

                                      case '12':
                                        $db_bulan_6 = "Desember";
                                        break;
                                    }
                                    echo "$db_tanggal_6 $db_bulan_6 $db_tahun_6"; ?></span>
                                </div>
                                <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                              </div>
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                  <div class="technology">
                    <div class="single_post_content">
                      <h2><span>Militer</span></h2>
                      <ul class="news_catgnav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'militer' ORDER BY rand() LIMIT 1");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
                            <figure class="bsbig_fig wow fadeInDown"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="featured_img"> <img alt="" src="
                        <?php
                          $link = substr($data['c_image'], 0, 4);
                          if ($link != 'http') {
                            echo 'admin/public/image/' . $data['c_image'];
                          } else {
                            echo $data['c_image'];
                          }
                        ?>"> <span class="overlay"></span> </a>
                              <figcaption> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a> </figcaption>
                              <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                <?php
                                $db_tahun_7 = substr($data['c_datetime'], 0, 4);
                                $db_bulan_7 = substr($data['c_datetime'], 5, 2);
                                $db_tanggal_7 = substr($data['c_datetime'], 8, 2);
                                // tambah 10 jam menyesuaikan waktu indonesia
                                $db_jam_7 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                switch ($db_bulan_7) {
                                  case '01':
                                    $db_bulan_7 = "Januari";
                                    break;

                                  case '02':
                                    $db_bulan_7 = "Februari";
                                    break;

                                  case '03':
                                    $db_bulan_7 = "Maret";
                                    break;

                                  case '04':
                                    $db_bulan_7 = "April";
                                    break;

                                  case '05':
                                    $db_bulan_7 = "Mei";
                                    break;

                                  case '06':
                                    $db_bulan_7 = "Juni";
                                    break;

                                  case '07':
                                    $db_bulan_7 = "Juli";
                                    break;

                                  case '08':
                                    $db_bulan_7 = "Agustus";
                                    break;

                                  case '09':
                                    $db_bulan_7 = "September";
                                    break;

                                  case '10':
                                    $db_bulan_7 = "Oktober";
                                    break;

                                  case '11':
                                    $db_bulan_7 = "November";
                                    break;

                                  case '12':
                                    $db_bulan_7 = "Desember";
                                    break;
                                }
                                echo "$db_tanggal_7 $db_bulan_7 $db_tahun_7 [$db_jam_7]"; ?></span>
                              <p class="text-paragraph">
                                <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                              </p>
                            </figure>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                      <ul class="spost_nav">
                        <?php
                        $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'militer' ORDER BY rand() LIMIT 4");
                        while ($data = mysqli_fetch_array($get_data)) {
                        ?>
                          <li>
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
                                <div class="media-header">
                                  <span style="font-size: 14px;"><b> <a href="single_page_media.php?media=<?= $data['media_name'] ?>"><?= $data['media_name'] ?></a></b> |
                                    <?php
                                    $db_tahun_8 = substr($data['c_datetime'], 0, 4);
                                    $db_bulan_8 = substr($data['c_datetime'], 5, 2);
                                    $db_tanggal_8 = substr($data['c_datetime'], 8, 2);
                                    // tambah 10 jam menyesuaikan waktu indonesia
                                    $db_jam_8 = (intval(substr($data['c_datetime'], 12, 1)) + 10) . substr($data['c_datetime'], 13, 7);
                                    switch ($db_bulan_8) {
                                      case '01':
                                        $db_bulan_8 = "Januari";
                                        break;

                                      case '02':
                                        $db_bulan_8 = "Februari";
                                        break;

                                      case '03':
                                        $db_bulan_8 = "Maret";
                                        break;

                                      case '04':
                                        $db_bulan_8 = "April";
                                        break;

                                      case '05':
                                        $db_bulan_8 = "Mei";
                                        break;

                                      case '06':
                                        $db_bulan_8 = "Juni";
                                        break;

                                      case '07':
                                        $db_bulan_8 = "Juli";
                                        break;

                                      case '08':
                                        $db_bulan_8 = "Agustus";
                                        break;

                                      case '09':
                                        $db_bulan_8 = "September";
                                        break;

                                      case '10':
                                        $db_bulan_8 = "Oktober";
                                        break;

                                      case '11':
                                        $db_bulan_8 = "November";
                                        break;

                                      case '12':
                                        $db_bulan_8 = "Desember";
                                        break;
                                    }
                                    echo "$db_tanggal_8 $db_bulan_8 $db_tahun_8"; ?></span>
                                </div>
                                <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a>
                              </div>
                            </div>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <?php include "right_side.php" ?>
        </div>
      </div>
    </section>
<?php 
include "footer.php";
?>