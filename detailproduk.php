<div class='row'>
	<?php
		include 'konek.php';
		$ambil = $con->query("SELECT * FROM produk WHERE produk.id_produk='$_GET[id]'");
		$pecah = $ambil->fetch_assoc();
		?>
		<div class='gambar'>
			<div class='foto-produk'>
				<img src='gambar/<?php echo $pecah['gambar'];?>' alt="" width="450" height="630">
			</div>
		</div>

		<div class='keterangan'>

			<h1><?php echo $pecah['nama'];?></h1>

			<p>
				<?php echo $pecah['deskripsi'];?>
			</p>

			<a>
				Rp <?php echo number_format($pecah['harga']);?>
			</a>

		</div>

		<div class='tambah'>
			<a href="beli.php?id=<?php echo $pecah['id_produk'];?>"><img width="20" height="20" src="gambar/keranjang.png" class="custom-logo">     Masukkan Cart     </a>
		</div>

</div>