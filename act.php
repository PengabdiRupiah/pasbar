<?php
    session_start();
    require 'dbcon.php';

    $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $dokumen = isset($_POST['dokumen']) ? $_POST['dokumen'] : "";
    $kondisi = isset($_POST['kondisi']) ? $_POST['kondisi'] : "";
    $p2tl = isset($_POST['p2tl']) ? $_POST['p2tl'] : "";
    $tunggakan = isset($_POST['tunggakan']) ? $_POST['tunggakan'] : "";

    $query = "INSERT INTO survey_data (nama, alamat, dokumen, kondisi, p2tl, tunggakan) VALUES ('$nama', '$alamat', '$dokumen', '$kondisi', '$p2tl', '$tunggakan')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "success";
        header("Location: show.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Can Not Created";
        header("Location: show.php");
        exit(0);
    }

?>