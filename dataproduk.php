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
					<p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
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

	<div class='gambar'>

		<h2> Data Produk </h2>

		<table class="table">
			<thead>
				<tr>
					<th>ID Produk</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'konek.php';
				$ambil=$con->query("SELECT * FROM produk"); ?>
				<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $pecah['id_produk'];?></td>
						<td><?php echo $pecah['nama'];?></td>
						<td><?php echo $pecah['harga'];?></td>
						<td>
							<img src="gambar/<?php echo $pecah['gambar'];?>"width="50" height="80">
						</td>
						<td>
							<a href="admin.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn">hapus</a>
							<a href="admin.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn">ubah</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class='tambah'>
		<a href="admin.php?halaman=tambahproduk">Tambah</a>
	</div>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>


</body>
</html>
