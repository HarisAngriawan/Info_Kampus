<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
$insert =mysqli_query($koneksi,"SELECT * FROM elearning");
while($i = mysqli_fetch_array($insert)){
?>
<b>Judul:</b> <?php echo $i['nama_elearning'];?> | <a href='index.php'> Kembali </a>
<hr>
<embed src="../document/<?php echo $i['document'];?>" type ="application/pdf"  width="100%" height="400">
</object>
<?php }?>
</body>
</html>