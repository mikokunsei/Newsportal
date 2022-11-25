<?php 

include '../config/connection.php';


$tgl = date("Y-m-d h:i:s");
$sql = "INSERT INTO tb_messages (nama, email, pesan, tgl) 
        VALUES (
            '$_POST[nama]',
            '$_POST[email]',
            '$_POST[pesan]',
            '$tgl'
        )";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo '<script language="javascript" type="text/javascript">alert("Berhasil Mengirim Pesan !");</script>';
    echo '<script>window.location.href = "http://localhost/newsportal/pages/contact.php"</script>';
} else {
    echo 'failed';
}

?>
