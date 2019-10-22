<?php
session_start();
 
include '../koneksi.php';
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
                <h2>Informasi Kegiatan Amikom</h2>
                    <a href="insert_kegiatan.php"><input type="submit" value="Tambah" class="tambah btn btn-primary"></a>
                    <?php $data=mysqli_query($koneksi,"SELECT * FROM kegiatan"); 
                       while($d = mysqli_fetch_array($data)){ ?>
                        
                    <div class="text-center">
                        <h2><?php echo $d['nama_kegiatan']?></h2>
                    </div>
                    <div class="card">
                    <div class="posting text-center">
                        <img src="<?php echo "../image/".$d['gambar_kegiatan'] ?>">
                    </div>
                        <div class="card-body">
                        <div class="text-center">
                        <p><?php echo $d['tanggal_kegiatan']; ?></p>
                        <p><?php echo $d['isi_kegiatan']; ?></p>
                        <a href="" class="btn btn-outline-warning">Edit</a>
                        <a href="" class="btn-outline-danger btn">Hapus</a>
                    </div>
                        </div>
                    </div>                    
                    <?php } ?>                
                </div>
            </div>
        </div>
    </div>
</div>
 
</body>
</html>
<?php ?>

<script type="text/javascript">
$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
})
</script>