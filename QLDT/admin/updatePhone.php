<?php
include('Connect.php');
    if(isset($_POST['rowid'])){
    $id = $_POST['rowid'];
    $Ten = $_POST['TenDT'];
    $Gia= $_POST['GiaDT'];
    
    $sql= "update dienthoai set TenDT='$Ten', GiaDT='$Gia' where MaDT='$id'";
    mysqli_query($connect,$sql);}

?>