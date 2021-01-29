<?php
include 'konek.php';
$ambil=$con->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../gambar/$gambar"))
{
	unlink("../gambar/$gambar");
}
$con->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<div class='alert alert-info'>Data telah dihapus</div>";
echo "<meta http-equiv='refresh' content='1;url=dataproduk.php?halaman=produk'>";
?>