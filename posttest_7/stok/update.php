<?php
    include "../utama.php";
 
    $idpasok = $_GET['id'];

    if(isset($_POST['update'])){
        $idMenu = $_POST['id_sepatu'];
        $tanggal_masuk = $_POST['tanggal_masuk'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];

        $query = mysqli_query($connect, "UPDATE stok SET id_sepatu='$idMenu', tanggal_masuk='$tanggal_masuk', jumlah='$jumlah', total='$total' WHERE id_stok='$idpasok'");
        if($query){
            echo"Jenis Berhasil di Update";
            header("location:view.php");
        } else {
            echo"Eror Gagal ";
        }
    }
    $tablepasok = mysqli_query($connect, "SELECT * FROM stok WHERE id_stok='$idpasok'");
    $rowpasok = mysqli_fetch_array($tablepasok);
    $idMenu1      = $rowpasok['id_sepatu'];
    $tableMenu   =mysqli_query($connect, "SELECT * FROM sepatu WHERE id_sepatu='$idMenu1'");
    $rowMenu    =mysqli_fetch_array($tableMenu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../connector/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.id_sepatu').change(function(){
                var id_menu = $(this).val();

                $.ajax({
                    url         : 'get_sepatu.php',
                    type        : 'POST',
                    dataType    : 'json',
                    data        : {id : id_laptop}
                })
                .done(function(result){
                    $('.harga_sepatu').val(result.harga_laptop);
                    console.log(result);
                    console.log("success");
                })
                .fail(function(result){
                    console.log(result);
                    console.log("fail");
                });
            });

            $('.jumlah').on("input propertychange", function(){
                var jumlah = $('.jumlah').val();
                var harga_sepatu = $('.harga_sepatu').val();

                $('.total').val(+(jumlah) * +(harga_sepatu));
            });
        });
    </script>
    <title>Update Stok</title>
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
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: white;
  text-align: center;
  font-size: 12px;
  padding: 10px;
  width: 120px;
  height: 30px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  margin-bottom: 8%;
  position: absolute;
  left: 70%;
  top: 10%;
}
.button a {
  text-decoration: none;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.button a {
	color: white;
	font-family: raleway;
}
.btn {
    background-color: red;
    border: none;
    color: white;
    padding: 5px 12px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 7px;
}
.btn:hover {
    background-color: #CF0A0A;
}
.edit a {
	color: white;
	text-decoration: none;
}
.hapus a {
	color: white;
	text-decoration: none;
}
.tambah {
  margin-top: 10%;
}


	</style>
</head>
<body class="body">    
<section class="center">
        <form action="" method="POST" class="box">
            <h3 align="center"> Stok Di Ubah </h3>
            <table border="0" align="center">
                <tr>
                    <td>Menu</td>
                        <td><select name="id_sepatu" class="id_sepatu" id="id_sepatu" required>
                               <option value="<?= $rowMenu['id_sepatu']?>" hidden><?= $rowMenu['nama_sepatu']?></option>

                            <?php
                                $tableMenu = mysqli_query($connect, "SELECT * FROM sepatu");
                                while($rowMenu = mysqli_fetch_array($tableMenu)){
                            ?>

                                <option value="<?= $rowMenu['id_sepatu']?>"><?= $rowMenu['nama_sepatu']?></option>

                            <?php } ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>harga menu</td>
                    <?php
                                $tableMenu = mysqli_query($connect, "SELECT * FROM sepatu ");
                                while($rowMenu = mysqli_fetch_array($tableMenu)){
                            ?>
                    <td><input type="text" readonly name="harga_sepatu" value="<?= $rowMenu['harga_sepatu']?>" class="harga_sepatu" required></td>
                <?php } ?>
                </tr>
                <tr>
                    <td>tanggal masuk</td>
                    <td><input type="text" name="tanggal_masuk" required value="<?= date("Y-m-d")?>"></td>
                </tr>
                <tr>
                    <td>jumlah</td>
                    <td><input type="number" name="jumlah" value="<?= $rowpasok['jumlah']?>" class="jumlah" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>total</td>
                    <td><input type="text" name="total" value="<?= $rowpasok['total']?>" class="total" required></td>
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="update" value="Update"> <a href="view.php">Back</a></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>