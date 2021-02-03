<?php
    include 'konek.php';

    $id = $_GET['id'];
    $data = mysqli_query($con, "SELECT id_pembelian, bukti_pembayaran FROM pembelian WHERE id_pembelian = '$id' LIMIT 1");
    $file = mysqli_fetch_assoc($data);
    $update = mysqli_query($con, "UPDATE pembelian SET status = 'ditolak' WHERE id_pembelian = '$id'");
    if($update){
        $file = 'bukti_pembayaran/' . $file['bukti_pembayaran'];
        if(unlink($file)){
            echo "<div class='alert alert-info'>Berhasil menerima persetujuan.</div>";
            echo "<meta http-equiv='refresh' content='1;url=menunggupersetujuan.php'>";
        }
        echo "gagal";
    }
    else{
        echo "gagal";
    }
?>