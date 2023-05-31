<?php
    $con = new mysqli("localhost", "root", "", "dbregis");
    // cek connection
    if ($con->connect_error){
        die("Connection failed: ". $con->connect_error);
    }
if(isset($_POST['edit'])) {

    $kode = $_POST['kode'];
    $song = $_POST['song'];
    $album = $_POST['album'];
    $singer = $_POST['singer'];

    // buat dan jalankan query UPDATE 
    $query = "UPDATE t_song SET kode = ?, song = ?, album = ?, singer = ? where kode = ?"; 
    $stmt=$con->prepare($query);
    $stmt->bind_param("isssi", $kode, $song, $album, $singer, $kode);
    $result = $stmt->execute();
    if(!$result) {
        die("Query Error: " . $stmt->error);
    }
}
$stmt->close();
$con->close();
//lakukan redirect ke halaman viewdosen.php 
header("location:view.php");
?>