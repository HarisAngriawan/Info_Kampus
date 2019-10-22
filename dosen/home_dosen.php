<?php
session_start();
include '../koneksi.php';
include '../cek/functions.php'; 
if (empty($_SESSION['username'])) {
    echo "anda harus login";
}else {
    $result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE username_dosen='" . $_SESSION['username'] . "' limit 1");
    $row = mysqli_fetch_assoc($result);
}
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
                    <li><i class="fas fa-book"></i><a href="home_index.php">Upload</a></li>
                    <li><i class="fas fa-sign-out-alt"></i><a href="../logout.php">Keluar</a></li>
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
                            <h2>Selamat Datang</h2>
                            <h4>
                                <?php echo $row['nama_dosen'];?>
                            </h4>
                            <h6>Silahkan Pilih Upload File Ke Admin</h6>
                            <form action="../cek/upload_dosen.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="2000000">
                                <input type="text" value="<?php echo $row['nama_dosen']; ?>" name="nama_dosen">
                                <input type="text" value="<?php echo $row['mengajar_mk'];?>" name="mk_dosen">
                                <input type="text" name="semester" placeholder="Semester">
                                <input type="file" name="file">
                                <input type="submit" name="upload" value="Upload">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>

<script type="text/javascript">
    $(function () {
        $(".btn-toggle-menu").click(function () {
            $("#wrapper").toggleClass("toggled");
        });
    })
</script>