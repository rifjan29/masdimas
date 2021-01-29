<?php 
include 'konek.php';
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}

    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Jajanan Mas Di Mas</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>

    <div class='header'>
        <a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.PNG" class="custom-logo"/></a>

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
            <form action="home.php" method="GET">
                <input type="text" name="cari_data" placeholder="Masukkan Nama...">
                <input type="submit" value="cari" >
            </form>
        </div>
    </div>
    <div class="header-2">
        <div class="menu-header-2 mt-3">
            <ul>
                <li><a href="help.php">Help</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="map.php">Maps</a></li>
            </ul>
        </div>
    </div>

    <div class='row'>
        <div class='gambar'>

            <?php 
            if (isset($_GET["cari_data"]) ) {
                $cari = $_GET['cari_data'];
                if (isset($cari)) {
                   $ambil = $con->query("SELECT * FROM produk WHERE nama LIKE '%".$cari."%'");
                }
            }else{
                $ambil = $con->query ("SELECT * FROM produk");
            }
            while ($pecah = $ambil->fetch_array()) {
            ?>
                <div class='gambar'>
                    <div class='foto'>
                        <img src='gambar/<?php echo $pecah['gambar'];?>' alt="">
                        <h1><?php echo $pecah['nama'];?></h1>
                        <p>Rp <?php echo number_format($pecah['harga']);?></p>
                        <a href="halaman.php?halaman=detail&id=<?php echo $pecah['id_produk'];?>" class="btn">Detail Produk</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <div class='footer'>
        <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
    </div>


</body>
</html>