<?php
    include "koneksi/connection.php";
	if(!isset($_SESSION['login'])){
		header("Location: login.php");
        exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Mangzy Store </title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/147e95360f.js" crossorigin="anonymous"></script>
        <script src="jquery.js"></script>
        <script src="js.js"></script>
 	<style>
 	* {
 		box-sizing: border-box;
 	}
 	.header h1{
 		font-size: 40px;
 		font-family: raleway;
 	}
 	h1 {
 		text-align: center;
 		font-family: raleway;
 	}
 	body {
        background-color: #CF0A0A;
 		background-size: 100% 100%;
 		margin: 0px;
 	}
 	nav {
 		padding: 15px;
 		font-family: raleway;
 		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
 	}
 	#nav-1 {
 		background: #CF0A0A;
 	}
 	.nav {
 		transition: 0.3%;
 		background: #CF0A0A;
 		color: #000000;
 		font-size: 20px;
 		text-decoration: none;
 		border-top: 4px solid #CF0A0A;
 		border-bottom: 4px #CF0A0A;
 		padding: 3px;
 		margin: 10px;
 	}
 	.nav:hover {
 		color: blue;
 		padding: 6px 0;
 	}
 	.style-kotak2 {
 		margin-top: 50px;
 		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
 		padding: 20px;
 		text-align: center;
 		background-color: white;
 		height: 70px;
 		border-radius: 10px;
 	}
 	.kotak2 {
 		height: 500px;
 		padding-bottom: 10px;
 		padding: 100px;
 		background-color: white
 	}
 	</style>
<body>
    <header class="header">
        <h1>Laptop Store</h1>
        <nav class="navbar-nav">
            <div class="isi">   
                <div class="kiri">
                    <label>
                    <div><b class="left"></b></div>
                    </label>
                </div>
                <nav id="nav-1">
 		<a class="nav" href="utama.php">Home</a>
 		<a class="nav" href="#">Shop</a>
 		<a class="nav" href="sepatu/view.php">Sneakers</a>
 		<a class="nav" href="stok/view.php">stok</a>
		 <a class="nav" href="logout.php">Logout</a>
            <button id="btn-info">Tema</button>
            <button id="btn1">Show item</button>
         </div>
         </div>  
        </nav>  
    </header>
    <content>              
        <div class="buttonsec1"><button id="btn-more"> Navigation </button></div>
        <div id="section1">
                    <h3 id="our"> Snekaers </h3>
                    <div class="product">
                        <div>
                            <img src="https://i.pinimg.com/564x/5c/96/69/5c96694ff1cd942ff6818b5808565bd4.jpg" alt="Sepatu ini boss"> 
                            <p> Dior x Air Jordan 1 High </p>
                            <p1> Rp 35.000,000,- </p1>
                        </div>
                        <div class="img2">
                            <img src="https://i.pinimg.com/564x/7b/0a/77/7b0a775807ea74185aeaee17d3af3eb1.jpg" alt="Sepatu ini boss"> 
                            <p> Air Jordan 1s </p>
                            <p1> Rp 4.750,000,- </p1>
                        </div>
                    </div>
                    <div class="btn-beli"><button><a href="form/form.php"> BUY </a></button></div>
                </div>
            </content>
        <footer>
            <h3> Mangzy Store </h3>
            <img src="css/logo sneakers.jpg" alt="logo">
            <br>
        </footer>
        <div class="bottom">
</body>
</html>
