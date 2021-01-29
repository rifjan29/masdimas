<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Donuts</title>
        <link rel='stylesheet' href='css/lihatproduk.css'>
    </head>

<body>
    <div class='header'>
            <a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

        <div class="menu-header-1">
                <div class="a">
                    <ul>
                        <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div> 
                <div class="b">

                </div>
                <div class="c">
                    <a href="" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     My Cart     </a>
                </div>
            </div>
            <div class="menu-header-2">

                <input type="text" name="" placeholder="Search for Products">
                
            </div>
        </div>
        <div class="header-2">
            <div class="menu-header-2">
                <ul>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="map.php">Maps</a></li>
                </ul>
            </div>
        </div>
	<div class='gambar'>

<div class='foto'>
    <img width="450" height="630" src='gambar/donat.jpg'>
</div>
</div>

<div class='keterangan'>
	<h1>Donuts</h1>
    <p>Ini Donuts.</p>
	<p></p>
	<p>bulat.</p>
	<p></p>
	<p>enak.</p>

	<a>Rp 5.000/pcs</a>

</div>
<div class='tambah'>
	<a href="" class="custom-logo-link" rel="home" aria-current="page"><img width="20" height="20" src="gambar/keranjang.png" class="custom-logo">     Masukkan Cart     </a>
</div>

<div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

</body>
</html>