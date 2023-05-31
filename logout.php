<?php
// Koneksi ke database
$con = new mysqli("localhost", "root", "", "dbregis");
// check connection
if ($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}

// Inisialisasi sesi
session_start();

// Hapus sesi pengguna
unset($_SESSION["username"]);

// Hapus sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: login.php");
exit();
?>