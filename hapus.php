<?php

$con = new mysqli("localhost", "root", "", "dbregis");
// check connection
if ($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}

 
    if (isset($_GET["kode"])) {

        $kode = $_GET["kode"];

        $query = "DELETE FROM t_song WHERE kode='$kode' ";
        $stmt=$con->prepare($query);
        $stmt->execute();
    }
    header("location:view.php");
?>