<?php
include 'konek.php';
$ambil=$con->query("SELECT * FROM pengguna WHERE username='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$con->query("DELETE FROM pengguna WHERE username='$_GET[id]'");
echo "<div class='alert alert-info'>Data telah dihapus</div>";
echo "<meta http-equiv='refresh' content='1;url=pelanggan.php?'>";
?>