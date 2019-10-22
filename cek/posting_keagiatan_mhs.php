<?php

session_start();
include "../koneksi.php";

$msg ="";

if(isset($_POST['upload'])) {
$target = "../image/".basename($_FILES['nama_gambar']['name']);

$namakegiatan = $_POST['nama_kegiatan'];
$namagambar = $_FILES['nama_gambar']['name'];
$isikegiatan = $_POST['isi_kegiatan'];
$tanggalkegiatan = $_POST['tanggal_kegiatan'];

$gambar ="INSERT INTO kegiatan (nama_kegiatan,gambar_kegiatan,isi_kegiatan,tanggal_kegiatan)
VALUES ('$namakegiatan','$namagambar','$isikegiatan','$tanggalkegiatan')";

$hasil = mysqli_query($koneksi, $gambar) or die(mysql_error());

if(move_uploaded_file($_FILES['nama_gambar']['tmp_name'], $target)) {
    header("location:../mahasiswa/tampilkan_kegiatan.php");
}else{
    
}
}
?>
