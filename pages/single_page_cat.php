<?php 
  if(isset($_GET['c_canal'])){
    $cat_news = $_GET['c_canal'];
  
  } else {
    die("Error, No Canal Selected !");
  }

  include "../config/connection.php";
  

  
?>


<!DOCTYPE html>
<html>
<head>
<title>NewsFeed | Pages | By Category</title>
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
              <li><a href="#">About</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo date('l, d M Y'); ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="../index.php" class="logo"><img src="../images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="../images/purple_panorama.jpg" style="width: 745 px;" alt=""></a></div>
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
          <li><a href="single_page_cat.php?c_canal=<?=$data['c_canal']?>"><?php echo $data['c_canal']; ?></a></li>
          
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
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="404.html">404 Page</a></li>
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
            while ($data = mysqli_fetch_array($get_data)){
              // print_r($data);
          ?>
            <li><a href="single_page.php?id=<?=$data['id']?>"><img src="<?php echo $data['c_image']; ?>" alt=""><?php echo $data['title']; ?></a></li>
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
      <div class="col-lg-8 col-mdf-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <?php 
              $get_data = mysqli_query($conn, "SELECT c_canal FROM news_content WHERE c_canal = '$cat_news' ");
              $data = mysqli_fetch_array($get_data);
            ?>
            <ol class="breadcrumb">
              <li><a href="../index.php">Home</a></li>
              <li class="active"><a href="single_page_cat.php?c_canal=<?=$data['c_canal']?>"><?php echo ucfirst($data['c_canal']); ?></a></li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <?php
            $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY c_datetime DESC LIMIT 4");
            while ($data = mysqli_fetch_array($get_data)){
              // print_r($data);
              $date_news = $data['c_datetime'];
          ?>
          <div class="single_iteam"> <a href="single_page.php?id=<?=$data['id']?>"> <img src="<?php echo $data['c_image']; ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a></h2>
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
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            
            <h2><span><?php echo $cat_news ?></span></h2>
            
            <div class="single_post_content_left">
              <ul class="news_catgnav  wow fadeInDown">
              <?php
                $get_data = mysqli_query($conn,"SELECT * FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY rand() LIMIT 3");
                while ($data = mysqli_fetch_array($get_data)){
              ?>
                <li>
                  <figure class="bsbig_fig"> <a href="single_page.php?id=<?=$data['id']?>" class="featured_img"> <img alt="" src="<?php echo $data['c_image']; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="single_page.php?id=<?=$data['id']?>"><?php echo $data['title']; ?></a> </figcaption>
                    <p class="text-paragraph">
                      <?php echo $data ['txt']; ?> 
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
                  $get_data = mysqli_query($conn,"SELECT id, c_image, title FROM news_content WHERE media = 'news' AND c_canal = '$cat_news' ORDER BY rand() LIMIT 12");
                  while ($data = mysqli_fetch_array($get_data)){
                ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                    <div class="media-body"> <a href="single_page.php?id=<?=$data['id']?>" class="catg_title"> <?php echo $data['title']; ?> </a> </div>
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
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <?php 
                $get_data = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' ORDER BY rand() LIMIT 5 ");
                while ($data = mysqli_fetch_array($get_data)){
                  
              ?>
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.php?id=<?=$data['id']?>" class="media-left"> <img alt="" src="<?php echo $data['c_image']; ?>"> </a>
                  <div class="media-body"> <a href="single_page.php?id=<?=$data['id']?>" class="catg_title"> <?php echo $data['title']; ?></a> </div>
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
                  <li class="cat-item"><a href="single_page_cat.php?c_canal=<?=$canal?>"><?php echo ucfirst($canal); ?></a></li>
                  <?php 
                    }
                  ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="../images/bintang_sma.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
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
            <h2>Flicker Images</h2>
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
              <li><a href="single_page_cat.php?c_canal=<?=$canal?>"><?php echo ucfirst($canal) ?></a></li>
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