<!DOCTYPE html>	
<html>
<head>
	<title>Registrasi</title>
	<link rel='stylesheet' href='css/profil.css'>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
<div class='header'>
            <a href="index.html" class="custom-logo-link" rel="home" aria-current="page"><img width="200" height="80px" src="gambar/logo.png" class="custom-logo"/></a>

        <div class="menu-header-1">
                <div class="a">
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="registrasi.php">Registrasi</a></li>
                        
                    </ul>
                </div> 
                <div class="b">

                </div>
                <div class="c">
                    <a href="" class="custom-logo-link" rel="home" aria-current="page"><img width="35" height="35" src="gambar/keranjang.png" class="custom-logo">     My Cart     </a>
                </div>
            </div>
            <div class="menu-header-2">

                <input type="text" name="" placeholder="Search for Products">
                
            </div>
        </div>
        <div class="header-2">
            <div class="menu-header-2">
                <ul>
                    <li><a href="">Help</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="map.php">Maps</a></li>
                </ul>
            </div>
        </div>
        <div class='tulisan'>
        	<div class='isi'>
<h1>Registrasi</h1>
<form action="" method="POST">
	<table>
            <tr>
                <td width="160"><p>Username</p></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td width="120"><p>Email</p></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><p>No HP</p></td>
                <td><input type="text" name="nohp"></td>
            </tr>
            <tr>
                <td><p>Password</p></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><p>Verifikasi Password</p></td>
                <td><input type="password" name="password2"></td>
            </tr>
            <tr>
                <td><p>Alamat</p></td>
                <td><textarea name="alamat"></textarea></td>
                <td></td>
                <td width="50"></td>
            </tr>
            <tr>
                <td><p>Kode Pos</p></td>
                <td><input type="text" name="kodepos"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tombol" value="Registrasi"></td>
            </tr>
        </table>
</form>
<?php
if(isset($_POST['tombol'])){
    include 'konek.php';
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $nohp=$_REQUEST['nohp'];
    $password=$_REQUEST['password'];
    $password2=$_REQUEST['password2'];
    $alamat=$_REQUEST['alamat'];
    $kodepos=$_REQUEST['kodepos'];
    $input=mysqli_query($con ,"insert into pengguna values
('$username','$email','$nohp','$password','$password2','$alamat','$kodepos')");
    
    if($input){
        print '<center>Registrasi berhasil';
        header("location:login.php");
    } else {
        echo 'Registrasi gagal';
    }
    
    }
?>

</div>
</div>

<div class='footer'>
    <p>Copyright 2020 - <a href=''>Jajanan Mas Di Mas</a></p>
</div>

</body>
</html>
