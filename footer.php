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
                    <p>
                        <b>Email : </b> <?= $data_web['email'] ?>
                    </p>
                    <p>
                        <b>Telp : </b> <?= $data_web['no_telp'] ?>
                    </p>
                    <address>
                        <b>Alamat : </b>
                        <?= $data_web['alamat'] ?>
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