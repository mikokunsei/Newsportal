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
    <header id="header">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="header_top">
            <div class="header_top_left">
              <ul class="top_nav">
                <li><a href="index.php">Home</a></li>
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
              <div class="row">
                <div class="col-lg-6">
                  <form class="search" action="action/search.php" method="GET">
                    <input type="search" name="search" class="form-control-sm-3" style="margin-top:10px; margin-right:20px ; padding:5px;" placeholder="Cari Berita...">
                  </form>
                </div>
                <div class="col-lg-6">
                  <div class="option" style="display: inline-block; margin-top: 10px; border-right: 1px solid #333;color: #fff;font-size: 11px;font-weight: bold;text-transform: uppercase;">
                    <div class="row">
                      <?php
                      // $query = mysqli_query($conn, "SELECT * FROM tb_visitors");
                      include "config/connection.php";

                      if (!isset($_SESSION['nama'])) {
                      ?>
                        <a href="login.php" style="color: #fff;">Masuk</a> | <a href="layouts/register.php" style="color: #fff;">Daftar</a>
                      <?php
                      } else {
                        $nama = $_SESSION['nama'];
                      ?>
                        <a href="profile.php" style="color: #fff;"><?= $nama ?></a> | <a href="action/logout-visitor.php" style="color: #fff;">Keluar</a>
                      <?php } ?>
                    </div>
                    <div class="row">
                      <p style="display: inline-block; border-right: 1px solid #333; color: #fff;font-size: 11px;font-weight: bold;text-transform: uppercase;">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="logo_other" style="margin-top: 70px ; margin-bottom: 20px ; ">
            <center>
              <ul class="other-portal-v2">
                <li>
                  <a href="https://www.antaranews.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="antaranews">
                    <img src="images/logo_other_portal/antaranews.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://beritaterbaru.news/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="beritaterbaru">
                    <img src="images/logo_other_portal/beritaterbaru.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.cnbcindonesia.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="cnbcindonesia">
                    <img src="images/logo_other_portal/cnbcindonesia.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.jawapos.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="jawapos">
                    <img src="images/logo_other_portal/jawapos.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://kumparan.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="kumparan">
                    <img src="images/logo_other_portal/kumparan.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://mediaindonesia.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="mediaindonesia">
                    <img src="images/logo_other_portal/mediaindonesia.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.nytimes.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="nytimes">
                    <img src="images/logo_other_portal/nytimes.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.okezone.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="okezone">
                    <img src="images/logo_other_portal/okezone.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.republika.co.id/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="republika">
                    <img src="images/logo_other_portal/republika.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.suara.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="suara">
                    <img src="images/logo_other_portal/suara.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.tempo.co/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="tempo">
                    <img src="images/logo_other_portal/tempo.png" alt="" width="57" height="20" loading="lazy">
                  </a>

                </li>
                <li style="margin-top: 10px ;">
                  <a href="https://www.viva.co.id/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="vivanews">
                    <img src="images/logo_other_portal/vivanews.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://www.voaindonesia.com/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="voaindonesia">
                    <img src="images/logo_other_portal/voaindonesia.png" alt="" width="57" height="20" loading="lazy">
                  </a>&nbsp;
                  <a href="https://waspada.co.id/" target="_blank" rel="noopener" style="margin-right: 30px ;" aria-label="waspada">
                    <img src="images/logo_other_portal/waspada.png" alt="" width="57" height="20" loading="lazy">
                  </a>
                </li>
              </ul>
            </center>
          </div> -->
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="header_bottom">
            <div class="logo_area"><a href="index.php" class="logo"><img src="admin/public/image/logo/<?= $data_web['logo'] ?>" alt=""></a></div>
            <!-- <div class="add_banner"><a href="#"><img src="images/purple_panorama.jpg" style="width: 745 px;" alt=""></a></div> -->
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
                          <?= $data['txt']; ?>
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
                                <?= $data['txt']; ?>
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
                                <?= $data['txt']; ?>
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
                                <?= $data['txt']; ?>
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
                                <?= $data['txt']; ?>
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
          <aside class="right_content">
            <div class="single_sidebar">
              <h2><span>Popular Post</span></h2>
              <ul class="spost_nav">
                <?php
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' ORDER BY jml_view DESC LIMIT 5");
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
                          $db_tahun_9 = substr($data['c_datetime'], 0, 4);
                          $db_bulan_9 = substr($data['c_datetime'], 5, 2);
                          $db_tanggal_9 = substr($data['c_datetime'], 8, 2);
                          $db_jam_9 = substr($data['c_datetime'], 12, 8);
                          switch ($db_bulan_9) {
                            case '01':
                              $db_bulan_9 = "Januari";
                              break;

                            case '02':
                              $db_bulan_9 = "Februari";
                              break;

                            case '03':
                              $db_bulan_9 = "Maret";
                              break;

                            case '04':
                              $db_bulan_9 = "April";
                              break;

                            case '05':
                              $db_bulan_9 = "Mei";
                              break;

                            case '06':
                              $db_bulan_9 = "Juni";
                              break;

                            case '07':
                              $db_bulan_9 = "Juli";
                              break;

                            case '08':
                              $db_bulan_9 = "Agustus";
                              break;

                            case '09':
                              $db_bulan_9 = "September";
                              break;

                            case '10':
                              $db_bulan_9 = "Oktober";
                              break;

                            case '11':
                              $db_bulan_9 = "November";
                              break;

                            case '12':
                              $db_bulan_9 = "Desember";
                              break;
                          }
                          echo "$db_tanggal_9 " . substr($db_bulan_9, 0, 3) . " $db_tahun_9"; ?> | views : <?= $data['jml_view']; ?></span>
                      </div>
                      <div class="media-body"> <a href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')" class="catg_title"><?= $data['title']; ?></a> </div>
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
                      <li class="cat-item"><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?= ucfirst($canal); ?></a></li>
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
                              <a href="mailto:<?= $data_comment['email']; ?>">
                                <?= $data_comment['nama']; ?>
                              </a>
                              <br>
                            </h4>
                            <?= $data_comment['komentar']; ?> [<?= $data_comment['tgl']; ?>]
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
              <a class="sideAdd" href="https://pocarisweat.id/bintangsma/" target="_blank"><img src="images/bintang_sma.jpg" alt=""></a>

            </div>
            <div class="single_sidebar wow fadeInDown">
              <h2><span>PORTAL NEWS</span></h2>
              <ul class="wow fadeInDown">
                <?php
                $query = mysqli_query($conn, "SELECT DISTINCT media_name, link FROM news_content WHERE media = 'news' GROUP BY media_name ORDER BY media_name ASC ");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <li class="cat-item"><a href="https://<?= parse_url($data['link'], PHP_URL_HOST); ?>" target="_blank" style="max-width: 105px ; max-height:50px ; height:50px;">
                      <center><img class="img-responsive mx-auto d-block" src="images/logo_other_portal/<?= $data['media_name']; ?>.png" alt=""></center>
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
                  <li><a href="single_page_cat.php?c_canal=<?= $data_cat_ar['c_canal'] ?>"><?= ucfirst($canal) ?></a></li>
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
<?php 
include "footer.php";
?>