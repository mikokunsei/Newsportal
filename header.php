<?php 
include "config/connection.php";
?>
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
                                <input type="search" name="search" class="form-control-sm-3" style="margin:10px ; padding:5px;" placeholder="Cari Berita...">
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="option" style="display: inline-block; margin-top: 10px; border-right: 1px solid #333;color: #fff;font-size: 11px;font-weight: bold;text-transform: uppercase;">
                                <div class="row">
                                    <?php


                                    if (!isset($_SESSION['nama'])) {
                                    ?>
                                        <a href="login.php" style="color: #fff;">Masuk</a> | <a href="register.php" style="color: #fff;">Daftar</a>
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
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom">
                <?php
                include "config/connection.php";

                $query_web = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
                $data_web = mysqli_fetch_array($query_web);

                ?>
                <div class="logo_area"><a href="index.php" class="logo"><img src="admin/public/image/logo/<?= $data_web['logo'] ?>" alt=""></a></div>
                <!-- <div class="add_banner"><a href="#"><img src="images/purple_panorama.jpg" style="width: 745 px;" alt=""></a></div> -->
            </div>
        </div>
    </div>
</header>