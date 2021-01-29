<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jajanan Mas Di Mas</title>
    <link rel='stylesheet' href='css/admin.css'>
</head>
<body>

    <div class='header'>
        <a href="admin.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

        <div class="menu-header-1">
            <div class="a">
                <ul>
                    <h4>Selamat datang, <?php echo $_SESSION['username']; ?>!</h4>
                    <li><a href="logout.php">LOGOUT</a></li>
                    
                </ul>
            </div> 
            <div class="b">

            </div>
            <div class="c">
                
            </div>
        </div>
        <div class="menu-header-2">
            
        </div>
    </div>
    <div class="header-2">
        <div class="menu-header-2">
            <ul>
                <li><a href="dataproduk.php">Data Produk</a></li>
                <li><a href="pembelian.php">Pembelian</a></li>
                <li><a href="pelanggan.php">Pelanggan</a></li>
            </ul>
        </div>
    </div>
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk")
                    {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk")
                    {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapuspelanggan")
                    {
                        include 'hapuspelanggan.php';
                    }
                }
                ?>

    <div class='footer'>
        <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
    </div>


</body>
</html>