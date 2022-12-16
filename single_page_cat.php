<?php

session_start();

if (isset($_GET['c_canal']) || ($_GET['halaman'])) {
  $cat_news = $_GET['c_canal'];
} else {
  die("Error, No Canal Selected !");
}

include "config/connection.php";

$query_cat = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news'");
$data_cat = mysqli_fetch_array($query_cat);

if ($cat_news != $data_cat['c_canal']) {
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
  <title><?= $data_web['title'] ?> By Category</title>
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

  <link rel="shortcut icon" href="admin/public/image/icon/logo_icon_vta.png" type="image/png">

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
              <li <?php if ($data['c_canal'] == $cat_news) {
                    echo 'class="active"';
                  } ?>><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?= $data['c_canal']; ?></a></li>

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
              $get_data = mysqli_query($conn, "SELECT c_canal FROM news_content WHERE c_canal = '$cat_news' ");
              $data = mysqli_fetch_array($get_data);
              ?>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?= ucfirst($data['c_canal']); ?></a></li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="slick_slider">
            <?php
            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY c_datetime DESC LIMIT 4");
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
                  <h2><a class="slider_tittle" href="single_page.php?id=<?= $data['id'] ?>" onclick="updateViews('<?= $data['id'] ?>')"><?= $data['title']; ?></a></h2>
                  <p class="text-paragraph">
                    <?= strip_tags(htmlspecialchars_decode(html_entity_decode($data['txt']))); ?>
                  </p>
                  <p><?= $data['media_name'] ?> |
                    <?php
                    $db_tahun = substr($date_news, 0, 4);
                    $db_bulan = substr($date_news, 5, 2);
                    $db_tanggal = substr($date_news, 8, 2);
                    $db_jam = substr($date_news, 12, 8);
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
                    ?></p>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
            <div class="single_post_content">

              <h2><span><?= $cat_news ?></span></h2>

              <div class="single_post_content_left">
                <ul class="news_catgnav  wow fadeInDown">
                  <?php
                  $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY rand() LIMIT 3");
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
                        <span style="font-size: 14px;"><?= '<b>' . $data['media_name'] . '</b>' ?> |
                          <?php
                          $db_tahun_2 = substr($data['c_datetime'], 0, 4);
                          $db_bulan_2 = substr($data['c_datetime'], 5, 2);
                          $db_tanggal_2 = substr($data['c_datetime'], 8, 2);
                          $db_jam_2 = substr($data['c_datetime'], 12, 8);
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
                          ?>
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
              </div>
              <div class="single_post_content_right">
                <ul class="spost_nav">
                  <?php

                  $batas = 12;
                  // $halaman = @$_GET['halaman'];
                  $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                  // if (empty($halaman)) {
                  //   $posisi = 0;
                  //   $hahlaman = 1;
                  // } else {
                  //   $posisi = ($halaman - 1) * $batas;
                  // }
                  $posisi = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;


                  $get_data_cat = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news'");
                  $jml_data = mysqli_num_rows($get_data_cat);
                  $jml_halaman = ceil($jml_data / $batas);

                  // echo "$jml_data </br>";
                  // echo "$batas </br>";
                  // echo "$jml_halaman";

                  $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY c_datetime DESC LIMIT $posisi, $batas");
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
                            <span style="font-size: 14px;"><?= '<b>' . $data['media_name'] . '</b>' ?> |
                              <?php
                              $db_tahun_3 = substr($data['c_datetime'], 0, 4);
                              $db_bulan_3 = substr($data['c_datetime'], 5, 2);
                              $db_tanggal_3 = substr($data['c_datetime'], 8, 2);
                              $db_jam_3 = substr($data['c_datetime'], 12, 8);
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
                              echo "$db_tanggal_3 $db_bulan_3 $db_tahun_3";
                              ?>
                            </span>
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
                      <a class="page-link" href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $previous ?>">Previous</a>
                    </li>
                  <?php
                  }

                  // 1 Halaman dan titik
                  if ($halaman > 3) {
                  ?>
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=1">1</a></li>
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
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $halaman - 2 ?>"><?= $halaman - 2 ?></a></li>
                  <?php
                  }

                  if ($halaman - 1 > 0) {
                  ?>
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $halaman - 1 ?>"><?= $halaman - 1 ?></a></li>
                  <?php
                  }
                  ?>

                  <!-- CURRENT -->
                  <li class="page-item active"><a><?= $halaman; ?></a></li>

                  <?php

                  // 2 Halaman
                  if ($halaman + 1 < $jml_halaman + 1) {
                  ?>
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $halaman + 1 ?>"><?= $halaman + 1 ?></a></li>
                  <?php
                  }
                  if ($halaman + 2 < $jml_halaman + 1) {
                  ?>
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $halaman + 2 ?>"><?= $halaman + 2 ?></a></li>
                    <?php
                  }

                  if ($halaman < $jml_halaman - 2) {
                    if ($halaman < $jml_halaman - 3) {
                    ?>
                      <li class="page-item"><a>...</a></li>

                    <?php
                    }
                    ?>
                    <li class="page-item"><a href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $jml_halaman ?>"><?= $jml_halaman ?></a></li>
                  <?php
                  }


                  if ($halaman != $jml_halaman) {
                  ?>
                    <li class="page-item">
                      <a class="page-link" href="single_page_cat.php?c_canal=<?= $cat_news ?>&halaman=<?= $next ?>">Next</a>
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
        <div class="col-lg-4 col-md-4 col-sm-4">
          <?php 
          include "right_side.php";
          ?>
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
        <p class="copyright">Copyright &copy; 2045 <a href="index.php">NewsFeed</a></p>
        <p class="developer">Developed By Wpfreeware</p>
      </div>
    </footer>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/jquery.li-scroller.1.0.js"></script>
  <script src="assets/js/jquery.newsTicker.min.js"></script>
  <script src="assets/js/jquery.fancybox.pack.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/tambahan.js"></script>

  <script>
    // UPDATE VIEWS BERITA
    function updateViews(id) {
            var id_news = id;

            $.ajax({
                type: "POST",
                url: "action/update-views.php",
                data: {
                id: id_news
                },
                // dataType: "dataType",  
                success: function(response) {
                // alert(response)
                console.log(response)
                // console.log("updated")
                // window.location.href = ("http://localhost/newsportal/single_page.php?id="+id)
                }
            });
            }
  </script>
</body>

</html>

<?php 
}
?>