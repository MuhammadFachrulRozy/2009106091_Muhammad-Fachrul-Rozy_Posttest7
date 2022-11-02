<?php
	include '../koneksi/connection.php';
	$id_menu = $_POST['id'];

	$rowMenu = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sepatu WHERE id_stok='$id_menu'"));

	$hargaBarang = $rowMenu['harga_sepatu'];

	echo json_encode(array('harga_sepatu' => $hargaBarang));
?>