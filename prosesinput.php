<?php
//Memanggil file koneksi.php untuk melakukan koneksi dengan database
$con = new mysqli("localhost", "root", "", "dbregis");
    // check connection
    if ($con->connect_error){
        die("Connection failed: ". $con->connect_error);
    }

//mengecek apakah tombol input dari form telah di klik
if (isset($_POST['input'])) {

//membuat variable untuk menampung data dari form
    $kode = $_POST['kode'];
    $singer = $_POST['singer'];
    $album = $_POST['album'];
    $song = $_POST['song'];

//jalankan query INSERT untuk menambahkan data ke database
$query = "INSERT INTO t_song (kode,singer,album,song) VALUES (?,?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param("isss", $kode, $singer, $album, $song);


//pemeriksaan query apakah ada error
if($stmt->execute()) {
    echo "input dosen telah berhasil";
    } else {
        echo "input gagal" . $stmt->error;
    }
}
$stmt->close();
$con->close();
//Melakukan redirect (mengalihkan) ke halaman viewdosen.php
header("location:view.php");
?>