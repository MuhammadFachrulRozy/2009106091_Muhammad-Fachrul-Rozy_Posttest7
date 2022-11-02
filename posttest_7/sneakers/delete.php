<?php
    include "../koneksi/connection.php";

    $idMenu = $_GET['id'];

    $tableGambar = mysqli_query($connect, "SELECT * FROM images WHERE id_sepatu='$idMenu'");
    $rowGambar = mysqli_fetch_array($tableGambar);
    $idGambar = $rowGambar['id'];
    $fileLama = $rowGambar['file'];
    unlink('../img/'.$fileLama);
    $query = mysqli_query($connect, "DELETE images FROM images INNER JOIN sepatu ON sepatu.id_sepatu = images.id_sepatu WHERE sepatu.id_sepatu='$idMenu'");
    $query1 = mysqli_query($connect, "DELETE FROM sepatu WHERE id_sepatu='$idMenu'");
        
        if($query && $query1){
            echo"Data Berhasil di Delete";
            header("location:view.php");
        } else {
            echo"Data Gagal di Delete";
            header("location:view.php");
        }
?>