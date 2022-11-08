<?php 

include "../config/connection.php";


if(isset($_POST["limit"], $_POST["start"], $_POST["idberita"])){


 $query = "SELECT * FROM tb_comments WHERE news_id = '".$_POST["idberita"]."' AND status = 'aktif'  ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result)){
  echo '
  <ul class="spost_nav">
    <li>
    <div class="media">
    <div class="media-body">
    <h4>'.$row["nama"].'
    <br>
    </h4>
    </li>
    <p class="media  wow fadeInDown">'.$row["komentar"].' ['.$row["tgl"].']</p> 
    </div>
    <div>
    <button type="button" class="btn btn-primary" style="background-color:grey; width: 80px; border-radius:10px;">Reply</button>
    </div>
    <hr/>
    </li>
    </ul>
  ';
 }
}
?>
