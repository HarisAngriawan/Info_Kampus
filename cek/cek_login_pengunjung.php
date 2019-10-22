<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$input="INSERT INTO pengunjung SET nama='$username'";
mysqli_query($koneksi, $input);
// menghitung jumlah data yang ditemukan
 
if( $username == ""){
	header("location:../login_pengunjung.php?pesan=gagal");
}else{
	header("location:../home_index.php");
}
?>