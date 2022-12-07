<?php

include '../config/connection.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tb_messages WHERE id = '$id' ";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
    } else {
        echo "<script>window.location.href = '../admin/alert'</script>";
    }
}

$user = $_SESSION['username'];

if ($_GET['id'] == $data['id'] ) {
    $update_notif = mysqli_query($conn, "UPDATE tb_messages SET notif = 0, read_by = '$user' WHERE id = '$id' ");
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="pesan">Pesan</a></li>
                            <li class="breadcrumb-item active">Detail Pesan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Detail Pesan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="show-message">
                                        <div class="card" style="padding: 50px ;">
                                            <div class="card-content">
                                                <label for="id" class="col-sm-2">
                                                    ID
                                                </label>
                                                <span><?php echo " : ". $data['id'] ?></span>
                                            </div>
                                            <div class="card-content">
                                                <label for="nama" class="col-sm-2">
                                                    Nama
                                                </label>
                                                <span><?php echo " : ". $data['nama'] ?></span>
                                            </div>
                                            <div class="card-content">
                                                <label for="email" class="col-sm-2">
                                                    Email
                                                </label>
                                                <span><?php echo " : ". $data['email'] ?></span>
                                            </div>
                                            <div class="card-content">
                                                <label for="pesan" class="col-sm-2">
                                                    Pesan
                                                </label>
                                                <span><?php echo " : ". $data['pesan'] ?></span>
                                            </div>
                                            <div class="card-content">
                                                <label for="tgl" class="col-sm-2">
                                                    Tanggal
                                                </label>
                                                <span><?php echo " : ". $data['tgl'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
 } else {
    echo "<script>window.location.href = '../admin/alert'</script>";
 }

?>
