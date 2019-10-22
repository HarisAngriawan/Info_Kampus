<?php 
// mengaktifkan session php
session_start();
require_once '../mahasiswa/status_depan.php';
// menghubungkan dengan koneksi
include '../koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from mahasiswa where username='$username' and password='$password'");
$data_member = mysqli_fetch_array($data);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['id_mhs'] = $data_member['id_mhs'];
	header("location:../mahasiswa/home_mahasiswa.php");
}else{
	header("location:../login_mhs.php?pesan=gagal");
}
?>