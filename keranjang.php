<?php
session_start();

$con = new mysqli("localhost","root","","masdimas");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel='stylesheet' href='css/cart.css'>
	
</head>
<body>

	<div class='header'>
		<a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

		<div class="menu-header-1">
			<div class="a">
				<ul>
					<p class="mt-4">Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
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
		<!-- <div class='container'> -->
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
						<?php endforeach
						 ?>
					</tbody>
				</table>
				<?php		
			}else{
				?>
					<center>
						<p>Maaf tidak ada keranjang yang tersimpan</p>
					</center>
				<?php
			}
			?>
		<div class='btn' style="margin-bottom:20px;">
			<br>
			<?php
				if (isset($ambil)) {
				?>
				<div class="d-flex justify-content-center">
					<div class="p-2"><a href="home.php" >Lanjutkan Belanja</a></div>
					<div class="p-2"><a href="checkout.php">CHECKOUT</a></div>
				</div>
				<?php
				}else{
					?>
					<div class="d-flex justify-content-center">
						<div class="p-2"><a href="home.php" class="btn">Lanjutkan Belanja</a></div>
					</div>
					
					<?php
				}
			?>
		</div>
			<h2>Verifikasi Pembelian</h2>
			<center><p>Silahkan Upload Bukti Pembayaran</p></center>
			<table class="table">
			<thead>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Tanggal</th>
					<th>Pembayaran</th>
					<th>Total</th>
					<th>Status</th>
					<th>Upload Foto</th>
			</thead>
			<tbody>
			<?php
				if (isset($_SESSION['username'])) {
					
					$username = $_SESSION['username'];
					
					$sql = $con->query("SELECT * FROM pembelian WHERE username ='$username'");
					$no = 1;
					while ($data = $sql->fetch_assoc()) {
						$id = $data['id_pembelian'];
						 ?>
							<tr>
								<td><?=$data['id_pembelian']?></td>
								<td><?=$data['atasnama']?></td>
								<td><?=$data['tanggal']?></td>
								<td><?=$data['pembayaran']?></td>
								<td><?=$data['total']?></td>
								<td>
								 <?php 
								 	// $status = $_POST['status'];
								 	if(isset($status)){

									 }else{
										?>
											<span class="badge badge-danger">Diproses</span>
										<?php
									 }
								 ?>
								</td>
								<form action="" method="POST" enctype="multipart/form-data">
								<td>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?=$id?>">
										Upload Foto
									</button>
								</td>
								</form>	
							</tr>
					<?php }?>
				</tbody>	
				<?php	
				}else{

				}
			?>
			</table>
		<!-- </div> -->
	</section>
<!-- Modal -->
<div class="modal fade" id="Modal<?=$data['id_pembelian']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Foto Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
										
			<form action="" method="post" enctype='multipart/form-data'>
			<div class="modal-body">
				<div class="form-group">
					<input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>	
	<?php 
if (isset($_POST['submit']))
{
	$nama = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	// $id = $
	// move_uploaded_file($lokasi, "../gambar/".$nama);
	// $input=mysqli_query($con ,"insert into produk values('$_POST[id_produk]','$_POST[nama]','$_POST[harga]','$nama')");
	// echo "<div class='alert alert-info'>Data Tersimpan</div>";
	// echo "<meta http-equiv='refresh' content='1;url=dataproduk.php?halaman=produk'>";
}
?>
	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>