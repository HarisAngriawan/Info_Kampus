<?php
// connect to the database
require_once '../koneksi.php';
session_start();
// Uploads files
if (isset($_POST['upload'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['file']['name'];

    // destination of the file on the server
    $destination = '../file_dsoen/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];

    $nama_dosen     = $_POST['nama_dosen'];
    $mk_dosen       = $_POST['mk_dosen'];
    $semester       = $_POST['semester'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf , or .docx";
    } elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO upload_dosen (nama_dosen,mk_dosen,semester,nama_file, ukuran, download, type_notif_to_admin,status_notif_to_admin,tanggal_notif_to_admin) 
            VALUES ('$nama_dosen','$mk_dosen','$semester','$filename', $size, 0,'pesan','unread', CURRENT_TIMESTAMP)";
            if (mysqli_query($koneksi, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}