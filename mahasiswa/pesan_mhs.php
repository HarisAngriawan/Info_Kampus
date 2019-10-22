<?php
session_start();
include '../koneksi.php';
include '../cek/functions.php';
include '../mahasiswa/status_session.php';

$id_mhs = $_SESSION['id_mhs'];
$nama_member = mysqli_query($koneksi, "SELECT nama FROM mahasiswa WHERE id_mhs ='$id_mhs'");
$data=mysqli_fetch_array($nama_member);
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
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/pesan.js"></script>
        <link rel="stylesheet" href="../css/pesan.css">
    </head>

    <body>
        <div id="wrapper" class="wrapper-content">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">Mahasiswa</a>
                    </li>
                    <li><i class="fas fa-calendar"></i><a href="home_mahasiswa.php">Info Terbaru</a></li>
                    <li><i class="far fa-envelope-open"></i>
                        <?php 
                    $pesan_baru=mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_penerima='$id_mhs' and sudah_dibaca='belum'");
                    $jumlah_pesan_baru=mysqli_num_rows($pesan_baru);

                    if($jumlah_pesan_baru == 0){
                        echo "<a href='pesan.php?id_mhs=".$id_mhs."'>Kotak Pesan<span class='badge badge-light'></a>";
                    }
                    else if($jumlah_pesan_baru > 0){
                        echo "<a href='pesan.php?id_mhs=".$id_mhs."'>Kotak Pesan<span class='badge'>".$jumlah_pesan_baru."</span></a>";
                    }
                ?>
                    </li>
                    <li><i class="fas fa-book"></i><a href="elearning_mhs.php">E-Learning</a></li>
                    <li><i class="fas fa-calendar-alt"></i><a href="tampilkan_kegiatan.php">Informasi Kegiatan</a></li>
                    <li><i class="fas fa-clipboard-list"></i><a href="peraturan_mhs.php">Informasi Peraturan</a></li>
                    <li><i class="fas fa-share-square"></i><a href="posting_kegiatan_mhs.php">Posting Kegiatan</a></li>
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
                                $query = "SELECT * from `notifikasi` where `status_notif` = 'unread' order by `tanggal_notif` DESC";
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
                                $query = "SELECT * from `notifikasi` order by `tanggal_notif` DESC";
                                if(count(fetchAll($query))>0){
                                    foreach(fetchAll($query) as $i){
                                ?>
                                <a style="
                                <?php
                            if($i['status_notif']=='unread'){
                                echo "
                                    font-weight:bold;"; } ?>
                                    " class="dropdown-item" href="lihat_pesan_notif.php?id=
                                    <?php echo $i['id_notif'] ?>">
                                    <small><i>
                                            <?php echo date('F j, Y, g:i a',strtotime($i['tanggal_notif'])) ?></i></small><br />
                                    <?php 
                  
                                    if($i['type_notif']=='comment'){
                                        echo ucfirst($i['nama_pengirim'])." Mengirimkan Anda Pesan";
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
                            <h1>
                                <?php echo $data['nama'];?> Coba Lihat Pesan</h1>
                            <h1>Inbox Pesan</h1>
                            <p><a href="index.php">&laquo; Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="ke_kirim_pesan">Kirim
                                    Pesan</a></p>

                            <div id="kirim_pesan">
                                <form id="form_kirim_pesan" method="post">
                                    <input type="hidden" id="pengirim_kirim_pesan" name="pengirim_kirim_pesan" value="<?php echo $id_mhs; ?>">
                                    Penerima
                                    <br>
                                    <select id="penerima_kirim_pesan" name="penerima_kirim_pesan">
                                        <option value="0">- Pilih Penerima Pesan -</option>
                                        <?php 
                                            $query_penerima = mysqli_query($koneksi, "SELECT id_mhs, nama FROM mahasiswa WHERE id_mhs != $id_mhs");
                                            while ($daftar_penerima=mysqli_fetch_array($query_penerima)) {
                                        ?>
                                        <option value="<?php echo $daftar_penerima['id_mhs']; ?>">
                                            <?php echo $daftar_penerima['nama']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                    Subyek Pesan
                                    <br>
                                    <input type="text" id="subyek_kirim_pesan" name="subyek_kirim_pesan">
                                    <br>
                                    Isi Pesan
                                    <br>
                                    <textarea id="isi_kirim_pesan" name="isi_kirim_pesan" cols="30" rows="5"></textarea>
                                    <br><br>
                                    <input type="submit" name="submit_kirim_pesan" value="KIRIM PESAN">
                                    <br>
                                    <div id="loading_kirim_pesan">Mengirim Pesan...</div>
                                    <div id="keterangan"></div>
                                </form>
                            </div>

                            <table width="600" class="tabel_pesan" cellpadding="5" cellspacing="0">
                                <thead>
                                    <tr class="top_inbox">
                                        <th>
                                            Pengirim
                                        </th>
                                        <th>
                                            Subyek Pesan
                                        </th>
                                        <th>
                                            Tanggal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query_daftar_pesan = mysqli_query($koneksi, "SELECT P.*, M.id_mhs, M.nama FROM pesan P, mahasiswa M WHERE P.id_pengirim=M.id_mhs AND P.id_penerima='$id_mhs' ORDER BY P.id_pesan DESC");
                                        while ($daftar_pesan=mysqli_fetch_array($query_daftar_pesan)) {
                                            if($daftar_pesan['sudah_dibaca']=="belum"){
                                    ?>
                                    <tr class="pesan pesan_belum">
                                        <td>
                                            <?php echo $daftar_pesan['nama']; ?>
                                        </td>
                                        <td>
                                            <a href="buka_pesan.php?id_mhs=<?php echo $id_mhs; ?>&id_pesan=<?php echo $daftar_pesan['id_pesan']; ?>">
                                                <?php echo $daftar_pesan['subyek_pesan']; ?></a>
                                        </td>
                                        <td>
                                            <?php echo $daftar_pesan['tanggal']; ?>
                                        </td>
                                    </tr>
                                    <?php } 
                                            else if($daftar_pesan['sudah_dibaca']=="sudah"){
                                    ?>
                                    <tr class="pesan">
                                        <td>
                                            <?php echo $daftar_pesan['nama']; ?>
                                        </td>
                                        <td>
                                            <a href="buka_pesan.php?id_mhs=<?php echo $id_mhs; ?>&id_pesan=<?php echo $daftar_pesan['id_pesan']; ?>">
                                                <?php echo $daftar_pesan['subyek_pesan']; ?></a>
                                        </td>
                                        <td>
                                            <?php echo $daftar_pesan['tanggal']; ?>
                                        </td>
                                    </tr>

                                    <?php 
                                            } 
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $(".btn-toggle-menu").click(function () {
                    $("#wrapper").toggleClass("toggled");
                });
            })
        </script>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</html>