<?php
$username = "root"; 
$password = "";      
$server   = "localhost";   
$dbname   = "QLDT";
$connect = mysqli_connect($server, $username, $password, $dbname);
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
echo "";

/* load data */ 



?>
