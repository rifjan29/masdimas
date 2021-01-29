<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel='stylesheet' href='css/navbar.css'>
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
                    <a href="keranjang.php" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     My Cart     </a>
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
        <div class='deskripsi'>
        <div class="tulisan">
            <h1>Help</h1>
            <p>Cara Order :</p>
            <p> 1. Pilih produk yang akan dibeli</p>
            <p> 2. Klik tambahkan pada produk</p>
            <p> 3. Klik button<img src='gambar/keranjang.png' width='35' height='35'>  untuk melihat detail produk yang akan anda pesan</p>
            <p> 4. Klik checkout untuk memesan produk</p>
            <p> 5. Jika anda belum Login maka anda akan dialihkan ke menu login dan anda harus login terlebih dahulu</p>
            <p> 6. Setelah itu, pilih metode pembayaran dan metode pengiriman</p>
        </div>
    </div>
    
<div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

</body>
</html>