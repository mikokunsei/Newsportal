<?php
if (isset($_GET['id'])) {
  $id_news = $_GET['id'];
} else {
  die("Error, No ID Selected !");
}

include "../config/connection.php";

$update_viewer = mysqli_query($conn, "UPDATE news_content SET jml_view = jml_view+1 WHERE id = '$id_news'")

?>


<!DOCTYPE html>
<html>

<head>
  <title>NewsFeed | Pages | Single Page</title>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>
  <!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->

  <input type="hidden" id="idberita" value="<?php echo $_GET['id']; ?>">
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
                          <a href="pages/single_page_date.php?date=<?= $data_date['data_date'] ?>"><?php echo $data_date['data_date'] ?></a>
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
            <li class="active"><a href="../index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
            <?php
            $get_cat_canal = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news'");
            while ($data_cat_canal = mysqli_fetch_array($get_cat_canal)) {

            ?>
              <li><a href="../pages/single_page_cat.php?c_canal=<?= $data_cat_canal['c_canal'] ?>"><?php echo $data_cat_canal['c_canal']; ?></a></li>

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
            <!-- <li><a href="pages/contact.php">Contact Us</a></li>
            <li><a href="pages/404.html">404 Page</a></li> -->
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
              $get_ticker = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 10");
              while ($data_ticker = mysqli_fetch_array($get_ticker)) {
                // print_r($data_ticker);
              ?>
                <li><a href="single_page.php?id=<?= $data_ticker['id'] ?>"><img src="<?php echo $data_ticker['c_image']; ?>" alt=""><?php echo $data_ticker['title']; ?></a></li>
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
              $get_content = mysqli_query($conn, "SELECT * FROM news_content WHERE id = '$id_news' ");
              while ($data_content = mysqli_fetch_array($get_content)) {
                $canal = $data_content['c_canal'];
              ?>
                <ol class="breadcrumb">
                  <li><a href="../index.php">Home</a></li>
                  <li class="active"><a href="single_page_cat.php?c_canal=<?= $data_content['c_canal'] ?>"><?php echo ucfirst($canal); ?></a></li>

                </ol>
                <h1><?php echo $data_content['title']; ?></h1>
                <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo $data_content['media_name']; ?></a>
                  <span>
                    <i class="fa fa-calendar"></i><?php echo $data_content['c_datetime']; ?>
                  </span>
                  <a href="single_page_cat.php?c_canal=<?= $data_content['c_canal'] ?>"><i class="fa fa-tags"></i><?php echo ucfirst($canal); ?></a>
                </div>
                <div class="single_page_content"> <img class="img-center" src="<?php echo $data_content['c_image']; ?>" alt="">
                  <p style="text-align: justify ;  text-indent: 45px;">
                    <?php

                    $data_paragraph = $data_content['txt'];
                    // $separate_paragraph = explode(".", $data_paragraph);
                    echo wordwrap($data_paragraph, 1125, "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n");
                    // echo explode('.', $data_paragraph); 

                    // var_dump($separate_paragraph);

                    // print_r(count($separate_paragraph));


                    // for ($i=3; $i<=count($separate_paragraph); $i++)
                    // {
                    //   echo empty( $separate_paragraph[$i]) ?'':'<p>'. $separate_paragraph[$i].'</p>';
                    // }

                    // menampilkan outputnya




                    ?>
                  </p>
                  <div class="source">
                    <div class="srcNews">
                      <h6>Sumber :</h6>
                      <a href="<?php echo $data_content['link']; ?>" target="_blank"><?php echo $data_content['link']; ?></a>
                    </div>
                  </div>
                  <br>

                  <?php

                  $data_tag = $data_content['tag'];

                  // echo $data_tag;

                  // var_dump($data_tag);
                  $explode_tag = explode(',', $data_tag);

                  // echo explode(',', $data_tag);
                  // print_r(count($data_tag));
                  // for ($i=0; $i<=count($data_tag); $i++)
                  // {
                  //   echo empty( $data_tag[$i]) ?'':'<p>'. $data_tag[$i].'</p>';
                  // }
                  // ---------------------------
                  for ($i = 0; $i < count($explode_tag); $i++) {

                    //  $part = str_replace($explode_tag[$i], "<p>".$explode_tag[$i]."</p>", $explode_tag[$i]);
                    echo "<a href='single_page_tag.php?tag=" . $explode_tag[$i] . "'class='btn btn-default'> " . $explode_tag[$i] . "</a> &nbsp;";
                  }

                  //
                  // for ($i=0; $i<=count($explode_tag)-1; $i++)
                  // {
                  //   $ternary = empty ($explode_tag[$i])?'':$explode_tag[$i];
                  //   //  $part = str_replace($explode_tag[$i], "<p>".$explode_tag[$i]."</p>", $explode_tag[$i]);
                  //    echo "<button class='btn default-btn'> ".$ternary."</button> &nbsp;";

                  // }
                  ?>



                  <!-- KOMENTAR -->
                  <div class="show-comment" style="margin-top: 20px ;">
                    <div class="panel panel-default ">
                      <div class="panel-heading">
                        <h3 class="panel-title">
                          <?php

                          $jml_komentar = mysqli_query($conn, "SELECT COUNT(news_id) AS jml_komentar, id FROM tb_comments WHERE news_id = '$id_news' AND status = 'aktif' ");
                          while ($data_jml = mysqli_fetch_assoc($jml_komentar)) {

                          ?>

                            <?php echo $data_jml['jml_komentar']; ?>
                            Komentar
                          <?php
                          }
                          ?>
                        </h3>
                      </div>
                      <div class="panel-body">

                        <div id="load_data"></div>
                        <div id="load_data_message"></div>
                      </div>
                    </div>
                  </div>

                  <div class="input-comment mt-5">
                    <div class="panel panel-danger" style=" color:#d083cf; ">
                      <div class="panel-heading">
                        <h3 class="panel-title">
                          Tinggalkan Komentar
                        </h3>
                      </div>
                      <div class="panel-body">
                        <form action="comment.php" method="POST">
                          <input type="hidden" name="news_id" value="<?php echo $data_content['id']; ?>">
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" id="" placeholder="Masukkan nama" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="email" id="" placeholder="Masukkan email" required>
                          </div>
                          <div class="form-group">
                            <textarea name="comment" class="form-control" id="" cols="30" rows="5" placeholder="Komentar"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="form-control" name="simpan" class="btn btn-danger" style="background-color: #d083cf; color: white ;" value="input">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div> -->


              <?php } ?>
              <div class="related_post">
                <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                <ul class="spost_nav wow fadeInDown animated">
                  <?php
                  $get_related = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND c_canal = 'news' ORDER BY rand() LIMIT 3 ");
                  while ($data_related = mysqli_fetch_array($get_related)) {
                  ?>
                    <li>
                      <div class="media"> <a class="media-left" href="single_page.php?id=<?= $data_related['id'] ?>"> <img src="<?php echo $data_related['c_image']; ?>" alt=""> </a>
                        <div class="media-body"> <a class="catg_title" href="single_page.php?id=<?= $data_related['id'] ?>"> <?php echo $data_related['title']; ?></a> </div>
                      </div>
                    </li>
                  <?php } ?>
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
                $get_popular = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'  ORDER BY jml_view DESC LIMIT 5 ");
                while ($data_popular = mysqli_fetch_array($get_popular)) {

                ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php?id=<?= $data_popular['id'] ?>" class="media-left"> <img alt="" src="<?php echo $data_popular['c_image']; ?>"> </a>
                      <div class="media-header">
                        <span style="font-size: 12px;"><?php echo substr($data_popular['c_datetime'], 0, 10); ?> | views : <?php echo $data_popular['jml_view']; ?></span>
                      </div>
                      <div class="media-body"> <a href="single_page.php?id=<?= $data_popular['id'] ?>" class="catg_title"> <?php echo $data_popular['title']; ?></a> </div>
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
                      <li class="cat-item"><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?php echo ucfirst($canal); ?></a></li>
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
              <a class="sideAdd" href="#"><img src="../images/bintang_sma.jpg" alt=""></a>
            </div>
            <!-- <div class="single_sidebar wow fadeInDown">
              <h2><span>Category Archive</span></h2>
              <select class="catgArchive">
                <option>Select Category</option>
                <option>Life styles</option>
                <option>Sports</option>
                <option>Technology</option>
                <option>Treads</option>
              </select>
            </div> -->
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
              <h2>Flickr Images</h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="footer_widget wow fadeInDown">
              <h2>Category</h2>
              <ul class="tag_nav">
                <?php
                $get_cat_bot = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news' ");
                while ($data_cat_bot = mysqli_fetch_array($get_cat_bot)) {
                  $canal = $data_cat_bot['c_canal'];
                ?>
                  <li><a href="single_page_cat.php?c_canal=<?= $data_cat_bot['c_canal'] ?>"><?php echo ucfirst($canal) ?></a></li>
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

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#btn_load_comment', function() {
      var last_id = $(this).data("id");
      $('#btn_load_comment').html("Loading...");
      $.ajax({
        url: "single_page.php",
        method: "POST",
        data: {
          last_id: last_id
        },
        dataType: "text",
        success: function(data) {
          $('#remove_comment').remove();
          $('#load_comment').append(data);
        }
      });
    });
  });
</script> -->


<!-- LOAD COMMENTS -->
<script>
  $(document).ready(function() {

    var limit = 2;
    var start = 0;
    var idberita = $('#idberita').val();
    var action = 'inactive';

    show_variable(limit, start, idberita);

    function load_country_data(limit, start, idberita) {
      $.ajax({
        url: "load_comment.php",
        method: "POST",
        data: {
          limit: limit,
          start: start,
          idberita: idberita
        },
        cache: false,
        success: function(data) {

          show_variable(limit, start, idberita);

          $('#load_data').append(data);
          if (data == '') {
            $('#load_data_message').html("<button type='button' class='btn disabled' style=' background-color: grey; color: white ; border-radius:10px; margin-left:40%;'>Tidak ada komentar</button>");
            action = 'active';
          } else {
            $('#load_data_message').html("<button type='button' class='btn' style=' background-color: #d083cf; color: white ; border-radius:10px; margin-left:45%;'>Load More</button>");
            action = "inactive";
          }
        }
      });
    }

    if (action == 'inactive') {
      action = 'active';
      load_country_data(limit, start, idberita);
    }

    $('#load_data_message').on('click', function() {

      if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
        action = 'active';
        start = start + limit;
        setTimeout(function() {
          load_country_data(limit, start, idberita);
        }, 500);
      }
    });


  });

  function show_variable(a, b, c) {

    console.log(a)
    console.log(b)
    console.log(c)

  }




  function reply_comment(id) {

    // console.log(id)
    // document.getElementById("test").innerHTML = id;
    $("#input_comment_" + id).show()
    // $("#load_comment_"+id).hide()

  }

  function cancel_comment(id) {

    $("#input_comment_" + id).hide()
  }

  function show_comment(id) {

    $("#input_comment_" + id).hide()
    $("#show_replies_" + id).hide()

    var limit = 2;
    var start = 0;
    var comment_id = id;
    var action = 'inactive';

    function load_country_data(limit, start, idberita) {
      $.ajax({
        url: "load_reply.php",
        method: "POST",
        data: {
          limit: limit,
          start: start,
          comment_id: comment_id
        },
        cache: false,
        success: function(data) {

          show_variable(limit, start, comment_id);

          $('#load_comment_' + id).append(data);
          if (data == '') {
            $('#load_data_comment_' + id).html("<button type='button' class='btn disabled' style=' background-color: grey; color: white ; border-radius:10px; margin-left:40%;'>Tidak ada komentar</button>");
            action = 'active';
          } else {
            $('#load_data_comment_' + id).html("<button type='button' class='btn' style=' background-color: #d083cf; color: white ; border-radius:10px; margin-left:45%;'>Load More</button>");
            action = "inactive";
          }

        }
      });
    }

    if (action == 'inactive') {
      action = 'active';
      load_country_data(limit, start, id);
    }

    $('#load_data_comment_' + id).on('click', function() {

      if ($(window).scrollTop() + $(window).height() > $("#load_comment" + id).height() && action == 'inactive') {
        action = 'active';
        start = start + limit;
        setTimeout(function() {
          load_country_data(limit, start, id);
        }, 500);
      }
    });

  }
</script>