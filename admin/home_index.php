<?php
session_start();
include '../koneksi.php';
include '../cek/functions.php'; 

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
    <!-- <style type="text/css">
    th {
        text-align: center;}
    </style> -->
<div id="wrapper" class="wrapper-content">
<div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">ADMIN</a>
            </li>
            <li><i class="fas fa-columns"></i><a href="home_index.php">DashBoard</a></li>
            <li><i class="far fa-envelope-open"></i><a href="tampilkan_e-learning_dosen.php">Pesan Dosen</a></li>
            <li><i class="fas fa-book"></i><a href="elearning.php">E-Learning</a></li>
            <li><i class="fas fa-calendar-alt"></i><a href="info_kegiatan.php">Informasi Kegiatan</a></li>
            <li><i class="fas fa-clipboard-list"></i><a href="peraturan_kampus.php">Informasi Peraturan</a></li>
            <li><i class="fas fa-share-square"></i><a href="insert_kegiatan.php">Posting Kegiatan</a></li>
            <li><i class="fas fa-sign-out-alt"></i><a href="../logout.php">Keluar</a></li>            
        </ul>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-default">            
            <div class="container-fluid">
            <div class="dropdown show">
                        <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i>
                            Notifikasi
                            <?php
                                $query = "SELECT * from `upload_dosen` where `status_notif_to_admin` = 'unread' order by `tanggal_notif_to_admin` DESC";
                                if(count(fetchAll($query))>0){
                                ?>
                            <span class="badge badge-light">
                                <?php echo count(fetchAll($query)); ?></span>
                            <?php
                                }
                                    ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php
                                $query = "SELECT * from `upload_dosen` order by `tanggal_notif_to_admin` DESC";
                                if(count(fetchAll($query))>0){
                                    foreach(fetchAll($query) as $i){
                                ?>
                            <a style="
                                <?php
                            if($i['status_notif_to_admin']=='unread'){
                                echo "
                                font-weight:bold;"; } ?>
                                " class="dropdown-item" href="lihat_pesan_notif.php?id=
                                <?php echo $i['id_notif'] ?>">
                                <small><i>
                                        <?php echo date('F j, Y, g:i a',strtotime($i['tanggal_notif_to_admin'])) ?></i></small><br />
                                <?php 
                  
                                    if($i['type_notif_to_admin']=='pesan'){
                                        echo ucfirst($i['nama_dosen'])." Mengupload File";
                                    }else{
                                        
                                    }                  
                                    ?>
                            </a>
                            <div class="dropdown-divider"></div>
                            <?php
                                        }
                                    }else{
                                        echo "No Records yet.";
                                    }
                                        ?>
                        </div>
                    </div>            
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
                    <h2>Info Profil Mahasiswa</h2>
                    <a href="tambah_mhs.php"><input type="submit" value="Tambah" class="tambah btn btn-primary"></a>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr class="scope">
                                <th><center>No</th>
                                <th><center>Nama Mahasiswa</th>
                                <th><center>Email</th>
                                <th><center>NIM</th>
                                <th><center>No.Handphone</th>
                                <th><center>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ambil=$koneksi->query("SELECT * FROM mahasiswa"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()){ ?>
                            <tr>
                                <td><center><?php echo $pecah['id_mhs']; ?></td>
                                <td><?php echo $pecah['nama']; ?></td>
                                <td><?php echo $pecah['email']; ?></td>
                                <td><center><?php echo $pecah['username']; ?></td>
                                <td><center><?php echo $pecah['no_hp']; ?></td>
                               <td><CENTER>
                                    <a href="" class="btn btn-outline-success">Edit</a>
                                    <a href="kirim_info.php" class="btn btn-outline-success">Kirim Info</a>
                                    <a href="" class="btn-outline-danger btn">Hapus</a>         </CENTER>                           
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>
</html>

<script type="text/javascript">
$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
})
</script>