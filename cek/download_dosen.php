<?php 
    require_once '../koneksi.php';
    session_start();

    if (isset($_GET['id_upload'])) {
        $id = $_GET['id_upload'];
    
        // fetch file to download from database
        $sql = "SELECT * FROM upload_dosen WHERE id_upload=$id";
        $result = mysqli_query($koneksi, $sql);
    
        $file = mysqli_fetch_assoc($result);
        $filepath = '../file_dsoen/' . $file['nama_file'];
    
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../file_dsoen/' . $file['nama_file']));
            readfile('../file_dsoen/' . $file['nama_file']);
    
            // Now update downloads count
            $newCount = $file['download'] + 1;
            $updateQuery = "UPDATE upload_dosen SET downloads=$newCount WHERE id=$id";
            mysqli_query($koneksi, $updateQuery);
            exit;
        }
    
    }

?>