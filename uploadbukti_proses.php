<?php
    include 'konek.php';
    $id = $_POST['id_pembelian'];
    $gambar = $_FILES['bukti']['name'];
    $lokasi = $_FILES['bukti']['tmp_name'];
    $update = mysqli_query($con, "UPDATE pembelian SET bukti_pembayaran = '$gambar' WHERE id_pembelian = '$id'");
    if($update){
        move_uploaded_file($lokasi, "bukti_pembayaran/".$gambar);
        echo "<div class='alert alert-info'>Berhasil mengupload. Silahkan menunggu konfirmasi dari pihak admin.</div>";
        echo "<meta http-equiv='refresh' content='1;url=list-transaksi.php'>";
    }
    else{
        echo "gagal";
    }
?>