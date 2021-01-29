<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Almond Bread</title>
    <link rel='stylesheet' href='css/lihatproduk.css'>
</head>

<body>
    <div class='header'>
        <a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

        <div class="menu-header-1">
            <div class="a">
                <ul>
                    h4>Selamat datang, <?php echo $_SESSION['username']; ?>!</h4>
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
            <img width="450" height="630" src='gambar/almond.jpg'>
        </div>
    </div>

    <div class='keterangan'>
       <h1>Almond Bread</h1>
       <p>Terdiri dari roti yang atasnya almond</p>
       <p></p>
       <p>Dimasak dengan cara dipanggang atau digoreng, atau dikukus dengan cara konvensional atau pemanggang roti.</p>
       <p></p>
       <p>Bagian atas roti diberi almond</p>

       <a>Rp 20.000/pcs</a>

   </div>
   <div class='tambah'>
       <a href="keranjang.php?id=<?php echo $perproduk['id produk']?>" class="custom-logo-link" rel="home" aria-current="page"><img width="20" height="20" src="gambar/keranjang.png" class="custom-logo">     Masukkan Cart     </a>
   </div>

   <div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

</body>
</html>