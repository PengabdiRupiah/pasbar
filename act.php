<?php
    session_start();
    require 'dbcon.php';

    $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
    $dokumen = isset($_POST['dokumen']) ? $_POST['dokumen'] : "";
    $kondisi = isset($_POST['kondisi']) ? $_POST['kondisi'] : "";
    $p2tl = isset($_POST['p2tl']) ? $_POST['p2tl'] : "";
    $tunggakan = isset($_POST['tunggakan']) ? $_POST['tunggakan'] : "";

    $queryCheck = "SELECT * FROM survey_data WHERE nama = '$nama' AND alamat = '$alamat'";
    $resultCheck = mysqli_query($conn, $queryCheck);
    
    if (mysqli_num_rows($resultCheck) > 0) {
        // Data sudah ada dalam database, berikan respon atau tangani sesuai kebutuhan
        $_SESSION['message'] = "Data sudah ada";
        header("Location: show.php");
        exit(0);
    } else {
        // Data belum ada dalam database, lakukan INSERT
        $queryInsert = "INSERT INTO survey_data (nama, alamat, dokumen, kondisi, p2tl, tunggakan) VALUES ('$nama', '$alamat', '$dokumen', '$kondisi', '$p2tl', '$tunggakan')";
    
        if (mysqli_query($conn, $queryInsert)) {
            $_SESSION['message'] = "success";
            header("Location: show.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Can Not Created";
            header("Location: show.php");
            exit(0);
        }
    }
    

?>