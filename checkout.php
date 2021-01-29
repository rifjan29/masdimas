<?php
session_start();
$con = new mysqli("localhost","root","","masdimas");
?>

<!DOCTYPE html>
<html>
<head>
	<title>CHECKOUT</title>
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
				<a href="keranjang.php" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     My Cart     </a>
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
			<h2>List Pesanan</h2>
			<table class='table'>
				<thead>
					<tr>
						<th>NO</th>
						<th>GAMBAR</th>
						<th>NAMA</th>
						<th>HARGA</th>
						<th>JUMLAH</th>
						<th>SUBTOTAL</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $total = 0;?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
						<?php $ambil = $con->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$x = $pecah['id_produk'];
						$subharga = $pecah['harga']*$jumlah;
						$total += $subharga; 
						?>

						<tr>
							<td><?php echo $nomor; ?></td>
							<td> <img src='gambar/<?php echo $pecah['gambar'];?>' width="50" weight="80" alt=""></td>
							<td><?php echo $pecah['nama'];?></td>
							<td><?php echo $pecah['harga'];?></td>
							<td><?php echo $jumlah;?></td>
							<td><?php echo number_format($subharga);?></td>
						</tr>
						<?php $nomor++;?>
					<?php endforeach ?>
				</tbody>

				<tfoot>
					<tr>
						<th colspan="5">TOTAL BAYAR : </th>
						<th name='total'>Rp. <?php echo number_format($total);?></th>
					</tr>
				</tfoot>

			</table>

			<form method="POST" action="checkout.php">
				<div class='row'>
					<tr>
						<strong>Atas Nama(Lengkap) : </strong>
					</tr>
					<tr>
						<input type="text" name='atasnama' required>
					</tr>

					<tr>
						<select class='form-control' name='pembayaran'>
							<option value="0" <?=$disabled?>>Pilih metode pembayaran</option>
							<option value="Transfer Bank ke BRI no REK.30xxxxxx">Transfer Bank ke BRI no REK.30xxxxxx</option>
							<option value="GOPAY/OVO">GOPAY/OVO</option>
							<option value="COD/Bayar Tunai">COD/Bayar Tunai</option>
						</select>
					</tr>

					<tr>
						<p>Untuk Tanggal : </p>
					</tr>
					<tr>
						<input type="date" name='tanggal'>
					</tr>
					<tr>
						<td><a href="aboutus.php" class="btn">Hubungi Penjual</a></td>
						<td><input type="submit" class="btn" name='transaksi' value="TRANSAKSI"></td>
					</tr>
				</div>
            </form>
			<?php
			if (isset($_POST["transaksi"]))
			{
				include 'konek.php';
				$username = $_SESSION['username'];
				$atasnama = $_POST['atasnama'];
				$pembayaran = $_POST['pembayaran'];
				$tanggal = $_POST['tanggal'];
				$total1 = $total;
				$id = $id_produk;
				$jumlah1 =$jumlah;
				// untuk memanggil nilai dari total jika $_POST[] dalam bentuk array 

		
			if ($tanggal != null) {
				if ($pembayaran != 0) {
					$sql = mysqli_query($con,"INSERT INTO `pembelian` (`id_pembelian`,`id_produk`,`username`, `atasnama`, `tanggal`, `pembayaran`,`jumlah`, `total`) VALUES (NULL,'$id', '$username', '$atasnama', '$tanggal', '$pembayaran','$jumlah1', '$total1')");
					if (isset($sql)) {
						echo "<script>alert('Transaksi Berhasil! Pesanan sedang diproses');</script>";
						echo "<script>location='home.php';</script>";
						unset($_SESSION['keranjang']);
					}else{
						echo "Error! Mohon untuk mencoba kembali";
					}
				}else{
					$disabled = "disabled";
					?>
						<p style="color:red"> Maaf Pembayaran harus terisi !</p>
					<?php
				}
			}else{
				?>
					<p style="color:red"> Tanggal Harus Diisi WOY... !</p>
				<?php
		
			}
			}
			?>
		</div>
	</section>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>

</body>
</html>