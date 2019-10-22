<?php
session_start();
require_once "../koneksi.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Kampus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>

<body>
    <div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">ADMIN</a>
            </li>
            <li><i class="fas fa-columns"></i><a href="home_index.php">DashBoard</a></li>
            <li><i class="far fa-envelope-open"></i><a href="">Kotak Pesan</a></li>
            <li><i class="fas fa-book"></i><a href="elearning.php">E-Learning</a></li>
            <li><i class="fas fa-calendar-alt"></i><a href="info_kegiatan.php">Informasi Kegiatan</a></li>
            <li><i class="fas fa-clipboard-list"></i><a href="peraturan_kampus.php">Informasi Peraturan</a></li>
            <li><i class="fas fa-share-square"></i><a href="insert_kegiatan.php">Posting Kegiatan</a></li>
            <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Keluar</a></li>
        </ul>
    </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button class="btn-menu btn btn-success btn-toggle-menu" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Posting Kegiatan</h2>
                        <div class="content">
                            <form class="" action="../cek/upload.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="size" value="1000000">
                            </div>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control col-md-4" name="nama_kegiatan" placeholder="SEMINAR NASIONAL">
                                </div>
                                <div class="form-group">
                                    <label for="masukkan file">Pilih Poster untuk Di Posting</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="nama_gambar">
                                </div>
                                <div class="form-group">
                                    <label for="isi">Tuliskan Deskripsi Dari Kegiatan :</label>
                                    <textarea class="form-control col-lg-6" rows="8" id="comment" name="isi_kegiatan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="example-date-input">Pilih Tanggal Kegiatan:</label>
                                    <input class="form-control col-md-4" type="date" value="2018-08-19" id="example-date-input" name="tanggal_kegiatan">
                                </div>
                                <input class="btn btn-outline-success" type="submit" name="upload" value="Posting">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
// $msg ="";

// if(isset($_POST['upload'])) {
// $target = "image/".basename($_FILES['nama_gambar']['name']);

// $namakegiatan = $_POST['nama_kegiatan'];
// $namagambar = $_FILES['nama_gambar']['name'];
// $isikegiatan = $_POST['isi_kegiatan'];
// $tanggalkegiatan = $_POST['tanggal_kegiatan'];

// $gambar ="INSERT INTO kegiatan (nama_kegiatan,gambar_kegiatan,isi_kegiatan,tanggal_kegiatan)
// VALUES ('$namakegiatan','$namagambar','$isikegiatan','$tanggalkegiatan')";

// $hasil = mysqli_query($koneksi, $gambar) or die(mysql_error());

// if(move_uploaded_file($_FILES['nama_gambar']['tmp_name'], $target)) {
    
// }else{
    
// }
// }
?>

<script type="text/javascript">
$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
})
</script>