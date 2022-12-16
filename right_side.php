<aside class="right_content">
    <div class="single_sidebar">
        <h2><span>Popular Post</span></h2>
        <ul class="spost_nav">
            <?php
            $get_popular = mysqli_query($conn, "SELECT * FROM news_content WHERE media = 'news'  ORDER BY jml_view DESC LIMIT 5 ");
            while ($data_popular = mysqli_fetch_array($get_popular)) {

            ?>
                <li>
                    <div class="media wow fadeInDown"> <a href="single_page.php?id=<?= $data_popular['id'] ?>" onclick="updateViews('<?= $data_popular['id'] ?>')" class="media-left"> <img alt="" src="
                    <?php
                    $link = substr($data_popular['c_image'], 0, 4);
                    if ($link != 'http') {
                        echo 'admin/public/image/' . $data_popular['c_image'];
                    } else {
                        echo $data_popular['c_image'];
                    }
                    ?>"> </a>
                        <div class="media-header">
                            <span style="font-size: 13px;"><?= '<b>' . $data_popular['media_name'] . '</b>' ?> |
                                <?php
                                $db_tahun = substr($data_popular['c_datetime'], 0, 4);
                                $db_bulan = substr($data_popular['c_datetime'], 5, 2);
                                $db_tanggal = substr($data_popular['c_datetime'], 8, 2);
                                $db_jam = substr($data_popular['c_datetime'], 12, 8);
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
                                echo "$db_tanggal " . substr($db_bulan, 0, 3) . " $db_tahun"; ?> | views : <?= $data_popular['jml_view']; ?></span>
                        </div>
                        <div class="media-body"> <a href="single_page.php?id=<?= $data_popular['id'] ?>" id="updateViews" onclick="updateViews('<?= $data_popular['id'] ?>')" class="catg_title"><?= $data_popular['title']; ?></a> </div>
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
                            <!-- <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
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
                <li class="cat-item"><a href="https://<?= parse_url($data['link'], PHP_URL_HOST); ?>" target="_blank" style="max-width: 105px ; max: height 50px; height: 50px;">
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