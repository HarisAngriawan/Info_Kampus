<?php

session_start();
include "../koneksi.php";

$msg ="";

if(isset($_POST['upload'])) {
$target = "../document/".basename($_FILES['document']['name']);

$namaperaturan = $_POST['nama_peraturan'];
$namafile = $_FILES['document']['name'];

$peraturan ="INSERT INTO peraturan (peraturan, data)
VALUES ('$namaperaturan','$namafile')";

$hasil = mysqli_query($koneksi, $peraturan);

if(move_uploaded_file($_FILES['document']['tmp_name'], $target)) {
    header("location:../admin/peraturan_kampus.php");
}else{
    
}
}
?>