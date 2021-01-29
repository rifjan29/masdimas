<?php
include 'konek.php';
$ambil=$con->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$data = mysqli_fetch_array($ambil);

?>

<h2>Ubah Produk</h2>

<form method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td width="110"><p>ID Produk</p></td>
			<td><input type='text' name='id_produk' value="<?php echo $data['id_produk'] ?>"></td>
		</tr>
		<tr>
			<td><p>Nama</p></td>
			<td><input type='text' name='nama' value="<?php echo $data['nama'] ?>"></td>
		</tr>
		<tr>
			<td><p>Harga (RP)</p></td>
			<td><input type='number' name='harga' value="<?php echo $data['harga'] ?>"></td>
		</tr>
		<tr>
			<td><p>Gambar</p></td>
			<td><img src="gambar/<?php echo $data['gambar'];?>"width="50" height="80"><input type='file' name='gambar' value="<?php echo $data['gambar'] ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ubah" value="Ubah"></td>
		</tr>
	</table>
</form>

<?php
if (isset($_POST['ubah']))
{
	$id_produk = $_POST['id_produk'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];

	$foto = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];

		mysqli_query($con ,"UPDATE produk SET id_produk='$id_produk', nama='$nama', harga='$harga', gambar='$foto' WHERE id_produk='$_GET[id]'");

	echo "<div class='alert alert-info'>Data Telah Diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=dataproduk.php?halaman=produk'>";

}
?>