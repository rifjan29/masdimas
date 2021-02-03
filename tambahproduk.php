<div class='tulisan'>
	<div class='isi'>
		<h1>Tambah Produk</h1>
		<form method='post' enctype='multipart/form-data'>
			<table>
				<tr>
					<td width="110"><p>ID Produk</p></td>
					<td><input type='text' class='form-control' name='id_produk'></td>
				</tr>
				<tr>
					<td><p>Nama</p></td>
					<td><input type='text' class='form-control' name='nama'></td>
				</tr>
				<tr>
					<td><p>Harga (RP)</p></td>
					<td><input type='number' class='form-control' name='harga'></td>
				</tr>
				<tr>
					<td><p>Gambar</p></td>
					<td><input type='file' class='form-control' name='gambar'></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="tombol" value="Simpan"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php 
if (isset($_POST['tombol']))
{
	include 'konek.php';
	$nama = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "gambar/".$nama);
	$input=mysqli_query($con ,"insert into produk values('$_POST[id_produk]','$_POST[nama]','$_POST[harga]','$nama')");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dataproduk.php?halaman=produk'>";
}
?>