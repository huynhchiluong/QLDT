<?php
$username = "root"; 
$password = "";      
$server   = "localhost";   
$dbname   = "qldt";
$connect = mysqli_connect($server, $username, $password, $dbname);
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}else{
echo "";

}
$addphoneStatus = true;
?>