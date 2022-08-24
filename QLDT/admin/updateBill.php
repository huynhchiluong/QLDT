<?php
include('Connect.php');

    $id = $_POST['id'];
    $sql = "update HoaDon set TinhTrang='Thanh toan' where MaHD='$id'";
    mysqli_query($connect,$sql);


?>