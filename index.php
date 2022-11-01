<?php

  include 'config/connection.php'


?>


<!DOCTYPE html>
<html>
<head>
<title>NewsFeed</title>
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
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo date('l, d M Y'); ?></p>
          </div>
        </div>
        <div class="logo_other" style="margin-top: 70px ; margin-bottom: 20px ; ">
            <center>
            <ul class="other-portal-v2">
                <li >
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
          </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/purple_panorama.jpg" style="width: 745 px;" alt=""></a></div>
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
          <li><a href="pages/single_page_cat.php?c_canal=<?=$data['c_canal']?>"><?php echo $data['c_canal']; ?></a></li>
          
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
          <li><a href="pages/contact.php">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li>
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
            while ($data = mysqli_fetch_array($get_data)){
              // print_r($data);
          ?>
            <li><a href="pages/single_page.php?id=<?=$data['id']?>"><img src="<?php echo $data['c_image']; ?>" alt=""><?php echo $data['title']; ?></a></li>
          <?php
            }
          ?>
          </ul>
          <div class="social_area">
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
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <?php
            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 4");
            while ($data = mysqli_fetch_array($get_data)){
              // print_r($data);
              $date_news = $data['c_datetime'];
          ?>
          <div class="single_iteam"> <a href="pages/single_page.php?id=<?=$data['id']?>"> <img src="<?php echo $data['c_image']; ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a></h2>
              <p class="text-paragraph">
                <?php echo $data['txt']; ?>
              </p>
              <p><?php echo $date_news; ?></p>
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
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <?php
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' ORDER BY rand()  LIMIT 5");
                while ($data = mysqli_fetch_array($get_data)){
                  // print_r($data);
              ?>
              <li>
                <div class="media"> 
                  <a href="pages/single_page.php?id=<?=$data['id']?>" class="media-left"> 
                    <img alt="" src="<?php echo $data['c_image']; ?>"> 
                  </a>
                  <div class="media-body"> 
                    <a href="pages/single_page.php?id=<?=$data['id']?>" class="catg_title"> 
                      <?php echo $data['title']; ?>
                    </a> 
                  </div>
                </div>
              </li>
              <?php 
                }
              ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
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
                $get_data = mysqli_query($conn,"SELECT c_image, title, txt, id FROM news_content WHERE media = 'news' AND c_canal = 'news' ORDER BY rand() LIMIT 1");
                while ($data = mysqli_fetch_array($get_data)){
              ?>
              <ul class="news_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="featured_img"> <img alt="" src="<?php echo $data['c_image']; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a> </figcaption>
                    <p class="text-paragraph">
                      <?php echo $data ['txt']; ?> 
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
                  $get_data = mysqli_query($conn,"SELECT id, c_image, title FROM news_content WHERE media = 'news' AND c_canal = 'news' ORDER BY rand() LIMIT 4");
                  while ($data = mysqli_fetch_array($get_data)){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                    <div class="media-body"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="catg_title"> <?php echo $data['title']; ?> </a> </div>
                  </div>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Hukum</span></h2>
                <ul class="news_catgnav wow fadeInDown">
                  <?php
                    $get_data = mysqli_query($conn, "SELECT id, c_image, title, txt FROM news_content WHERE media = 'news' AND c_canal = 'hukum' ORDER BY rand() LIMIT 1");
                    while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                  <li>
                    <figure class="bsbig_fig"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="featured_img"> <img alt="" src="<?php echo $data['c_image']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="pages/single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a> </figcaption>
                      <p class="text-paragraph">
                        <?php echo $data['txt']; ?>
                      </p>
                    </figure>
                  </li>
                  <?php 
                    }
                  ?>
                </ul>
                <ul class="spost_nav">
                  <?php
                    $get_data = mysqli_query($conn, "SELECT id, c_image, title FROM news_content WHERE media = 'news' AND c_canal = 'hukum' ORDER BY rand() LIMIT 4");
                    while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                      <div class="media-body"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="catg_title"><?php echo $data['title']; ?></a> </div>
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
                    $get_data = mysqli_query($conn, "SELECT id, c_image, title, txt FROM news_content WHERE media = 'news' AND c_canal = 'politik' ORDER BY rand() LIMIT 1");
                    while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="featured_img"> <img alt="" src="<?php echo $data['c_image']; ?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="pages/single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a> </figcaption>
                      <p class="text-paragraph">
                        <?php echo $data['txt']; ?>
                      </p>
                    </figure>
                  </li>
                  <?php 
                    }
                  ?>
                </ul>
                <ul class="spost_nav">
                  <?php
                    $get_data = mysqli_query($conn, "SELECT id, c_image, title, txt FROM news_content WHERE media = 'news' AND c_canal = 'politik' ORDER BY rand() LIMIT 4");
                    while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                      <div class="media-body"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="catg_title"><?php echo $data['title']; ?></a> </div>
                    </div>
                  </li>
                  <?php 
                    } 
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <?php 
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'top-news' LIMIT 4");
                while ($data = mysqli_fetch_array($get_data)) {
              ?>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                  <div class="media-body"> <a href="pages/single_page.php?id=<?=$data['id']?>" class="catg_title"><?php echo $data['title']; ?></a> </div>
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
                      while ($data = mysqli_fetch_array($get_data)){
                        $canal = $data['c_canal'];
                  ?>
                  <li class="cat-item"><a href="pages/single_page_cat.php?c_canal=<?=$data['c_canal']?>"><?php echo ucfirst($canal); ?></a></li>
                  <?php 
                    }
                  ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="https://www.youtube.com/embed/_Kyq0T3qe4w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <a class="sideAdd" href="#"><img src="images/bintang_sma.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <?php 
                $get_data = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news' ");
                while ($data = mysqli_fetch_array($get_data)){
                $canal = $data['c_canal'];
              ?>
              <option><?php echo ucfirst($canal) ?></option>
              <?php 
                }
              ?>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
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
                  while ($data = mysqli_fetch_array($get_data)){
                    $canal = $data['c_canal'];
              ?>
              <li><a href="pages/single_page_cat.php?c_canal=<?=$data['c_canal']?>"><?php echo ucfirst($canal) ?></a></li>
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
<script> 

</script>
</body>
</html>