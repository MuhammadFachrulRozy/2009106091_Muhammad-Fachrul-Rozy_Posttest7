<?php 
    include "../utama.php";


    $idMenu = $_GET['id'];

    if(isset($_POST['update'])){
        $namaMenu = $_POST['nama_sepatu'];
        $hargaMenu = $_POST['harga_sepatu'];
        $stok = $_POST['stok'];
        $tableGambar = mysqli_query($connect, "SELECT * FROM images WHERE id_sepatu='$idMenu'");
        $rowGambar = mysqli_fetch_array($tableGambar);
        $fileLama = $rowGambar['file'];
        unlink('../img/'.$fileLama);
        
        $query = mysqli_query($connect, "UPDATE sepatu SET nama_sepatu='$namaMenu', harga_sepatu='$hargaMenu', stok='$stok' WHERE id_sepatu='$idMenu'");
        if(!empty($_FILES['gambar']['name'])){
            $query = mysqli_query($connect,"SELECT * FROM sepatu WHERE nama_sepatu='$namaMenu'");
            $result = mysqli_fetch_assoc($query);
            $id = $result['id_sepatu'];
            $nama = $_POST['nama_gambar'];
            $waktu = $_POST['waktu'];
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.',$gambar);
            $ekstensi = strtolower(end($x));
            $gambar_baru = "$nama.$ekstensi";
            $tmp = $_FILES['gambar']['tmp_name'];
            if(move_uploaded_file($tmp,"../img/$gambar_baru")){
                $query1 = mysqli_query($connect, "UPDATE images SET id_sepatu='$id', nama_gambar='$nama', upload_on='$waktu', file='$gambar_baru' WHERE id_sepatu='$idMenu'");
                
                if($query && $query1){
                    echo"Data Berhasil di Update";
                    header("location:view.php");
                } else {
                    echo"Data Gagal di Update";
                }
            }
        }
    }
    
    $tableBarang = mysqli_query($connect, "SELECT * FROM sepatu WHERE id_sepatu='$idMenu'");
    $rowBarang = mysqli_fetch_array($tableBarang);
    $tableGambar = mysqli_query($connect, "SELECT * FROM images WHERE id_sepatu='$idMenu'");
    $rowGambar = mysqli_fetch_array($tableGambar);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Update </title>
    <style>
 	* {
		margin: 0;
		padding: 0;
	}
		table th {
			 text-align: center;
    		background-color: #CF0A0A;
    		color: black;
		}
		table {
    		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    		border-collapse: collapse;
    		width: 80%;
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto;
        border: 2px solid black;
}
		table td, table th {
    		border: 1px solid black;
    		padding: 6px;
    		width: 100px;
}
table tr td a {
  color: white;
}

	table tr:nth-child(even){background-color: #CF0A0A; color: white;}
    table tr:nth-child(odd){background-color: #CF0A0A; color: white;}
	table tr:hover,table tr:hover a{background-color: white; color: black;
}
	</style>   
</head>
<body class=body>
<section class="center">
        <form action="" method="POST" enctype="multipart/form-data" class="box">
        <h3 align="center">Barang di Ubah</h3>
            <table border="0" align="center">
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_sepatu" placeholder="Masukkan Nama Sepatu" value="<?= $rowBarang['nama_sepatu'] ?>"required></td>
                </tr>
                <tr>
                    <td>Harga Barang</td>
                    <td><input type="number" name="harga_sepatu" placeholder="Masukkan Harga Sepatu" value="<?= $rowBarang['harga_sepatu'] ?>"required></td>
                </tr>

                <tr>
                    <td>Stock Barang</td>
                    <td><input type="number" name="stok" placeholder="Masukkan Stock Sepatu" value="<?= $rowBarang['stok'] ?>"required></td>
                </tr>
                <tr>
                    <td>Nama Gambar</td>
                    <td><input type="text" name="nama_gambar" placeholder="Masukkan Nama Gambar" value="<?= $rowGambar['nama_gambar'] ?>"required></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><input type="file" name="gambar" value="<?=$rowGambar['file']?>"required></td>
                    <input type="datetime"  value="<?php echo date("Y-m-d\TH:i:s"); ?>" hidden name="waktu">
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>