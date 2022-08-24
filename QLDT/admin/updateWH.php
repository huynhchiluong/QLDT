<?php


include('Connect.php');
    if(isset($_POST['rowid'])){
    $id = $_POST['rowid'];
    $SoLuong= $_POST['SoLuongTon'];
    
    $sql= "update tonkho set SoLuongTon='$SoLuong' where MaKho='$id'";
    mysqli_query($connect,$sql);}

?>