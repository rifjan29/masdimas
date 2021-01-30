<?php
session_start();

$con = new mysqli("localhost","root","","masdimas");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
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
			<h2>My Cart</h2>
		<?php
			if (isset($_SESSION['keranjang'])) {
				?>
								<table class='table'>
				<thead>
					<tr>
						<th>No</th>
						<th>Gambar</th>
						<th>Nama</th>
						<th>harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					$nomor=1;
					foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
						<?php $ambil = $con->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						// $id_produk = $pecah['id_produk'];
						$subharga = $pecah['harga']*$jumlah;
						?>

						<tr>
							<td><?php echo $nomor; ?></td>
							<td> <img src='gambar/<?php echo $pecah['gambar'];?>' width="50" weight="80" alt=""></td>
							<td><?php echo $pecah['nama'];?></td>
							<td><?php echo $pecah['harga'];?></td>
							<td><?php echo $jumlah;?></td>
							<td><?php echo number_format($subharga);?></td>
							<td>
								<a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class='btn'>Hapus</a>
							</td>
						</tr>
						<?php $nomor++;?>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
			}else{
				?>
					<center>
						<p>Maaf tidak keranjang yang tersimpan</p>
					</center>
				<?php
			}
		?>
		</div>
	</section>
	<div class='btn'>
		<br>
		<br>
		<?php
			if (isset($ambil)) {
			 ?>
				<a href="home.php" class="btn">Lanjutkan Belanja</a>
				<a href="checkout.php">CHECKOUT</a>
			<?php
			}else{
				?>
				<a href="home.php" class="btn">Lanjutkan Belanja</a>
				<?php
			}
		?>
		<br>
		<br>
	</div>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>

</body>
</html>