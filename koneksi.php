<?php
$con = new mysqli("localhost", "root", "", "dbregis");
// check connection
if ($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}
?>