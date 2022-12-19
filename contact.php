<?php

session_start();


include 'config/connection.php'


?>
<!DOCTYPE html>
<html>

<head>
  <?php

  $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
  $data_web = mysqli_fetch_array($query_web);

  ?>
  <title><?= $data_web['title'] ?> Contact</title>
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
</head>

<body>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
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
            <div class="contact_area">
              <h2>Contact Us</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <form action="action/message.php" method="POST" class="contact_form">
                <input class="form-control" name="nama" type="text" placeholder="Name*" required>
                <input class="form-control" name="email" type="email" placeholder="Email*" required>
                <textarea class="form-control" name="pesan" cols="30" rows="10" placeholder="Message*" required></textarea>
                <input type="submit" value="Send Message">
              </form>
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
?>