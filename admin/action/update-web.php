<?php

include "../config/connection.php";

$title = $_POST['title'];
$logo_name = $_FILES['logo']['name'];
$icon_name = $_FILES['icon']['name'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$copyright = $_POST['copyright'];
$size_file = $_POST['size_file'];
$ekstensi = $_POST['ekstensi'];

$query_select = mysqli_query($conn, "SELECT * FROM web_settings WHERE id = 1");
$data_select = mysqli_fetch_array($query_select);


if ($icon_name != "" && $logo_name != "") {

    $file_temp_logo = $_FILES['logo']['tmp_name'];
    unlink("../public/image/logo/" . $data_select['logo']);

    $file_temp_icon = $_FILES['icon']['tmp_name'];
    unlink("../public/image/icon/" . $data_select['icon']);

    move_uploaded_file($file_temp_logo, '../public/image/logo/' . $logo_name);

    move_uploaded_file($file_temp_icon, '../public/image/icon/' . $icon_name);

    $query_update = mysqli_query($conn, "UPDATE web_settings SET title = '$title', logo = '$logo_name', icon = '$icon_name', alamat = '$alamat', email = '$email', no_telp = '$telp', copyright = '$copyright', size_file = '$size_file', ekstensi = '$ekstensi' ");

    if ($query_update) {
        echo '<script language="javascript" type="text/javascript">alert("Berhasil");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Gagal");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    }
} elseif ($logo_name != "") {

    $file_temp_logo = $_FILES['logo']['tmp_name'];
    unlink("../public/image/logo/" . $data_select['logo']);

    move_uploaded_file($file_temp_logo, '../public/image/logo/' . $logo_name);

    $query_update = mysqli_query($conn, "UPDATE web_settings SET title = '$title', logo = '$logo_name', alamat = '$alamat', email = '$email', no_telp = '$telp', copyright = '$copyright', size_file = '$size_file', ekstensi = '$ekstensi' ");

    if ($query_update) {
        echo '<script language="javascript" type="text/javascript">alert("Berhasil");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Gagal");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    }
} elseif ($icon_name != "") {

    $file_temp_icon = $_FILES['icon']['tmp_name'];
    unlink("../public/image/icon/" . $data_select['icon']);

    move_uploaded_file($file_temp_icon, '../public/image/icon/' . $icon_name);

    $query_update = mysqli_query($conn, "UPDATE web_settings SET title = '$title', icon = '$icon_name', alamat = '$alamat', email = '$email', no_telp = '$telp', copyright = '$copyright', size_file = '$size_file', ekstensi = '$ekstensi' ");

    if ($query_update) {
        echo '<script language="javascript" type="text/javascript">alert("Berhasil");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Gagal");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    }
} else {
    $query_update = mysqli_query($conn, "UPDATE web_settings SET title = '$title', alamat = '$alamat', email = '$email', no_telp = '$telp', copyright = '$copyright', size_file = '$size_file', ekstensi = '$ekstensi' ");

    // $query_insert = mysqli_query($conn, "INSERT INTO web_settings(title, logo, alamat, email, no_telp, copyright) VALUES ('$title', '$logo', '$alamat', '$email', '$telp', '$copyright') ");


    if ($query_update) {
        echo '<script language="javascript" type="text/javascript">alert("Berhasil");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    } else {
        echo '<script language="javascript" type="text/javascript">alert("Gagal");</script>';
        echo '<script>window.location.href = "../pengaturan"</script>';
    }
}
