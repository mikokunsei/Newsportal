<?php

session_start();


if (isset($_GET['id'])) {
  $id_news = $_GET['id'];
} else {
  die("Error, No ID Selected !");
}

include "config/connection.php";

// error_reporting(0);

// $update_viewer = mysqli_query($conn, "UPDATE news_content SET jml_view = jml_view+1 WHERE id = '$id_news'");
$query = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND id = '$id_news'");
$data = mysqli_fetch_array($query);

if ($id_news != $data['id']) {
  header("location:404.php");
} else {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <?php
    if ($data['id'] == $id_news) {
    ?>
      <title><?= $data['title']; ?></title>
    <?php
    } else {
    ?>
      <title>Not Found</title>
    <?php
    }
    ?>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- image content single page -->
    <style>
      .image {
        display: block;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }

      img {
        max-width: 300px;
        max-height: auto;
      }
    </style>

  </head>

  <body>
    <!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->

    <input type="hidden" id="idberita" value="<?= $_GET['id']; ?>">
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
              $get_cat_canal = mysqli_query($conn, "SELECT DISTINCT c_canal FROM news_content WHERE media = 'news'");
              while ($data_cat_canal = mysqli_fetch_array($get_cat_canal)) {

              ?>
                <li><a href="single_page_cat.php?c_canal=<?= $data_cat_canal['c_canal'] ?>"><?= $data_cat_canal['c_canal']; ?></a></li>

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
                $get_ticker = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'ORDER BY c_datetime DESC LIMIT 10");
                while ($data_ticker = mysqli_fetch_array($get_ticker)) {
                  // print_r($data_ticker);
                ?>
                  <li><a href="single_page.php?id=<?= $data_ticker['id'] ?>" onclick="updateViews('<?= $data_ticker['id'] ?>')"><img src="
                <?php
                  $link = substr($data_ticker['c_image'], 0, 4);
                  if ($link != 'http') {
                    echo 'admin/public/image/' . $data_ticker['c_image'];
                  } else {
                    echo $data_ticker['c_image'];
                  }
                ?>" alt=""><?= $data_ticker['title']; ?></a></li>
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
            <?php
            $query = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND id = '$id_news'");
            $data = mysqli_fetch_array($query);

            ?>
            <div class="left_content">
              <?php
              $get_content = mysqli_query($conn, "SELECT * FROM news_content WHERE id = '$id_news' ");
              while ($data_content = mysqli_fetch_array($get_content)) {
                $canal = $data_content['c_canal'];
              ?>
                <div class="single_page">
                  <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="single_page_cat.php?c_canal=<?= $data_content['c_canal'] ?>"><?= ucfirst($canal); ?></a></li>

                  </ol>
                  <h1><?= $data_content['title']; ?></h1>
                  <div class="post_commentbox"> <a href="single_page_media.php?media=<?= $data_content['media_name'] ?>"><i class="fa fa-user"></i><?= $data_content['media_name']; ?></a>
                    <span>
                      <i class="fa fa-calendar"></i>
                      <?php
                      $db_tahun = substr($data_content['c_datetime'], 0, 4);
                      $db_bulan = substr($data_content['c_datetime'], 5, 2);
                      $db_tanggal = substr($data_content['c_datetime'], 8, 2);
                      $db_jam = substr($data['c_datetime'], 11, 7);
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
                    </span>
                    <span>
                      <i class="fa fa-eye"></i>
                      <?php
                      echo $data_content['jml_view'] . " views";
                      ?>
                    </span>
                    <a href="single_page_cat.php?c_canal=<?= $data_content['c_canal'] ?>"><i class="fa fa-tags"></i><?= ucfirst($canal); ?></a>
                  </div>
                  <div class="single_page_content"> <img class="image" style="display:block; margin-left:auto; margin-right:auto; text-align:center" src="
                    <?php
                    $link = substr($data_content['c_image'], 0, 4);
                    if ($link != 'http') {
                      echo 'admin/public/image/' . $data_content['c_image'];
                    } else {
                      echo $data_content['c_image'];
                    }
                    ?>" alt="">

                    <div class="content" style="text-align: justify ;">
                      <?php
                      $txt_tag = substr($data_content['txt'], 0, 4);
                      if ($txt_tag != '&amp') {

                        echo '<p class="content" style="text-align: justify; text-indent: 45px;">' . htmlspecialchars_decode(html_entity_decode($data_content['txt'])) . '</p>';
                        // $data_paragraph = htmlspecialchars_decode($data_content['txt']);
                        // echo wordwrap($data_paragraph, 1125, "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n");

                      } else {
                        echo  htmlspecialchars_decode(html_entity_decode($data_content['txt']));
                      }
                      ?>

                    </div>
                    <div class="source">
                      <div class="srcNews">
                        <h6>Sumber :</h6>
                        <?php
                        if ($data_content['link'] != null) {
                        ?>
                          <a href="<?= $data_content['link']; ?>" target="_blank"><?= $data_content['link']; ?></a>

                        <?php } else {
                        ?>
                          <p>Tidak Tersedia</p>
                        <?php
                        }
                        ?>

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

                      if ($data_tag != null) {
                        //  $part = str_replace($explode_tag[$i], "<p>".$explode_tag[$i]."</p>", $explode_tag[$i]);
                        echo "<a href='single_page_tag.php?tag=" . $explode_tag[$i] . "'class='btn btn-default'> " . $explode_tag[$i] . "</a> &nbsp;";
                      } else {
                        echo "";
                      }
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
                      <div class="panel" style="border-color: #99CCFF ;">
                        <div class="panel-heading" style="background-color: #99CCFF ;">
                          <h3 class="panel-title" style="color: grey;">
                            <?php

                            $jml_komentar = mysqli_query($conn, "SELECT COUNT(news_id) AS jml_komentar, id FROM tb_comments WHERE news_id = '$id_news' AND status = 'aktif' ");
                            while ($data_jml = mysqli_fetch_assoc($jml_komentar)) {

                            ?>

                              <?= $data_jml['jml_komentar']; ?>
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
                      <div class="panel" style="border-color: #99CCFF ;">
                        <?php
                        if (!isset($_SESSION['nama'])) {
                        ?>
                          <div class="panel-heading" style="background-color: #99CCFF ;">
                            <h3 class="panel-title" style="color: grey; display:flex; justify-content:center;">
                              Silahkan Masuk untuk Mengirim Komentar
                            </h3>
                            <a href="login.php" class="form-control" style="background-color:#fff ;color: grey; display:flex; justify-content:center;">Masuk</a>
                          </div>
                        <?php
                        } else {
                        ?>
                          <div class="panel-heading" style="background-color: #99CCFF ;">
                            <h3 class="panel-title" style="color: grey;">
                              Tinggalkan Komentar
                            </h3>
                          </div>
                          <div class="panel-body">
                            <?php
                            $id_visitor = $_SESSION['id'];

                            $query_visitor = mysqli_query($conn, "SELECT * FROM tb_visitors WHERE  id = '$id_visitor' ");
                            $data_visitor = mysqli_fetch_assoc($query_visitor);

                            ?>
                            <form action="action/comment.php" method="POST">
                              <input type="hidden" name="news_id" value="<?= $data_content['id']; ?>">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id="" value="<?= $data_visitor['id'] ?>" readonly required>
                                <input type="hidden" class="form-control" name="name" id="" value="<?= $data_visitor['nama'] ?>" readonly required>
                              </div>
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="email" id="" value="<?= $data_visitor['email'] ?>" readonly required>
                              </div>
                              <div class="form-group">
                                <textarea name="comment" class="form-control" id="" cols="30" rows="5" placeholder="Komentar sebagai <?= $data_visitor['nama'] ?> "></textarea>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="form-control" name="simpan" class="btn btn-danger" style="background-color: #99CCFF; color: grey;" value="input">Kirim</button>
                              </div>
                            </form>
                          </div>
                        <?php } ?>
                      </div>
                    </div>

                  </div>


                  <div class="related_post">
                    <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                      <?php


                      $data_tag = $data_content['tag'];
                      // $explode_tag = explode(',', $data_tag);

                      $comma = "/,/i";
                      $replace =  preg_replace($comma, "%' OR '%", $data_tag);
                      $final_string =   "%" . $replace . "%";

                      // echo $final_string;

                      for ($i = 0; $i < count($explode_tag); $i++) {

                        //  $part = str_replace($explode_tag[$i], "<p>".$explode_tag[$i]." OR </p>", $explode_tag[$i]);
                        $get_related = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news' AND tag LIKE '$final_string' ORDER BY rand() LIMIT 3 ");
                      }

                      while ($data_related = mysqli_fetch_array($get_related)) {
                      ?>
                        <li>
                          <div class="media"> <a class="media-left" href="single_page.php?id=<?= $data_related['id'] ?>" onclick="updateViews('<?= $data_related['id'] ?>')"> <img src="
                        <?php
                        $link = substr($data_related['c_image'], 0, 4);
                        if ($link != 'http') {
                          echo 'admin/public/image/' . $data_related['c_image'];
                        } else {
                          echo $data_related['c_image'];
                        }
                        ?>" alt=""> </a>
                            <div class="media-body"> <a class="catg_title" href="single_page.php?id=<?= $data_related['id'] ?>" onclick="updateViews('<?= $data_related['id'] ?>')"> <?= $data_related['title']; ?></a> </div>
                          </div>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              <?php } ?>
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
                    <li><a href="single_page_cat.php?c_canal=<?= $data_cat_bot['c_canal'] ?>"><?= ucfirst($canal) ?></a></li>
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
          <?php
          include "config/connection.php";

          $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
          $data_web = mysqli_fetch_array($query_web);

          ?>
          <p class="copyright">Copyright &copy; 2045 <a href="index.php"><?= $data_web['copyright'] ?></a></p>
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
      //----------------LOAD KOMENTAR-----------------
      $(document).ready(function() {

        var limit = 2;
        var start = 0;
        var idberita = $('#idberita').val();
        var action = 'inactive';

        // show_variable(limit, start, idberita);

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

              //   show_variable(limit, start, idberita);

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

      //   function show_variable(a, b, c) {

      //     console.log(a)
      //     console.log(b)
      //     console.log(c)

      //   }


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

              //   show_variable(limit, start, comment_id);

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