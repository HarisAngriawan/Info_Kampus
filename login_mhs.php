<!DOCTYPE html>
<html>
<head>
	<title>Masuk Sebagai Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrapper">

	<h1>Masuk Sebagai Mahasiswa<br/></h1>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan Masuk</p>
		<?php 
			if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
			echo "<div class='alert' style='color:#fff; text-align:center'>Username dan Password tidak sesuai !</div>";
			}
		}
		?>
		<form method="POST" action="cek/cek_login_mhs.php">
			<div class="form_login">
				<label>Username</label>
				<input type="text" name="username" class="form_login" placeholder="Username atau email ..">

				<label>Password</label>
				<input type="password" name="password" class="form_login" placeholder="Password ..">

				<input type="submit" class="tombol_login" value="LOGIN">
				<br>
				<br>
				<a class="link" href="index.php"><h2>kembali</h2></a>
			</div>
		</form>
		
	</div>

</div>
</body>
</html>