<!DOCTYPE html>
<html>

<head>
    <title>Masuk Sebagai Pengunjung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <h1>Masuk Sebagai Pengunjung<br /></h1>

        <div class="kotak_login">
            <p class="tulisan_login">Silahkan Masuk</p>
    		<?php 
			if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
			echo "<div class='alert' style='color:#fff; text-align:center'>Harus Input Nama !</div>";
			}
		}
		?>
            <form method="POST" action="cek/cek_login_pengunjung.php">
                <div class="form_login">
                    <label>Username</label>
                    <input type="text" name="username" class="form_login" placeholder="Isi Nama Anda...">
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
