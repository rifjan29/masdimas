<div class='gambar'>

		<h2> Detail Pembelian </h2>
		<?php
		include 'konek.php';
		$ambil = $con->query("SELECT * FROM pembelian JOIN pengguna ON pembelian.username=pengguna.username WHERE pembelian.id_pembelian='$_GET[id]'");
		$detail = $ambil->fetch_assoc();
		?>

		<strong><?php echo $detail['username'];?></strong> <br>
		<p>
			Email : <?php echo $detail['email']; ?><br>
			NoHP : <?php echo $detail['nohp']; ?> <br>
			Alamat :<?php echo $detail['alamat']; ?> <br>
			Kode Pos :<?php echo $detail['kodepos']; ?> 
		</p>

		<p>
			tanggal:<?php echo $detail['tanggal']; ?> <br>
			Total:<?php echo $detail['total'];?>
		</p>

		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php include 'konek.php';
				$ambil=$con->query("SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk WHERE detail_pembelian.ud_pembelian='$_GET[id]'"); ?>
				<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama'];?></td>
						<td><?php echo $pecah['harga'];?></td>
						<td><?php echo $pecah['jumlah'];?></td>
						<td><?php echo $pecah['harga']*$pecah['jumlah'];?></td>
					</tr>
				<?php $nomor++;?>
			<?php } ?>
			</tbody>
		</table>

	</div>
