<?php 
    require_once '../koneksi.php';
    include 'functions.php';

          if(isset($_POST['submit'])){
            //   $name = $_POST['nama'];
              $message = $_POST['pesan'];              
              $query ="INSERT INTO `notifikasi` (`id_notif`, `nama_pengirim`, `type_notif`, `pesan_notif`, `status_notif`, `tanggal_notif`) VALUES (NULL, 'ADMIN','comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  echo "<script>
                  alert('Anda Berhasil Mengirim Pesan')
                  window.location='../admin/home_index.php'
                  </script>";
              }
              else {
                echo "<script>
                alert('Gagal mengirim pesan')
                window.location='../admin/kirim_info.php'
                </script>";
              }
          }
                
?>