<?php 
include 'konek.php';
?>
 
<h3>Form Pencarian</h3>
 
<form action="search.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
	<tr>
  <th>Nama Barang</th>
 </tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($conn, "select * from produk where nama like '%".$cari."%'");				
	}else{
		$data = mysqli_query($conn, "select * from produk");		
	}
	$no = 1;
	while($d = mysqli_fetch_array($data)){
	?>
	<tr>
    <td><?php echo $d['nama']; ?></td>
 	</tr>
	<?php } ?>
</table>
