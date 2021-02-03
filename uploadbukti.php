<?php
session_start();

$con = new mysqli("localhost","root","","masdimas");
$username = $_SESSION['username'];
$id = $_GET['id'];
$data = mysqli_query($con, "SELECT id_pembelian, atasnama, username, tanggal, total FROM pembelian WHERE username = '$username' AND id_pembelian = '$id'");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Bukti pembayaran</title>
	<link rel='stylesheet' href='css/cart.css'>
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
                <a href="list-transaksi.php" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     Transaksi     </a>
			</div>
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

	<section class='gambar'>
		<div class='container'>
			<h2>Upload Bukti pembayaran</h2>
            <?php while($item = mysqli_fetch_array($data)){ ?>
                <p><label>Atas nama : </label> <?= $item['atasnama'] ?></p>
                <?php 
                    $detail = mysqli_query($con, "SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk = produk.id_produk WHERE ud_pembelian = '$id'");
                    while($item_detail = mysqli_fetch_array($detail)){
                ?>
                    <p><label>Produk : <?= $item_detail['nama'] ?></label></p>
                    <img src="gambar/<?= $item_detail['gambar'] ?>" alt="<?= $item_detail['gambar'] ?>" width="150px" height="150px">
                <?php } ?>
            <?php } ?>
		</div>
	</section>
	<div class='btn'>
		<br>
		<br>
		<form action="uploadbukti_proses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pembelian" value="<?= $id ?>">
            <p><label for="bukti">Upload Bukti Pembayaran</label> <input type="file" name="bukti" id="bukti"></p>
            <input type="submit" value="Kirim">
        </form>
		<br>
		<br>
	</div>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>

</body>
</html>