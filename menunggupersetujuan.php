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
				<li><a href="menunggupersetujuan.php">Menunggu persetujuan</a></li>
			</ul>
		</div>
	</div>

	<div class='gambar'>

		<h2> Menunggu Persetujuan </h2>

		<table class="table">
			<thead>
				<tr>
					<th>Bukti Pembayaran</th>
					<th>Username</th>
					<th>Pembeli</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'konek.php';
				$ambil=$con->query("SELECT * FROM pembelian JOIN pengguna ON pembelian.username=pengguna.username WHERE pembelian.status = 'diproses' AND pembelian.bukti_pembayaran IS NOT NULL"); ?>
				<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td>
                            <img src="bukti_pembayaran/<?= $pecah['bukti_pembayaran'] ?>" alt="<?= $pecah['bukti_pembayaran'] ?>" width="230px" height="300px">
                        </td>
						<td><?php echo $pecah['username'];?></td>
						<td><?=$pecah['atasnama']?></td>
						<td><?php echo $pecah['tanggal'];?></td>
						<td><?php echo $pecah['total'];?></td>
						<td>
							<a href="admin.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" class="btn">Detail</a>
							<a href="terima.php?id=<?php echo $pecah['id_pembelian'];?>" class="btn">Terima</a>
							<a href="tolak.php?id=<?php echo $pecah['id_pembelian'];?>" class="btn">Tolak</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>


</body>
</html>