<?php
    include 'konek.php';

    $id = $_GET['id'];
    $update = mysqli_query($con, "UPDATE pembelian SET status = 'dikirim' WHERE id_pembelian = '$id'");
    if($update){
        echo "<div class='alert alert-info'>Berhasil menerima persetujuan.</div>";
        echo "<meta http-equiv='refresh' content='1;url=menunggupersetujuan.php'>";
    }
    else{
        echo "gagal";
    }
?>