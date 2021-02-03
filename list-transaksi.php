<?php
session_start();

$con = new mysqli("localhost","root","","masdimas");
$username = $_SESSION['username'];
$data = mysqli_query($con, "SELECT pembelian.id_pembelian, pembelian.atasnama, pembelian.tanggal, pembelian.total, pembelian.status, pembelian.bukti_pembayaran, detail_pembelian.ud_pembelian FROM `pembelian` JOIN detail_pembelian ON pembelian.id_pembelian = detail_pembelian.ud_pembelian WHERE pembelian.username = '$username' GROUP BY detail_pembelian.ud_pembelian ");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Transaction</title>
	<link rel='stylesheet' href='css/cart.css'>
</head>
<body>

	<div class='header'>
		<a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

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
				<a href="" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     My Cart     </a>
                <a href="list-transaksi.php" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     Transaksi     </a>
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
		<div class='container'>
			<h2>My Transaction</h2>
		<?php
			if (isset($data)) {
				?>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Atasnama</th>
                            <th>Subtotal</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Bukti Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        $nomor=1;
                        while ($item = mysqli_fetch_array($data)){ ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $item['atasnama'];?></td>
                                <td><?php echo $item['total'];?></td>
                                <td>
                                    <?php if($item['status'] == 'diproses' && $item['bukti_pembayaran'] != null){ 
                                        echo $item['status'] . '(menunggu persetujuan admin)';    
                                    }else{
                                        echo $item['status'];
                                    }?>
                                </td>
                                <td><?php echo $item['tanggal'];?></td>
                                <td>
                                    <?php if($item['status'] == 'dikirim' || $item['status'] == 'diproses' && $item['bukti_pembayaran'] != null){ ?>
                                        <img src="bukti_pembayaran/<?php echo $item['bukti_pembayaran'];?>" alt="<?php echo $item['bukti_pembayaran'];?>" width="200px" height="250px">
                                    <?php }else{ ?>
                                        <a href="uploadbukti.php?id=<?php echo $item['id_pembelian']?>" class='btn'>Upload Bukti Pembayaran</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="detailtransaksi.php?id=<?php echo $item['id_pembelian']?>" class='btn'>Detail</a>
                                    |
                                    <a href="hapustransaksi.php?id=<?php echo $item['id_pembelian']?>" class='btn'>Hapus</a>
                                </td>
                            </tr>
                            <?php $nomor++;?>
                        <?php } ?>
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
		</div>
	</section>
	<div class='btn'>
		<br>
		<br>
		<?php
			if (isset($ambil)) {
			 ?>
				<a href="home.php" class="btn">Lanjutkan Belanja</a>
				<a href="checkout.php">CHECKOUT</a>
			<?php
			}else{
				?>
				<a href="home.php" class="btn">Lanjutkan Belanja</a>
				<?php
			}
		?>
		<br>
		<br>
	</div>

	<div class='footer'>
		<p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
	</div>

</body>
</html>