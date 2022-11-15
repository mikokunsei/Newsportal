<?php

include "../config/connection.php";


if (isset($_POST["limit"], $_POST["start"], $_POST["idberita"])) {


  $query = "SELECT * FROM tb_comments WHERE news_id = '" . $_POST["idberita"] . "' AND status = 'aktif' AND parent_id = 0 ORDER BY id DESC LIMIT " . $_POST["start"] . ", " . $_POST["limit"] . "";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
?>

    <ul class="spost_nav">
      <li>
        <div class="media">
          <div class="media-content">
            <h4><?php echo $row["nama"] ?>
              <br>
            </h4>
            <p class="media  wow fadeInDown"><?php echo $row["komentar"] ?> [<?php echo $row["tgl"] ?>]</p>
          </div>
          <div class="media-action">
            <p id="test"></p>
            <div class="row btn-media">
              <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 ">
                <button type="button" class="form-control" onclick="reply_comment(<?php echo $row['id'] ?>)" style=" background-color: #d083cf; color: white ; border-radius:10px;">Reply</button>
              </div>
              <div class="col-sm-5 col-md-4 col-lg-3 col-xl-3 ">
                <?php

                $id = $row['id'];

                $query_jml = "SELECT COUNT(parent_id) as jml_reply FROM tb_comments WHERE parent_id = $id  ";
                $result_jml = mysqli_query($conn, $query_jml);
                $row_jml = mysqli_fetch_array($result_jml);

                if ($row_jml['jml_reply'] != 0) { ?>
                  <button type="button" class="form-control" id="show_replies_<?php echo $row['id'] ?>" onclick="show_comment(<?php echo $row['id'] ?>)" class="btn btn-primary" style=" border-radius:10px;">Show Replies
                    <?php echo $row_jml['jml_reply']; ?>
                  </button>
                <?php } ?>
              </div>

            </div>



          </div>
          <hr />
        </div>
        <div id="input_comment_<?php echo $row['id'] ?>" style="display:none;">
          <form action="comment.php" method="POST">
            <input type="hidden" class="form-control" name="news_id" value="<?php echo $row['news_id']; ?>">
            <input type="hidden" class="form-control" name="comment_id" value="<?php echo $row['id'] ?>" id="comment_id">
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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <button type="submit" class="form-control" name="simpan" class="btn btn-danger" style="background-color: #d083cf; color: white ; border-radius:10px;" value="input">Kirim</button>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <button type="button" class="form-control" name="batal" onclick="cancel_comment(<?php echo $row['id'] ?>)" class="btn btn-danger" style=" border-radius:10px;">Batal</button>
              </div>
            </div>
          </form>
        </div>
        <div id="load_comment_<?php echo $row['id'] ?>"></div>
        <div id="load_data_comment_<?php echo $row['id'] ?>"></div>
      </li>
    </ul>

<?php
  }
}
?>