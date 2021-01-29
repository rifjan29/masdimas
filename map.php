<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lokasi</title>
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
                    <li><a href="map.php">Lokasi</a></li>
                </ul>
            </div>
        </div>

         <div class="deskripsi">
        <div class="tulisan">
            <h1>Lokasi Toko</h1>
            <p>Grenden Karangsono, Karang Sono, Grenden, Puger, Kabupaten Jember, Jawa Timur 68164.</p>

            <iframe src="https://www.google.com/maps/embed?pb=!4v1608611501244!6m8!1m7!1srVxurYZgPyVjsn2l_XFW4A!2m2!1d-8.33318861799886!2d113.4716588358396!3f115.12324137264694!4f-20.177232151589976!5f0.7820865974627469" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>
    </div>

    <div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

</body>
</html>