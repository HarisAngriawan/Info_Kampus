<?php

session_start();
include "../koneksi.php";

$msg ="";

if(isset($_POST['upload'])) {
$target = "../document/".basename($_FILES['nama_file']['name']);

$namaelearning = $_POST['judul'];
$dosen = $_POST['dosen'];
$matakuliah = $_POST['matkul'];
$semester = $_POST['semester'];
$tanggalupload = $_POST['tanggal_upload'];
$namafile = $_FILES['nama_file']['name'];

$elearning ="INSERT INTO elearning (nama_elearning,nama_dosen,mata_kuliah,semester, tanggal_upload, document)
VALUES ('$namaelearning','$dosen','$matakuliah','$semester','$tanggalupload','$namafile')";

$hasil = mysqli_query($koneksi, $elearning);

if(move_uploaded_file($_FILES['nama_file']['tmp_name'], $target)) {
    header("location:../admin/elearning.php");
}else{
    
}
}
?>
