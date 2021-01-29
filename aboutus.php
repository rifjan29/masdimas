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
        <div class="deskripsi">
        <div class="tulisan">
            <h1>About Us</h1>
            <p>Jajanan Mas Di Mas menjual segala jenis kue yang dibuat dengan bahan yang sehat serta berkualitas. Tentunya dijual dengan harga yang sangat terjangkau bagi semua kalangan.</p>
            <p>Segala menu yang dibuat adalah homemade dan kami membuatnya sendiri</p>
            <p></p>
            <p></p>
            <p><img width="30px" height="30px" src="gambar/wa.png"/>   081111653234</p>
            <p><img width="30px" height="30px" src="gambar/ig.png"/>   @jajanan_masdimas</p>
        </div>
    </div>

<div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

    </body>
</html>