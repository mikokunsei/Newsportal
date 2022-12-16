<?php

session_start();

if (isset($_SESSION['id']) || ($_GET['halaman'])) {
    $id = $_SESSION['id'];
} else {
    //   die("Error, Session does not exist !");
    // echo $id;
    echo '<script language="javascript" type="text/javascript">alert("You are not login !");</script>';
    echo '<script>window.location.href = "index.php"</script>';
}

include "config/connection.php";



// if (!isset($_SESSION['nama'])) {
//   header("location:404.php");
// } else {

?>


<!DOCTYPE html>
<html>

<head>
    <title>NewsFeed | Pages | By Category</title>
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
    <!-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> -->
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
                            <li><a href="single_page_cat.php?c_canal=<?= $data['c_canal'] ?>"><?= $data['c_canal']; ?></a></li>

                        <?php
                        }
                        ?>
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
                    </div>
                </div>
            </div>
        </section>

        <section id="contentSection">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="left_content">
                        <div class="single_page">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="profile.php">Profil</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php 

                $query_visitor = mysqli_query($conn, "SELECT * FROM tb_visitors WHERE id = '$id'");
                $data_visitor = mysqli_fetch_assoc($query_visitor);

                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="banner" style="margin-bottom:50px;">
                        <div class="card" style="background-color: grey; padding:30px; ">
                            <h2><?= $data_visitor['nama']; ?></h2>
                            <h4><?= $data_visitor['email']; ?></h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, sed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="left_content">
                        <div class="single_post_content">
                            <h2><span>Aktifitas Terkini</span></h2>
                        </div>
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
</body>

</html>

<?php
// }
?>