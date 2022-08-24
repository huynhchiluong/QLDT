<?php
include_once '../Connect.php';
if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        
    $query=mysqli_query($connect, "delete from Cart where id = '$id'");
}
?>