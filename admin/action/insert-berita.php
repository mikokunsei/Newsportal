<?php
include '../config/connection.php';

if (isset($_POST['judul'])) {

    $judul = $_POST['judul'];
    $kategori_berita = $_POST['kategori'];
    $gambar_nama = $_FILES['image']['name'];
    $gambar_size = $_FILES['image']['size'];
    $isi = htmlspecialchars(htmlentities($_POST['isi']));
    $media = $_POST['media'];
    $tag = $_POST['tag'];
    $tanggal_berita = $_POST['tanggal'];
    $sumber = $_POST['sumber'];
    $news = $_POST['news'];


    if ($gambar_size > 2097152) {
        echo '<script language="javascript" type="text/javascript">alert("Ukuran File lebih dari 2MB !");</script>';
        echo '<script>window.location.href = "../tambahberita"</script>';
    } else {
        $izin_ekstensi = array('png', 'jpg', 'jpeg');

        $pisah_ekstensi = explode('.', $gambar_nama);
        $ekstensi = strtolower(end($pisah_ekstensi));

        $file_temp = $_FILES['image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));

        $gambar_nama_baru = $tanggal . '-' . $gambar_nama;

        if (in_array($ekstensi, $izin_ekstensi)) {

            move_uploaded_file($file_temp, '../public/image/' . $gambar_nama_baru);

            if ($sumber != "") {

                $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, tag, c_datetime, link, media) VALUES ('$judul', '$kategori_berita', '$gambar_nama_baru', '$isi', '$media', '$tag', '$tanggal_berita', '$sumber', '$news') ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Berhasil menambahkan berita!");</script>';
                    echo '<script>window.location.href = "../berita"</script>';
                } else {
                    echo '<script language="javascript" type="text/javascript">alert("Gagal menambahkan berita!");</script>';
                    echo '<script>window.location.href = "../tambahberita"</script>';
                }
            } else {
                $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, tag, c_datetime, media) VALUES ('$judul', '$kategori_berita', '$gambar_nama_baru', '$isi', '$media', '$ta', '$tanggal_berita', '$news') ";
                $query = mysqli_query($conn, $sql);

                if ($query) {
                    echo '<script language="javascript" type="text/javascript">alert("Berhasil menambahkan berita!");</script>';
                    echo '<script>window.location.href = "../berita"</script>';
                } else {
                    echo '<script language="javascript" type="text/javascript">alert("Gagal menambahkan berita!");</script>';
                    echo '<script>window.location.href = "../tambahberita"</script>';
                }
            }
        } else {
            echo '<script language="javascript" type="text/javascript">alert("Ekstensi gambar tidak sesuai !");</script>';
            echo '<script>window.location.href = "../tambahberita"</script>';
        }
    }

    // $sql = "INSERT INTO news_content (title, c_canal, c_image, txt, media_name, link) VALUES ('$judul', '$kategori_berita', '$gambar', '$isi', '$media', '$sumber') ";
    // $query = mysqli_query($conn, $sql);

    // if ($query) {
    //     header("location:../dashboard");
    // } else {
    //     echo "Gagal menambahkan berita";
    // }

}
