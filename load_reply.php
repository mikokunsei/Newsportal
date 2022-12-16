<?php

include "config/connection.php";


if (isset($_POST["limit"], $_POST["start"], $_POST["comment_id"])) {


    $query = "SELECT * FROM tb_comments WHERE parent_id = '" . $_POST["comment_id"] . "' AND status = 'aktif' ORDER BY id ASC LIMIT " . $_POST["start"] . ", " . $_POST["limit"] . "";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
?>

        <div id="load_comment">
            <ul class="spost_nav">
                <li>
                    <div class="media">
                        <div class="media-content" >
                            <h4 style="color: #99CCFF;"><?= $row["nama"] ?>
                                <br>
                            </h4>
                            <p class="media  wow fadeInDown"><?= $row["komentar"] ?> [<?= $row["tgl"] ?>]</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>



<?php
    }
}
?>